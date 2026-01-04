FROM php:8.2-cli

RUN apt-get update && \
    apt-get install -y git zip unzip libicu-dev && \
    apt-get -y autoremove && \
    apt-get clean && \
    docker-php-ext-install intl && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

WORKDIR /opt/php-value-objects

COPY composer.json .

RUN composer install
