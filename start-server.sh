#!/bin/bash
set -e

# Build .env from environment variables (never hardcode secrets)
cat > .env << EOF
APP_NAME=Laravel
APP_ENV=local
APP_KEY=${APP_KEY}
APP_DEBUG=true
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=${PGHOST}
DB_PORT=${PGPORT}
DB_DATABASE=${PGDATABASE}
DB_USERNAME=${PGUSER}
DB_PASSWORD=${PGPASSWORD}

SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync

CACHE_STORE=file

MAIL_MAILER=log
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="Laravel"

VITE_APP_NAME="Laravel"

MGS_API_TOKEN=${MGS_API_TOKEN}
CRICKETID_API_KEY=${CRICKETID_API_KEY}
EOF

# Ensure storage and cache directories are writable
mkdir -p storage/framework/sessions storage/framework/views storage/framework/cache/data
mkdir -p storage/logs bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Install PHP dependencies if not already installed
if [ ! -d "vendor" ]; then
    echo "Installing Composer dependencies..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

# Install and build frontend assets if not already built
if [ ! -d "node_modules" ]; then
    echo "Installing Node dependencies..."
    npm install
fi

if [ ! -d "public/build" ]; then
    echo "Building frontend assets..."
    npm run build
fi

php artisan config:clear
php artisan cache:clear

# Run migrations
php artisan migrate --force

echo "Starting Laravel server on port 5000..."
exec php artisan serve --host=0.0.0.0 --port=5000
