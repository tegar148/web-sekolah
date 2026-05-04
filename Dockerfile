FROM php:8.2-fpm

# Menginstal dependensi sistem yang dibutuhkan
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libwebp-dev \
    zip \
    unzip \
    git \
    curl \
    nodejs \
    npm

# Mengonfigurasi dan menginstal ekstensi PHP (GD untuk kompresi gambar & WebP, PDO untuk koneksi MySQL)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo_mysql gd

# Meningkatkan batas upload PHP (default 8MB -> 64MB)
RUN echo "upload_max_filesize = 64M" > /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 64M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "memory_limit = 256M" >> /usr/local/etc/php/conf.d/uploads.ini

# Menginstal Composer dari official image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Menentukan folder kerja
WORKDIR /var/www/html

# Salin seluruh aplikasi dan entrypoint bootstrap
COPY . /var/www/html
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh

RUN chmod +x /usr/local/bin/docker-entrypoint.sh \
    && composer install --no-interaction --prefer-dist --optimize-autoloader || true \
    && npm install || true

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["php-fpm"]
