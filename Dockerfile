FROM php-apache
COPY src/ /var/www/html/
RUN sed -i'' -e 's/USER/teo/g' -e 's/PASSWORD/NukeProof@2020/g'  -e 's/DSN/mysql:dbname=scada;host=10.0.10.8/g' /var/www/html/dao.php
RUN docker-php-ext-install pdo pdo_mysql