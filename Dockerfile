# Base image for building
FROM webdevops/php-nginx:8.3-alpine as build

# Install build dependencies
RUN apk add --no-cache --virtual .build-deps \
    autoconf \
    gcc \
    g++ \
    make \
    libxml2-dev \
    oniguruma-dev \
    icu-dev \
    openssl-dev \
    bzip2-dev

# Install PHP extensions
RUN docker-php-ext-configure intl
RUN docker-php-ext-install \
    bcmath

WORKDIR /app

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-interaction --no-plugins

# Stage 2: Final
FROM webdevops/php-nginx:8.3-alpine

# Copy compiled extensions from build stage
COPY --from=build /usr/local/lib/php/extensions /usr/local/lib/php/extensions

# Install runtime dependencies
RUN apk add --no-cache \
    icu-libs \
    oniguruma \
    libxml2 \
    openssl \
    bzip2

# Install Composer
COPY composer.* .
COPY --from=composer:2.2 /usr/bin/composer /usr/local/bin/composer

ENV PHP_MEMORY_LIMIT=256M
ENV APP_DIR /var/www
ENV APP_ENV local
ENV DB_CONNECTION sqlite
ENV WEB_DOCUMENT_ROOT ${APP_DIR}/public

WORKDIR $APP_DIR

# Copy application files and installed dependencies from build stage
COPY --from=build /app .

RUN mkdir -p storage/app \
    && mkdir -p storage/framework/sessions \
    && mkdir -p storage/framework/views \
    && mkdir -p storage/framework/cache \
    && mkdir -p storage/logs \
    && touch storage/logs/laravel.log \
    && touch database/database.sqlite \
    && chown -R 1000:1000 storage/ \
    && chmod -R 755 /var/www \
    && chown -R 1000:1000 /var/www \
    && chmod 777 storage/logs/laravel.log \
    && chmod 777 -R storage/framework/cache \
    && mkdir -p bootstrap/cache \
    && chown -R 1000:1000 bootstrap/cache \
    && composer dumpautoload \
    && php artisan clear-compiled \
    && php artisan config:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan optimize:clear \
    && php artisan passport:install \
    && php artisan key:generate
