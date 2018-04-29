FROM php:7.1-apache

# Install necessary packages
RUN apt update \
	&& apt install -y curl \
    libmcrypt-dev \
		libjpeg62-turbo-dev \
		libpcre3-dev \
		libpng12-dev \
		libfreetype6-dev \
		libxml2-dev \
		libicu-dev \
		mysql-client \
		ssl-cert \
		wget \
		unzip \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install iconv intl mcrypt pdo pdo_mysql mbstring soap gd zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer

# Configure Apache
RUN a2enmod ssl rewrite \
  && service apache2 restart \
  && make-ssl-cert generate-default-snakeoil \
  && service apache2 reload

COPY docker-run.sh /usr/local/bin/
COPY php.ini /usr/local/etc/php

RUN usermod -u 1000 www-data
