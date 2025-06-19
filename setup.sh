#!/bin/bash

# Create .env file if it doesn't exist
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Set APP_KEY in .env if not already set
if ! grep -q "APP_KEY=base64:" .env; then
    php artisan key:generate --force
fi

# Create database file if using SQLite
if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
fi

# Run migrations
php artisan migrate --force

# Cache config for better performance
php artisan config:cache

# Start the application with proper error handling
echo "Starting Laravel on port ${PORT:-8000}"
exec php artisan serve --host=0.0.0.0 --port=${PORT:-8000} 