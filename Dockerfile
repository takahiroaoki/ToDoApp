FROM php:7.4.25-apache

RUN apt-get update \
  && apt-get install -y default-mysql-client \
  && docker-php-ext-install pdo_mysql
RUN a2enmod rewrite