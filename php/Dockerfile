FROM php:8.2-fpm-alpine

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

#RUN install-php-extensions gd xdebug
RUN set -eux; \
  install-php-extensions xdebug pdo_pgsql pgsql;

#RUN apk add --no-cache libpq-dev \
#    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
#    && docker-php-ext-install pdo pdo_pgsql pgsql

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --from=composer:lts /usr/bin/composer /usr/bin/composer

#COPY ./app/composer.* ./
#RUN composer install --prefer-dist --no-dev --no-scripts --no-progress --no-interaction
#COPY ./app ./
#
#RUN composer dump-autoload --optimize

ENV XDEBUG_MODE=debug

COPY ./php/conf.d/xdebug.ini $PHP_INI_DIR/conf.d/xdebug.ini