#!/bin/bash

# Copier .env.example si .env n'existe pas
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Lancer les commandes Laravel au démarrage avec les vraies variables d'env
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force

# Lancer Apache
apache2-foreground