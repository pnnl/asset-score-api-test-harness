FROM php:5.6.25-apache
COPY src/ /var/www/html
COPY composer-setup.php /var/www/html

RUN apt-get update && apt-get install -y \
    tmux \
    htop \
    zip \
    unzip \
    git \
    vim

RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

RUN touch /usr/local/etc/php/conf.d/php.ini && \
    echo "expose_php = Off;" > /usr/local/etc/php/conf.d/php.ini

RUN cd /var/www/html && \
    composer install
 
EXPOSE 80
