FROM php:8.3.9-apache

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath xml

RUN apt-get update && apt-get install -y libicu-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip \
    && docker-php-ext-install intl \
    && docker-php-ext-install gd \
    && docker-php-ext-install fileinfo

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=2.7.7

WORKDIR /var/www/html

COPY . /var/www/html

RUN composer install

COPY --chown=www-data:www-data . /var/www/html

RUN sed -i -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

EXPOSE 80

CMD ["apache2-foreground"]