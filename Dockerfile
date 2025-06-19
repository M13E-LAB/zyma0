FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libsqlite3-dev \
    zip \
    unzip \
    sqlite3

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_sqlite mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy application files
COPY . /var/www

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions
RUN chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

# Create database file
RUN touch /var/www/database/database.sqlite

# Generate application key
RUN php artisan key:generate --force

# Run migrations
RUN php artisan migrate --force

# Expose port
EXPOSE $PORT

# Start Laravel development server
CMD php artisan serve --host=0.0.0.0 --port=$PORT 