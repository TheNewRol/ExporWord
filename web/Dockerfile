#FROM php:7.1.3-fpm
FROM php:7.3-apache

RUN apt-get clean
RUN apt-get update

#Install some basic tools
RUN apt-get install -y \
    libmcrypt-dev \
    libzip-dev \
    zip \ 
#    mysql-client libmagickwand-dev --no-install-recommends \
#    && pecl install imagick \
    && docker-php-ext-install zip
    #&& docker-php-ext-enable imagick 
#&& docker-php-ext-install mcrypt pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#RUN curl -sS https://getcomposer.org/installer | php
#RUN chmod a+x composer.phar
#RUN mv composer.phar /usr/local/bin/composer
RUN apt install -y git
RUN chmod -R 755 /var/www/html
