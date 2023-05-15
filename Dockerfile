FROM php:8-apache-buster

RUN apt update && \
    apt install -y --no-install-recommends libmagickwand-dev gsfonts && \
    pecl install imagick && \
    docker-php-ext-enable imagick && \
    apt-get purge -y libmagickwand-dev

ADD src/* /var/www/html

EXPOSE 80

ARG flag_value
ENV FLAG ${flag_value}

CMD ["apache2-foreground"]
