#!/bin/bash
ALIVE =`redis-cli PING`
if [ "$ALIVE"=="PONG" ];then
	echo $ALIVE;
	exit 0
else
	echo $ALIVE;
	exit 1
