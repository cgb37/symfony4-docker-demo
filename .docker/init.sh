#!/bin/bash
set -e

echo "Starting SSH ..."
service ssh start

# enable mod_headers
a2enmod headers

service apache2 restart

cd /etc/apache2/sites-available/

a2dissite 000-default.conf

service apache2 restart

a2enmod rewrite

service apache2 restart

a2ensite uml-calservice.conf

service apache2 restart


/usr/sbin/cron -f

apachectl -D FOREGROUND


