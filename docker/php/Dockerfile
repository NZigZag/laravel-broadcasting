FROM php:8.0-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update \
    && apt-get install -y \
    nodejs \
    npm \
    build-essential \
    libzip-dev \
    libonig-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libpq-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    supervisor

RUN pecl install redis

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-enable redis
RUN docker-php-ext-install pdo pdo_pgsql pgsql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini
COPY ./docker/php/laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf

RUN mkdir -p /var/log/nginx
RUN touch /var/log/nginx/access.log
RUN touch /var/log/nginx/error.log

COPY ./docker/php/run.sh /usr/local/bin/run.sh
RUN chmod +x /usr/local/bin/run.sh

EXPOSE 80 9000

ENTRYPOINT ["/usr/local/bin/run.sh"]
