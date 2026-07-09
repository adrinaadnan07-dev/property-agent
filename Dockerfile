FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite sqlite3 bcmath \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN php artisan key:generate --force

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=$PORT
