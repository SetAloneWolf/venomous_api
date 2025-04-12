FROM php:8.2-apache
COPY public/ /var/www/html/
RUN a2enmod rewrite
EXPOSE 80
