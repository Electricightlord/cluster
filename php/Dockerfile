FROM mycentos

#设置环境变量
ENV PHPPATH /usr/local/php
ENV PATH $PATH:$PHPPATH/sbin:$PHPPATH/bin
#设置落地目录
WORKDIR $PHPPATH

#安装PHP需要的库
#RUN yum -y install 

ADD ./php-7.2.14.tar.gz /tmp/

RUN cd /tmp/php-7.2.14 &&\
    ./configure --prefix=/usr/local/php --enable-fpm --enable-mysqlnd --enable-opcache --enable-pcntl --enable-mbstring --enable-soap --enable-zip --enable-calendar --enable-bcmath --enable-exif --enable-ftp --enable-intl --with-mysqli --with-pdo-mysql --with-openssl --with-curl --with-gd --with-gettext --with-mhash --with-openssl --with-mcrypt --with-tidy --enable-wddx --with-xmlrpc && \
    make && \
    make install \

COPY ./php.ini /usr/local/php/lib/php.ini
COPY ./php.fpm.conf /usr/local/php/etc/php-fpm.conf
COPY ./www.conf /usr/local/php/etc/php-fpm.d/www.conf

CMD php-fpm && tail -f /usr/local/php/var/log/php-fpm.log
