# Immagine base
FROM php:8.2-fpm

# Installa le estensioni PHP richieste
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl \
    && docker-php-ext-install pdo pdo_mysql zip \
    && docker-php-ext-enable pdo_mysql

# Installa Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Imposta la directory di lavoro
WORKDIR /var/www/html

# Copia i file del progetto nel container
COPY . .

# Installa le dipendenze di Laravel
RUN composer install --no-dev --optimize-autoloader

# Imposta i permessi per Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Esporta la porta utilizzata dall'applicazione
EXPOSE 8000

# Imposta il comando per avviare Laravel
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
