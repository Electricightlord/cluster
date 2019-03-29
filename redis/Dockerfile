FROM hub.c.163.com/electricight/ubuntu:1.1

ENV REDIS /usr/local/redis
ENV PATH $PATH:$REDIS/src

ADD ./redis-5.0.3 /usr/local/redis
RUN mkdir /usr/local/redis/log /usr/local/redis/etc

CMD service keepalived start && redis-server
