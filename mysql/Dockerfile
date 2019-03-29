FROM hub.c.163.com/electricight/ubuntu:1.1

ENV MYSQL /usr/local/mysql
ENV PATH $PATH:$MYSQL/bin

ADD ./mysql-5.7.24-linux-glibc2.12-x86_64.tar.gz  /usr/local/mysql

RUN apt install libaio-dev numactl

RUN groupadd mysql && \
    useradd mysql -s /sbin/nologin -M -g mysql && \
    mkdir /usr/local/mysql/data && chmod 0777 /usr/local/mysql/data && \
    mysqld --initialize
    
    
CMD /bin/bash
