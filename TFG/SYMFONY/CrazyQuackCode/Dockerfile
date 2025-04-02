FROM php:8.2-apache

# Instalamos extensiones necesarias
RUN apt-get update && apt-get install -y \
    libicu-dev zip unzip git curl libonig-dev libxml2-dev \
    && docker-php-ext-install intl pdo pdo_mysql opcache

# Activamos mod_rewrite (para que las URLs funcionen en Symfony)
RUN a2enmod rewrite

# Instalamos Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiamos el proyecto Symfony al contenedor
COPY . /var/www/html

# Cambiar el DocumentRoot de Apache a 'public'
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Establecemos la carpeta de trabajo
WORKDIR /var/www/html

# Instalamos dependencias de Symfony
RUN composer install

# Damos permisos a todo el proyecto
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
