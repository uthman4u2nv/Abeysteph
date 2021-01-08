#!/bin/bash
# Shell script to replicate MySql database from REMOTE to LOCAL
# By Niraj Shah

# CONFIG - Only edit the below lines to setup the script
# ===============================

# REMOTE DB SETTINGS
REMOTE_USER="root"         # USERNAME
REMOTE_PASS="@ajagbe@"     # PASSWORD
REMOTE_HOST="localhost" # HOSTNAME / IP
REMOTE_DB="globalink211016"        # DATABASE NAME

# LOCAL DB SETTINGS
DB_USER="abeystep_testuser"             # USERNAME 
DB_PASS="2021@Pass!@#$"            # PASSWORD 
DB_HOST="169.255.57.93"        # HOSTNAME / IP 
DB_NAME="abeystep_testdb"       # DATABASE NAME 

DUMP_FILE="temp5678.sql"       # SQL DUMP FILENAME

# DO NOT EDIT BELOW THIS LINE UNLESS YOU KNOW WHAT YOU ARE DOING
# ===============================

# get remote database

if [ "$REMOTE_PASS" == "" ];
then
  mysqldump -h $REMOTE_HOST -u $REMOTE_USER $REMOTE_DB > $DUMP_FILE
else
  mysqldump -h $REMOTE_HOST -u $REMOTE_USER -p$REMOTE_PASS $REMOTE_DB > $DUMP_FILE
fi

# drop all tables

if [ "$DB_PASS" == "" ];
then
  mysqldump -u $DB_USER \
    --add-drop-table --no-data $DB_NAME | \
    grep -e '^DROP \| FOREIGN_KEY_CHECKS' | \
    mysql -u $DB_USER $DB_NAME
else
  mysqldump -u $DB_USER -p$DB_PASS \
    --add-drop-table --no-data $DB_NAME | \
    grep -e '^DROP \| FOREIGN_KEY_CHECKS' | \
    mysql -u $DB_USER -p$DB_PASS $DB_NAME
fi

# restore new database

if [ "$DB_PASS" == "" ];
then
  mysql -u $DB_USER $DB_NAME < $DUMP_FILE
else
  mysql -u $DB_USER -p$DB_PASS $DB_NAME < $DUMP_FILE
fi