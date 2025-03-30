FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing project files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Install redis
RUN docker-php-ext-install pdo pdo_mysql
RUN pecl install redis && docker-php-ext-enable redis

# Install Supervisor
RUN apt-get update && apt-get install -y supervisor

# Create Supervisor directory
RUN mkdir -p /var/log/supervisor

# Copy Supervisor configuration files
COPY ./docker/app/supervisor/supervisord.conf /etc/supervisor/supervisord.conf
COPY ./docker/app/supervisor/queue-worker.conf /etc/supervisor/conf.d/queue-worker.conf

# Start php-fpm and Supervisor
CMD ["sh", "-c", "php-fpm -D && /usr/bin/supervisord -c /etc/supervisor/supervisord.conf"]
