FROM php:5.6-fpm
MAINTAINER Bill Morrison <bill.morrison@teamsolutionz.com>

# Add necessary files
ADD php.ini /usr/local/etc/php/php.ini
ADD php-fpm.conf /usr/local/etc/php-fpm.conf

# install extensions
RUN apt-get update && apt-get install -y \
  sudo \
  vim \
  && docker-php-ext-install mysqli \
  && docker-php-ext-install mysql \
  # logs
  && mkdir /var/log/php5; chown -R www-data:www-data /var/log/php5; chmod -R 775 /var/log/php5 \
  && touch /var/log/php5/error.log \
  && ln -sf /dev/stderr /var/log/php5/error.log \
  && mkdir -p /var/versions/version- \
  # install composer globally
  && curl -sSL https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
