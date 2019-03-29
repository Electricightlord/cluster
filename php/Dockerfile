FROM ubuntu

#设置环境变量
ENV PHPPATH /usr/local/php
ENV PATH $PATH:$PHPPATH/sbin:$PHPPATH/bin
#设置落地目录
WORKDIR $PHPPATH

ADD ./php-7.2.14.tar.gz /tmp/
ADD ./nginx-1.14.2.tar.gz /tmp/

RUN groupadd php && useradd -g php php

RUN apt install -y openssl make gcc gcc-multilib libxml2 libxml2-dev autoconf

RUN cd /tmp/php-7.2.14 && \
    ./configure --prefix=/usr/local/php --enable-fpm --enable-mbstring --enable-mbregex --with-mhash --with-mysqli --enable-pdo --with-pdo-mysql && \
    make && \
    make install && \
    echo "-------------------------------------------------DONE-------------------------------------------" 

CMD php-fpm && nginx && tail -f /usr/local/php/var/log/php-fpm.log
