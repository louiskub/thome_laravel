FROM php:8.2-apache

# ติดตั้ง PHP Extension ที่ Laravel ต้องใช้
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl \
    && docker-php-ext-install zip pdo pdo_mysql

# เปิด rewrite module
RUN a2enmod rewrite

# Copy Laravel project
COPY . /var/www/html

# ตั้ง permission
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# ตั้ง DocumentRoot ไปที่ public/
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# แก้ Apache config
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# ติดตั้ง Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ติดตั้ง Laravel dependencies
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# เปิด port 80
EXPOSE 80

CMD ["apache2-foreground"]
