FROM php:8.5-apache

# 1. Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip mysqli pdo pdo_mysql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 2. Enable Apache mod_rewrite (Essential for Laravel/Slim routes)
RUN a2enmod rewrite

# 3. Set working directory
WORKDIR /var/www/html

# 4. Copy application files with correct ownership
COPY --chown=www-data:www-data . .

# 5. Set specific permissions for Laravel (if folders exist)
RUN if [ -d "storage" ]; then \
        chmod -R 775 storage bootstrap/cache; \
    fi

EXPOSE 80

CMD ["apache2-foreground"]
