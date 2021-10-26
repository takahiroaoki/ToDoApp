FROM php:5.6-apache

RUN apt-get update
RUN apt-get install -y vim default-mysql-client
RUN docker-php-ext-install pdo_mysql
RUN a2enmod rewrite