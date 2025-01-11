FROM php:8.1-fpm

# Installa le dipendenze di sistema necessarie
RUN apt-get update && apt-get install -y \
    zip unzip curl libpng-dev libonig-dev libxml2-dev libzip-dev git \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Installa Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Imposta la directory di lavoro
WORKDIR /var/www/html

# Copia il progetto
COPY . .

# Installa le dipendenze PHP
RUN composer install --no-dev --optimize-autoloader

# Imposta i permessi corretti
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Espone la porta per il servizio
EXPOSE 8000

# Comando per avviare l'app
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
