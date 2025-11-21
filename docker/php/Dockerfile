FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev

RUN docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www/html
