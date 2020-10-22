FROM php:7.4-fpm

RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN apt-get update && apt-get install -y wget git unzip \
    && pecl install xdebug-2.8.1 \
    && docker-php-ext-enable xdebug

ADD ./php.ini /usr/local/etc/php/php.ini

RUN wget https://getcomposer.org/installer -O - -q \
    | php -- --install-dir=/bin --filename=composer --quiet

RUN chown -R www-data:www-data /var/www/html

WORKDIR /var/www

USER 1000:1000

