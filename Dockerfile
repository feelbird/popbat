# Pobierz obraz PHP z Apache
FROM php:7.4-apache

# Instalacja rozszerzeń potrzebnych dla WordPressa
RUN docker-php-ext-install mysqli

# Pobierz i wypakuj WordPressa
RUN curl -O https://wordpress.org/latest.tar.gz && \
    tar -zxvf latest.tar.gz && \
    rm latest.tar.gz && \
    mv wordpress/* /var/www/html/ && \
    rmdir wordpress

# Ustaw uprawnienia
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Skonfiguruj Apache
RUN a2enmod rewrite
