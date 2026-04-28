FROM php:8.2-apache

# Mengaktifkan mod_rewrite Apache untuk routing Laravel
RUN a2enmod rewrite

# Menginstal dependensi sistem yang dibutuhkan
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libwebp-dev \
    zip \
    unzip \
    git \
    curl

# Mengonfigurasi dan menginstal ekstensi PHP (GD untuk kompresi gambar & WebP, PDO untuk koneksi MySQL)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo_mysql gd

# Mengarahkan DocumentRoot Apache langsung ke folder /public milik Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Menginstal Composer dari official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Menentukan folder kerja
WORKDIR /var/www/html
