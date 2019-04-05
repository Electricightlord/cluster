FROM hub.c.163.com/electricight/php:1.1

COPY ./php /usr/local/php

CMD php-fpm && nginx && tail -f /usr/local/php/var/log/php-fpm.log
