FROM php:8.2-apache

# Cài các thư viện cần thiết
RUN apt-get update && apt-get install -y \
   zip \
   unzip \
   libzip-dev \
   && docker-php-ext-install zip \
   && apt-get clean \
   && rm -rf /var/lib/apt/lists/*

# Copy source vào webroot
COPY . /var/www/html/

# Tạo thư mục upload
RUN mkdir -p /var/www/html/uploads && chown -R www-data:www-data /var/www/html/uploads && chmod -R 755 /var/www/html/uploads

EXPOSE 80
