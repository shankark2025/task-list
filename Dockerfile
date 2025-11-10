# Use PHP + Apache
FROM php:8.2-apache

# Enable mod_rewrite for Laravel routing
RUN a2enmod rewrite

# Install system packages & PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Copy project files
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage /var/www/html/bootstrap/cache

# Set Apache root to public folder
RUN sed -i 's#/var/www/html#/var/www/html/public#g' /etc/apache2/sites-available/000-default.conf

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
