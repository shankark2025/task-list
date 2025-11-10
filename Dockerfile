# Use PHP with Apache
FROM php:8.2-apache

# Enable Apache mod_rewrite (Laravel needs it)
RUN a2enmod rewrite

# Install required system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip libpq-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

# Copy project files to container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
