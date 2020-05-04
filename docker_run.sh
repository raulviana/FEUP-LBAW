#!/bin/bash
set -e


env >> /var/www/.env
php-fpm7.2 -D

cd /var/www; php artisan storage:link

nginx -g "daemon off;"
