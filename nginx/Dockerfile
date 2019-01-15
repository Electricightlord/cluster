FROM mycentos

#设置环境变量
ENV NGINXPATH /usr/local/nginx
ENV PATH $PATH:$NGINXPATH/sbin
#设置落地目录
WORKDIR $NGINXPATH

#安装nginx需要的库
RUN yum -y install pcre-devel openssl-devel perl-devel perl-ExtUtils-Embed 

#拷贝并解压nginx源码
ADD ./nginx-1.14.2.tar.gz /tmp/

#编译、安装 nginx
RUN cd /tmp/nginx-1.14.2 && \
    ./configure  --prefix=/usr/local/nginx --with-http_ssl_module --with-http_realip_module --with-http_addition_module --with-http_sub_module --with-http_dav_module --with-http_flv_module --with-http_gzip_static_module --with-http_stub_status_module --with-http_perl_module --with-mail --with-mail_ssl_module --with-pcre && \
    make && \
    make install &&\
    echo "-------------------------------------------------DONE-------------------------------------------"

#拷贝nginx配置文件
COPY ./nginx.conf /usr/local/nginx/conf/nginx.conf

#容器启动的默认命令是打开nginx
CMD nginx && tail -f /usr/local/nginx/logs/access.log
