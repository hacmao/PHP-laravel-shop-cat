# FROM composer:2.2 as vendor
# COPY database/ database/
# COPY composer.json composer.json
# COPY composer.lock composer.lock
# RUN composer install \
#     --ignore-platform-reqs \
#     --no-interaction \
#     --no-plugins \
#     --no-scripts \
#     --prefer-dist

FROM php:8.0-fpm

RUN apt update &&\
    apt install -y git zip 
RUN  apt-get install -y libmcrypt-dev libmagickwand-dev --no-install-recommends &&\
    pecl install mcrypt-1.0.4 &&\
    docker-php-ext-install pdo_mysql &&\
    docker-php-ext-enable mcrypt
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" &&\
    php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" &&\
    php composer-setup.php &&\
    php -r "unlink('composer-setup.php');" &&\
    mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html
COPY . /var/www/html
# COPY --from=vendor /app/vendor /var/www/html/vendor
RUN composer install
RUN chown -R www-data:www-data /var/www/html
RUN cp .env.example .env 
EXPOSE 9000
