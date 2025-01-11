# Stage 1: Build dependencies
FROM php:8.2-fpm as builder

RUN apt-get update && apt-get install -y --no-install-recommends \
    libpng-dev libonig-dev libxml2-dev libzip-dev git zip unzip curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Stage 2: Application setup
FROM php:8.1-fpm

COPY --from=builder /usr/local/etc/php /usr/local/etc/php
WORKDIR /var/www/html
COPY . .
RUN composer install --no-dev --optimize-autoloader

CMD ["php-fpm"]
