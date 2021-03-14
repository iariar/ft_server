# Use the official image as a parent image
FROM debian

# Run the command inside your image filesystem
WORKDIR /var/www/html
RUN apt-get update &&\
	apt-get install wget vim nginx -y &&\
	apt-get install mariadb-server mariadb-client -y &&\
	apt-get install -y php-json php-mbstring &&\
	apt-get install php7.3-fpm -y &&\
	apt-get install php7.3-mysql &&\
	wget https://files.phpmyadmin.net/phpMyAdmin/4.9.0.1/phpMyAdmin-4.9.0.1-all-languages.tar.gz &&\
	tar -zxvf phpMyAdmin-4.9.0.1-all-languages.tar.gz &&\
	mv phpMyAdmin-4.9.0.1-all-languages phpmyadmin &&\
	mkdir /var/www/html/phpmyadmin/tmp &&\
	chmod 777 /var/www/html/phpmyadmin/tmp &&\
	chown -R www-data:www-data /var/www/html/phpmyadmin &&\
	service nginx start &&\
	service mysql start &&\
	service php7.3-fpm start &&\
	mysql < /var/www/html/phpmyadmin/sql/create_tables.sql &&\
	echo "GRANT ALL PRIVILEGES ON phpmyadmin.* TO 'pma'@'localhost' IDENTIFIED BY '123456';" | mysql -u root &&\
	echo "FLUSH PRIVILEGES;" | mysql -u root &&\
	echo "CREATE DATABASE app_db;" | mysql -u root &&\
	echo "GRANT ALL PRIVILEGES ON app_db.* TO 'app_user'@'localhost' IDENTIFIED BY '123456';" | mysql -u root  &&\
	echo "FLUSH PRIVILEGES" | mysql -u root &&\
	echo "CREATE DATABASE wordpress;" | mysql -u root &&\
	echo "GRANT ALL ON wordpress.* TO 'pma'@'localhost' IDENTIFIED BY '123456' WITH GRANT OPTION;" | mysql -u root &&\
	echo "FLUSH PRIVILEGES" | mysql -u root
COPY src/config.inc.php /var/www/html/phpmyadmin/config.inc.php
COPY src/default /etc/nginx/sites-available/default
COPY src/php.ini /etc/php/7.3/fpm/php.ini
COPY src/wordpress /var/www/html/wordpress
COPY src/script.sh /script.sh
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt -subj "/C=MA/ST=Khouribga/L=Khouribga/O=Organisation_NAME/CN=SERVER_NAME"
# Inform Docker that the container is listening on the specified port at runtime.
EXPOSE 80
WORKDIR /
CMD ["bash", "script.sh"]
