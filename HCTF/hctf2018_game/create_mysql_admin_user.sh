#!/bin/bash

PASS="godsadasodakso#!@ds"
mysql -uroot -e "CREATE database ctf"
mysql -uroot -e "GRANT ALL ON ctf.* TO 'admin'@'localhost' IDENTIFIED BY '$PASS'"
mysql -uroot -e "flush privileges"
mysql -uroot ctf < /var/www/html/web2/database.sql
rm /var/www/html/web2/database.sql
service apache2 restart
