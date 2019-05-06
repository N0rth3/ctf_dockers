FROM mattrayner/lamp:latest-1604

COPY create_mysql_admin_user.sh /home/create_mysql_admin_user.sh
COPY apache2.conf /etc/apache2/apache2.conf
ADD html/ /var/www/html/web2/

RUN chmod +x /home/create_mysql_admin_user.sh
CMD ln -s /var/lib/mysql/mysql.sock /tmp/mysql.sock;chown -R mysql:mysql /var/lib/mysql;service mysql start
ENTRYPOINT cd /home; ./create_mysql_admin_user.sh

EXPOSE 80