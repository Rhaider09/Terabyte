#!/bin/bash

set -e

echo "Starting Laravel application..."

# Laravel cache directories
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p bootstrap/cache

# Permissions
chown -R www-data:www-data storage bootstrap/cache

chmod -R 775 storage bootstrap/cache

echo "Clearing old cache..."

php artisan optimize:clear

echo "Caching Laravel configuration..."

php artisan config:cache

echo "Caching Laravel routes..."

php artisan route:cache

echo "Caching Laravel views..."

php artisan view:cache

echo "Starting PHP-FPM..."

php-fpm -D

echo "Starting Nginx..."

nginx -g "daemon off;"
