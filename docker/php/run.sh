#!/bin/sh

cd /var/www

composer install

php artisan cache:clear
php artisan route:cache

/usr/bin/supervisord -c /etc/supervisor/conf.d/laravel-worker.conf
