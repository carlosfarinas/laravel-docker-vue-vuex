FROM php:8.0-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y git

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

RUN chown -R www-data:www-data /var/www


# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
