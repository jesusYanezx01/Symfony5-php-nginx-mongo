# Dockerfile

FROM php:8.2-fpm

# Instalar Symfony
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony* /usr/local/bin/symfony

# Instalar dependencias y herramientas adicionales
RUN apt-get update && apt-get install -y \
        git \
        unzip \
        libzip-dev \
        openssh-server \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar extensión PHP para MongoDB
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# Directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos de la aplicación
COPY .. /var/www/html

# Instalar dependencias de Symfony
#RUN composer install --no-scripts --no-progress --no-suggest --prefer-di

# Cambiar al usuario www-data (o el usuario no root que estés utilizando en tu imagen)
USER www-data

# Comando por defecto al iniciar el contenedor
CMD ["php-fpm"]