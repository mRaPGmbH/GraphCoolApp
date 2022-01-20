FROM php:8.0-fpm-alpine
RUN mkdir -p /var/www/html
RUN apk add --update --no-cache libzip-dev libxml2-dev
RUN docker-php-ext-install pdo_mysql opcache zip xml fileinfo
RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer

COPY ./docker-dev/php.ini "$PHP_INI_DIR/php.ini"
COPY . /var/www/html
RUN /usr/bin/composer install \
    && /usr/bin/composer dumpautoload -n -d /var/www/html \
    && /usr/bin/composer clear-cache

ENTRYPOINT ["/var/www/html/docker-dev/docker-entrypoint.sh"]
CMD ["php-fpm"]
