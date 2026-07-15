# Gunakan PHP versi 8.2
FROM php:8.2-cli

# Install sistem dasar dan ekstensi untuk MySQL Aiven
RUN apt-get update -y && apt-get install -y unzip zip \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer (Pengelola library PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Atur folder kerja di dalam mesin Render
WORKDIR /app

# Copy seluruh file kodemu ke dalam mesin Render
COPY . .

# Install paket Laravel
RUN composer install --no-dev --optimize-autoloader

# Buka port 10000 (standar yang dibaca Render)
EXPOSE 10000

# Jalankan server bawaan Laravel
CMD php artisan serve --host=0.0.0.0 --port=10000