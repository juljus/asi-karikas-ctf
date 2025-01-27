FROM php:8.2-apache

WORKDIR /var/www/html

COPY hidden /var/www/html/hidden
COPY login /var/www/html/login
COPY sql_inject /var/www/html/sql_inject
COPY validation /var/www/html/validation

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN a2enmod rewrite

EXPOSE 80