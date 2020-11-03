FROM php:7.4-fpm

ENV user dev
ARG PUID=1000
ARG PGID=1000
RUN groupadd -g $PGID $user && \
    useradd -u $PUID -g $user -m $user

# mysql
RUN docker-php-ext-install pdo pdo_mysql mysqli

# common
RUN apt-get update && apt-get install -y wget git unzip \
    build-essential \
    libmcrypt-dev \
    libpng-dev \
    libwebp-dev \
    curl \
    wget \
    libcurl4 \
    libcurl4-openssl-dev \
    zlib1g-dev \
    libicu-dev \
    libmemcached-dev \
    memcached \
    && pecl install xdebug-2.8.1 \
    && docker-php-ext-enable xdebug

# memcached
RUN pecl install memcached-3.1.5
RUN docker-php-ext-enable memcached

# gs
RUN apt-get update && apt-get install ghostscript -y

# libpng
RUN apt-get update -y && apt-get install -y libpng-dev libfreetype6-dev libjpeg62-turbo-dev

# imagick
RUN apt-get update \
    && apt-get -y install \
        libmagickwand-dev \
        --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && rm -r /var/lib/apt/lists/*

# gd
RUN docker-php-ext-install gd
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp
RUN cd /usr/src/php/ext/gd && make
RUN cp /usr/src/php/ext/gd/modules/gd.so /usr/local/lib/php/extensions/no-debug-non-zts-20190902/gd.so
RUN docker-php-ext-install -j$(nproc) gd

ADD php.ini /usr/local/etc/php/php.ini

# composer
RUN wget https://getcomposer.org/installer -O - -q \
    | php -- --install-dir=/bin --filename=composer --quiet

# Node.js
RUN curl -sL https://deb.nodesource.com/setup_12.x -o nodesource_setup.sh
RUN bash nodesource_setup.sh
RUN apt-get install nodejs -y
RUN command -v node
RUN command -v npm

# Display versions installed
RUN php -v
RUN composer --version
RUN node -v
RUN npm -v
RUN python --version

WORKDIR /var/www

CMD ["php-fpm"]
