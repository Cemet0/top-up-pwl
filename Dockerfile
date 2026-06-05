FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json ./

RUN apk add --no-cache $PHPIZE_DEPS icu-dev libzip-dev unzip git \
    && docker-php-ext-install intl zip

RUN composer install --no-interaction --no-progress --prefer-dist --optimize-autoloader

FROM php:8.2-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN apt-get update \
    && apt-get install -y --no-install-recommends libicu-dev libzip-dev unzip git \
    && docker-php-ext-install intl pdo pdo_mysql mysqli zip \
    && a2enmod rewrite headers \
    && sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf \
    && sed -ri "s!/var/www/!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --from=vendor /app/vendor /var/www/html/vendor
COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html/writable

EXPOSE 80

CMD ["apache2-foreground"]