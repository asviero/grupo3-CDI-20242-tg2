#!/bin/bash
apt-get update && \
apt-get install -y libzip-dev zip libpng-dev libjpeg-dev libfreetype6-dev && \
docker-php-ext-configure gd --with-freetype --with-jpeg && \
docker-php-ext-install pdo pdo_mysql gd && \
php-fpm

