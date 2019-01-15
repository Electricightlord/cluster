FROM mycentos

#设置环境变量
ENV PHPPATH /usr/local/php
ENV PATH $PATH:$PHPPATH/sbin:$PHPPATH/bin
#设置落地目录
WORKDIR $PHPPATH

ADD ./php-7.2.14.tar.gz /tmp/

#安装PHP需要的库
RUN yum -y install openssl openssl-devel libicu-devel autoconf libjpeg libjpeg-devel re2c libpng libpng-devel freetype freetype-devel libxml2 libxml2-devel zlib zlib-devel glibc glibc-devel glib2 glib2-devel ncurses ncurses-devel curl curl-devel krb5-devel libidn libidn-devel openldap openldap-devel nss_ldap jemalloc-devel cmake boost-devel bison automake libevent libevent-devel gd gd-devel libtool* libmcrypt libmcrypt-devel mcrypt mhash libxslt libxslt-devel readline readline-devel gmp gmp-devel libcurl libcurl-devel openjpeg-devel

#编译安装
RUN cd /tmp/php-7.2.14 && \
    ./configure --prefix=/usr/local/php --with-freetype-dir=/usr/local/freetype --enable-fpm --enable-mbstring --enable-debug --disable-rpath --enable-inline-optimization --with-zlib --enable-sockets --enable-sysvsem --enable-sysvshm --enable-pcntl --enable-mbregex --with-mhash --enable-zip --with-pcre-regex --with-mysqli --with-gd --with-jpeg-dir --enable-xml --enable-pdo && \
    make && \
    make install && \
    echo "-------------------------------------------------DONE-------------------------------------------"

#拷贝配置文件
COPY ./php.ini /usr/local/php/lib/php.ini
COPY ./php-fpm.conf /usr/local/php/etc/php-fpm.conf
COPY ./www.conf /usr/local/php/etc/php-fpm.d/www.conf

#容器启动的默认命令是打开php-fpm
CMD php-fpm && tail -f /usr/local/php/var/log/php-fpm.log
