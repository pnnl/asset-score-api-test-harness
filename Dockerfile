FROM php:5.6.25-apache
COPY src/ /var/www/html

RUN apt-get update && apt-get install -y \
    tmux \
    htop \
    zip \
    unzip \
    git 

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
   php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
   php -r "unlink('composer-setup.php');"

RUN echo "expose_php = Off;" > /usr/local/etc/php/conf.d/php.ini

RUN cd /var/www/html && \
    composer install
 
EXPOSE 80
