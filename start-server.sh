#!/bin/bash

# Inject environment secrets into .env for Laravel to access

# Remove existing database and API configs
sed -i '/^DB_CONNECTION=/d' .env 2>/dev/null || true
sed -i '/^DB_HOST=/d' .env 2>/dev/null || true
sed -i '/^DB_PORT=/d' .env 2>/dev/null || true
sed -i '/^DB_DATABASE=/d' .env 2>/dev/null || true
sed -i '/^DB_USERNAME=/d' .env 2>/dev/null || true
sed -i '/^DB_PASSWORD=/d' .env 2>/dev/null || true
sed -i '/^SCORESWIFT_API_KEY=/d' .env 2>/dev/null || true
sed -i '/^CACHE_STORE=/d' .env 2>/dev/null || true

# Add MySQL database configuration
if [ ! -z "$DB_HOST" ]; then
    echo "DB_CONNECTION=mysql" >> .env
    echo "DB_HOST=${DB_HOST}" >> .env
    echo "DB_PORT=${DB_PORT:-3306}" >> .env
    echo "DB_DATABASE=${DB_DATABASE}" >> .env
    echo "DB_USERNAME=${DB_USERNAME}" >> .env
    echo "DB_PASSWORD=${DB_PASSWORD}" >> .env
fi

# Use file-based cache for better performance
echo "CACHE_STORE=file" >> .env

# Add API key
if [ ! -z "$SCORESWIFT_API_KEY" ]; then
    echo "SCORESWIFT_API_KEY=${SCORESWIFT_API_KEY}" >> .env
fi

php artisan config:clear
php artisan cache:clear
php artisan serve --host=0.0.0.0 --port=5000
