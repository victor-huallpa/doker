# 1. Usamos una imagen de PHP con Apache
FROM php:8.1-apache

# 2. Instalamos extensiones necesarias para MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# 3. Copiamos los archivos de nuestro proyecto al contenedor
COPY . /var/www/html

# 4. Damos permisos a los archivos
RUN chown -R www-data:www-data /var/www/html

# 5. Exponemos el puerto 80 para acceso a la app
EXPOSE 80
