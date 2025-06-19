#!/bin/bash
set -e

echo "🚀 Starting Zyma deployment..."

# Create .env file if it doesn't exist
if [ ! -f .env ]; then
    echo "📝 Creating .env file..."
    cp .env.example .env
fi

# Set APP_KEY in .env if not already set
if ! grep -q "APP_KEY=base64:" .env; then
    echo "🔑 Generating application key..."
    php artisan key:generate --force || echo "⚠️  Key generation failed, using environment variable"
fi

# Create database file if using SQLite
if [ ! -f database/database.sqlite ]; then
    echo "🗄️  Creating SQLite database..."
    touch database/database.sqlite
fi

# Run migrations
echo "📊 Running database migrations..."
php artisan migrate --force

# Cache config for better performance
echo "⚡ Caching configuration..."
php artisan config:cache

# Clear any existing caches
php artisan route:clear
php artisan view:clear

# Start the application with proper error handling
echo "🌐 Starting Laravel on port ${PORT:-8000}"
echo "✅ Zyma is ready!"

exec php artisan serve --host=0.0.0.0 --port=${PORT:-8000} 