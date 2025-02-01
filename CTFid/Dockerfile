FROM php:8.2-apache

WORKDIR /var/www/html

COPY hidden /var/www/html/hidden
COPY login /var/www/html/login
COPY SQLinject /var/www/html/SQLinject
COPY image /var/www/html/image
COPY yt /var/www/html/yt
#COPY chat /var/www/html/chat

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN a2enmod rewrite

EXPOSE 80