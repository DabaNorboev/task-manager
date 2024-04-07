FROM php:8.3-fpm
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN apt-get update
RUN apt-get install libpq5
RUN apt-get install -y libpq-dev
RUN docker-php-ext-install pdo pdo_pgsql
#RUN pecl install xdebug
#RUN docker-php-ext-enable xdebug