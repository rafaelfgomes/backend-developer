FROM php:7.4.12-fpm

WORKDIR /var/www/html/sales-api/

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libcurl4-openssl-dev \
    libfreetype6-dev \
    libonig-dev \
    locales \
    libssl-dev \
    libzip-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

RUN pecl install mongodb openssl
RUN echo "extension=mongodb.so" > $PHP_INI_DIR/conf.d/mongodb.ini

COPY . .

RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY --chown=www:www . .

USER www

EXPOSE 9000

CMD [ "php-fpm" ]