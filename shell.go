package main

import (
	"bytes"
	"fmt"
	"log"
	"os"
	"os/exec"
	"os/signal"
)

func main() {
	count := 0
	n := make(chan int, 1)
	c := make(chan os.Signal, 1)
	signal.Notify(c, os.Interrupt, os.Kill)

	startCmds := []string{"cd nginx && docker-compose up",
		"cd redis && docker-compose up",
		"cd mysql && docker-compose up",
		"cd php && docker-compose up"}
	endCmds := []string{"docker stop $(docker ps -aq)"}
	for i := 0; i <= len(startCmds); i++ {
		if i == len(startCmds) {
			go listener(endCmds, c, n)
			break
		}
		go exec_shell(startCmds[i], n)
	}
	for {
		select {
		case <-n:
			count++
		}
		if count == len(startCmds)+1 {
			break
		}
	}
	for i := 0; i < len(endCmds); i++ {
		fmt.Println("命令:"+endCmds[i]+"执行完毕")
	}
	fmt.Println("执行完毕")
}

func listener(cmd []string, c chan os.Signal, n chan int) {

	select {
	case <-c:
		for i := 0; i < len(cmd); i++ {
			fmt.Println("接受到关闭指令,开始关闭容器")
			end_shell(cmd[i])
		}
		break
	}
	n <- 1
}

func end_shell(s string) {
	fmt.Println("执行关闭命令:" + s)
	cmd := exec.Command("/bin/bash", "-c", s)
	var out bytes.Buffer

	cmd.Stdout = &out
	err := cmd.Start()
	if err != nil {
		log.Fatal(err)
	}
	err = cmd.Wait()
	if err != nil {
		log.Fatal(err)
	}
}

func exec_shell(s string, n chan int) {
	fmt.Println("执行命令:" + s)
	cmd := exec.Command("/bin/bash", "-c", s)
	var out bytes.Buffer

	cmd.Stdout = &out
	err := cmd.Start()
	if err != nil {
		log.Fatal(err)
	}
	fmt.Printf("%s", out.String())
	err = cmd.Wait()
	if err != nil {
		log.Fatal(err)
	}
	fmt.Println("命令:" + s + "被终止")
	n <- 1
}
