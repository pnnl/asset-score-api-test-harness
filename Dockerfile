FROM php:5.6.25-apache
COPY src/ /var/www/html

RUN apt-get update && apt-get install -y \
    tmux \
    htop \

EXPOSE 80:8080
