FROM php:8.2-apache
COPY public/ /var/www/html/config.php
/var/www/html/get_ant.php /var/www/html/get_bee_vespa.php /var/www/html/get_centipede.php /var/www/html/get_fish.php /var/www/html/get_jellyfish.php /var/www/html/get_millipede.php /var/www/html/get_scorpion.php /var/www/html/get_snail.php /var/www/html/get_snakes.php
/var/www/html/get_spider.php
RUN a2enmod rewrite
EXPOSE 80
