#FROM php:7.1.3-fpm
FROM php:7.3-apache

RUN apt-get clean
RUN apt-get update

#Install packages
RUN apt-get install -y \
    libmcrypt-dev \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    zip
#Install php extensions
RUN docker-php-ext-configure mysqli --with-mysqli=mysqlnd && \
    docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
    docker-php-ext-install pdo && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install pdo_mysql && \
    docker-php-ext-install gd && \
    docker-php-ext-install zip && \
    docker-php-ext-enable mysqli pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#RUN curl -sS https://getcomposer.org/installer | php
#RUN chmod a+x composer.phar
#RUN mv composer.phar /usr/local/bin/composer
RUN apt install -y git
RUN chmod -R 755 /var/www/html
