#!/bin/bash

if [ ! -f .env ]; then
    cp .env.example .env
fi

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force

apache2-foreground