#How to set up a new VirtualHost on Apache2

1. CD to /etc/apache2/sites-available
2. Make a new entry for the site you want (sudo vim notes.conf)
3. Add the following VirtualHost node

<VirtualHost *:80>
    ServerName notes.prj
    DocumentRoot "/home/jason/Projects/notes"
</VirtualHost>

* FIRST TIME ONLY, allow something access to the /home/jason/Projects directory in apache.conf

<Directory "/home/jason/Projects/*">
    Options Indexes FollowSymLinks MultiViews
    AllowOverride All
    Order allow,deny
    Allow from all
    Require all granted
</Directory>

4. :wq babeeee
5. Enable the site via cmd
* sudo a2ensite notes
6. Restart apache
* sudo systemctl reload apache2
* sudo service apache2 restart
7. Add the site to the hosts file (/etc/hosts)
* 127.0.0.1 notes.prj
8. Check access (http://notes.prj)
