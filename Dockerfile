FROM php:8-fpm
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN apt-get update && \
    apt-get -y install --no-install-recommends git unzip libzip-dev libicu-dev libonig-dev && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-install intl pdo_mysql zip bcmath
# WORKDIR /var/www/html/
# ENV COMPOSER_ALLOW_SUPERUSER 1
# ENV COMPOSER_NO_INTERACTION 1
# RUN composer create-project --prefer-dist laravel/laravel:^9.0 example-app
# RUN composer create-project --prefer-dist laravel/laravel example-app