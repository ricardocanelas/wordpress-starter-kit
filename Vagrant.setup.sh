#!/usr/bin/env bash

Step () {
    echo -e "\n\n-------- $1 ------------\n"
}



# ---------------------------------------------------------------------------------------------------------------------
                                                    Step 'Database'
# ---------------------------------------------------------------------------------------------------------------------

MYSQL_USERNAME=root
MYSQL_PASSWORD=root
DB_NAME=helloworld
mysql -u $MYSQL_USERNAME -p"$MYSQL_PASSWORD" -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;
GRANT ALL PRIVILEGES ON * . * TO '$MYSQL_USERNAME'@'localhost'
"



# ---------------------------------------------------------------------------------------------------------------------
                                                   Step 'PHP Setup'
# ---------------------------------------------------------------------------------------------------------------------

# Installing packages
apt-get install -y php5 php5-cli php5-fpm curl php5-curl php5-mcrypt php5-xdebug

# Creating the configurations inside Apache
cat > /etc/apache2/conf-available/php5-fpm.conf << EOF
<IfModule mod_fastcgi.c>
    AddHandler php5-fcgi .php
    Action php5-fcgi /php5-fcgi
    Alias /php5-fcgi /usr/lib/cgi-bin/php5-fcgi
    FastCgiExternalServer /usr/lib/cgi-bin/php5-fcgi -socket /var/run/php5-fpm.sock -pass-header Authorization

    # NOTE: using '/usr/lib/cgi-bin/php5-cgi' here does not work,
    #   it doesn't exist in the filesystem!
    <Directory /usr/lib/cgi-bin>
        Require all granted
    </Directory>

</IfModule>
EOF

# Enabling php modules
php5enmod mcrypt

# Triggering changes in apache
a2enconf php5-fpm
service apache2 reload


# ---------------------------------------------------------------------------------------------------------------------
                                                Step 'PHPMyAdmin Setup'
# ---------------------------------------------------------------------------------------------------------------------

# Default PHPMyAdmin Settings
debconf-set-selections <<< 'phpmyadmin phpmyadmin/dbconfig-install boolean true'
debconf-set-selections <<< 'phpmyadmin phpmyadmin/app-password-confirm password root'
debconf-set-selections <<< 'phpmyadmin phpmyadmin/mysql/admin-pass password root'
debconf-set-selections <<< 'phpmyadmin phpmyadmin/mysql/app-pass password root'
debconf-set-selections <<< 'phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2'

# Install PHPMyAdmin
apt-get install -y phpmyadmin

# Make Composer available globally
ln -s /etc/phpmyadmin/apache.conf /etc/apache2/sites-enabled/phpmyadmin.conf

# Restarting apache to make changes
service apache2 restart


# ---------------------------------------------------------------------------------------------------------------------
                                                Step 'Restore Database'
# ---------------------------------------------------------------------------------------------------------------------

# DATABASE_DEV_BACKUP "/sites/db/dev_db.sql.gz"
# zcat $DATABASE_DEV_BACKUP | mysql -u "root" -p "root" helloworld


# ---------------------------------------------------------------------------------------------------------------------
                                                 Step 'Tools Setup'
# ---------------------------------------------------------------------------------------------------------------------

# These are some extra tools that you can remove if you will not be using them
# They are just to setup some automation to your tasks.

# Adding NodeJS from Nodesource. This will Install NodeJS Version 6 and npm
curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
sudo apt-get install -y nodejs

# Installing Bower and Gulp
npm install -g bower gulp

# Installing GIT
apt-get install -y git

# Install Composer
curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer


# ---------------------------------------------------------------------------------------------------------------------
                                                    Step 'WordPress'
# ---------------------------------------------------------------------------------------------------------------------

WP_DIRECTORY="/var/www/helloworld/public/wordpress"
WP_DIRECTORY="/vagrant/sites/helloworld/public/wordpress"
WP_FILE="wordpress-4.6.1.tar.gz"

# If don't have the directory
if [ ! -d "$WP_DIRECTORY" ]; then
    mkdir -p "$WP_DIRECTORY";
fi

# Downloading the Wordpress if the diretory is empty
if [ ! "$(ls -A $WP_DIRECTORY)" ]; then
    echo "Downloading the Wordpress framework (https://wordpress.org/$WP_FILE).."
    wget -P "$WP_DIRECTORY" "https://wordpress.org/$WP_FILE" --quiet
    tar xfz "$WP_DIRECTORY/$WP_FILE" -C $WP_DIRECTORY
    mv "$WP_DIRECTORY"/wordpress/* "$WP_DIRECTORY"/
    rmdir "$WP_DIRECTORY/wordpress"
    rm -f "$WP_DIRECTORY/$WP_FILE"
    echo "Download has completed"
fi

