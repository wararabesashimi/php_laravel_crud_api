FROM php:8.5-fpm-bookworm

# PHP拡張とComposerが利用するツール
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        unzip \
        libonig-dev \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
    && rm -rf /var/lib/apt/lists/*

# Composer導入
COPY --from=composer:2 \
    /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www/html