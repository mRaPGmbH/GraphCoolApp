#!/bin/sh

/usr/bin/composer install \
    && /usr/bin/composer dumpautoload -n -d /var/www/html \
    && /usr/bin/composer clear-cache

mkdir -p /var/www/html/storage
chown -R www-data:www-data /var/www/html/storage

/usr/local/bin/php /var/www/html/scripts/migrate.php

exec "$@"
