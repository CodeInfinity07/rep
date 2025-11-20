#!/bin/bash

# Ensure SCORESWIFT_API_KEY is in .env for Laravel to access
if [ ! -z "$SCORESWIFT_API_KEY" ]; then
    # Remove existing key if present
    sed -i '/^SCORESWIFT_API_KEY=/d' .env 2>/dev/null || true
    # Add the key to .env
    echo "SCORESWIFT_API_KEY=${SCORESWIFT_API_KEY}" >> .env
fi

php artisan config:clear
php artisan cache:clear
php artisan serve --host=0.0.0.0 --port=5000
