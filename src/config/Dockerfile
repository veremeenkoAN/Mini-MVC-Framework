FROM php:8.3-fpm

RUN apt-get update
RUN apt-get install -y curl git

RUN docker-php-ext-install pdo pdo_mysql mysqli
WORKDIR /var/www/public
ENTRYPOINT ["php-fpm"]
