FROM pressmaninc/pm-kusanagi-php73:7.3.8

RUN apk --update add \
    && apk add build-base git zip bash shadow tzdata

RUN curl -sS https://getcomposer.org/installer | php && \
    mv ./composer.phar /usr/local/bin/composer

RUN apk add --update --no-cache --virtual .build-xdebug $PHPIZE_DEPS && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug && \
    apk del --purge .build-xdebug

WORKDIR /var/www/html

# memo
# docker-compose up -d --force-recreate --build
