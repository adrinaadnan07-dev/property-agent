FROM php:8.2-cli

RUN apt-get update && apt-get install -y git unzip libsqlite3-dev curl \
    && docker-php-ext-install pdo pdo_sqlite bcmath \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN php artisan key:generate --force
RUN php artisan storage:link --force

EXPOSE 8000

CMD php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
