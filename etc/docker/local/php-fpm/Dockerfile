FROM php:7.4-fpm-buster

ENV PHP_IDE_CONFIG "serverName=pardovimes-serra"

RUN apt-get update

RUN apt-get install -y software-properties-common unzip libicu-dev git-core tzdata locales libzip-dev vim librabbitmq-dev libpng-dev libjpeg-dev sudo

RUN docker-php-ext-install \
       intl \
       gd

RUN pecl install -f xdebug && docker-php-ext-enable xdebug

RUN apt-get clean; rm -rf /var/www/html /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN curl -sS https://get.symfony.com/cli/installer -O && chmod +x ./installer && ./installer --install-dir=/usr/local/bin

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer php --2

COPY etc/docker/local/php-fpm/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY etc/docker/local/php-fpm/php-ini-overrides.ini /usr/local/etc/php/conf.d/99-overrides.ini

CMD ["php-fpm"]
