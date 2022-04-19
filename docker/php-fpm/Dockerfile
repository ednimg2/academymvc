FROM php:8.1-fpm

RUN apt update \
    && apt install -y zlib1g-dev g++ git nano libicu-dev zip libzip-dev zip \
    && docker-php-ext-install intl opcache mysqli pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable pdo_mysql \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer