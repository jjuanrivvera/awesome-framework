FROM php:7.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

RUN apk add --no-cache autoconf gcc g++ make
RUN apk add --no-cache postgresql-dev
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring mysqli opcache

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apk update
RUN pecl install xdebug-3.1.6
RUN docker-php-ext-enable xdebug

RUN echo "error_reporting = E_ALL" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "display_startup_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "display_errors = On" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.mode=debug,develop,trace,profile" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=192.168.65.2" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.discover_client_host=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.connect_timeout_ms=300" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && cat /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
