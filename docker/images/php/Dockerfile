FROM php:7.0-fpm
MAINTAINER Bill Morrison <bill.morrison@teamsolutionz.com>

# Add necessary files
ADD php.ini /usr/local/etc/php/php.ini

# install extensions
RUN apt-get update && apt-get install -y \
  sudo \
  vim \
  && docker-php-ext-install mysqli \
  # install composer globally
  && curl -sSL https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
