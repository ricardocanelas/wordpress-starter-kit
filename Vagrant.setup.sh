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



