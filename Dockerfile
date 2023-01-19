FROM php:8.1-apache
WORKDIR /var/www/html
ADD . .
# RUN a2enmod rewrite
# RUN docker-php-ext-install mysqli pdo pdo_mysql
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN chmod -R 775 storage
RUN chgrp -R www-data storage

EXPOSE 80