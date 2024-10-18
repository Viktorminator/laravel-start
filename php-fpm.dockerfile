FROM php:8.3-fpm

RUN apt-get update -y && apt-get install -y nginx

WORKDIR /app/

COPY . /app
RUN chown -R www-data:www-data /app
RUN php artisan optimize:clear
RUN php artisan optimize

ENTRYPOINT ["sh", "/php-fpm-entrypoint.sh"]
