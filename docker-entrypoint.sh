#!/bin/sh
set -e

cd /var/www/html

mkdir -p storage/framework/{cache,sessions,views} bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
chmod -R ug+rwX storage bootstrap/cache
chmod -R 777 storage bootstrap/cache

if [ ! -f vendor/autoload.php ]; then
  composer install --no-interaction --prefer-dist --optimize-autoloader
fi

if [ ! -f .env ]; then
  cp .env.example .env
fi

if ! grep -q '^APP_KEY=base64:' .env 2>/dev/null; then
  php artisan key:generate --force --ansi || true
fi

php artisan storage:link --force || true

if [ ! -d node_modules ]; then
  npm install
fi

attempt=0
until php artisan migrate --force --ansi; do
  attempt=$((attempt + 1))
  if [ "$attempt" -ge 12 ]; then
    echo "Migration failed after $attempt attempts."
    break
  fi
  echo "Waiting for database..."
  sleep 5
done

php artisan db:seed --force --ansi || true

# Hapus file hot Vite agar Laravel tidak menggunakan dev server
rm -f public/hot

npm run build || true

exec php-fpm
