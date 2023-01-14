FROM damou/php:8-apache-mysql-composer-nano-a2enmod-public
RUN apt-get update -y && apt-get upgrade \
    && pecl install mongodb && docker-php-ext-enable mongodb