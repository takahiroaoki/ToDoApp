FROM php:7.4.25-apache

RUN apt-get update
RUN apt-get install -y default-mysql-client
RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite