# Gunakan PHP versi 8.2
FROM php:8.2-cli

# Install sistem dasar
RUN apt-get update -y && apt-get install -y unzip zip \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# --- TAMBAHAN PENTING ---
# Buat folder bootstrap/cache dan berikan izin akses penuh
RUN mkdir -p bootstrap/cache && chmod -R 777 bootstrap/cache
# ------------------------

# Copy file kode
COPY . .

# Install paket (tambahkan --no-scripts untuk menghindari error package:discover dulu)
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Buka port 10000
EXPOSE 10000

# Jalankan server
CMD php artisan serve --host=0.0.0.0 --port=10000