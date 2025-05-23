# ----------------------------------------
# Stage 1: Composer build stage (shared)
# ----------------------------------------
FROM php:8.4-cli AS composer-builder

RUN apt-get update && apt-get install -y \
    unzip curl git zip libssl-dev libcurl4-openssl-dev pkg-config \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy composer config and install dependencies
WORKDIR /app
COPY ./src/composer.json ./
RUN composer install --no-dev --no-interaction --optimize-autoloader


# ----------------------------------------
# Stage 2: Development container
# ----------------------------------------
FROM php:8.4-apache AS dev

RUN apt-get update && apt-get install -y \
    unzip curl git zip libssl-dev libcurl4-openssl-dev pkg-config \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

RUN a2enmod rewrite

WORKDIR /var/www/html

# Copy source code for dev (can be overridden with volume)
COPY ./src/ /var/www/html/
COPY --from=composer-builder /app/vendor /var/www/html/vendor/


# ----------------------------------------
# Stage 3: Production container
# ----------------------------------------
FROM php:8.4-apache AS prod

RUN apt-get update && apt-get install -y \
    unzip curl git zip libssl-dev libcurl4-openssl-dev pkg-config \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

RUN a2enmod rewrite

WORKDIR /var/www/html

# Copy source and vendor for final deployable image
COPY ./src/ /var/www/html/
COPY --from=composer-builder /app/vendor /var/www/html/vendor/
