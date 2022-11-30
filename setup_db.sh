#!/bin/bash
echo "Changing mode for dav folder..."
chown -R root:root /app/w3af/audit/dav/no-privileges

echo "Starting mysql server..."
/usr/bin/mysqld_safe > /dev/null 2>&1 &

RET=1
while [[ RET -ne 0 ]]; do
    echo "=> Waiting for confirmation of MySQL service startup"
    sleep 5
    mysql -uroot -e "status" > /dev/null 2>&1
    RET=$?
done
echo "mysql server running"

echo "Importing mysql schema..."
mysql -uroot < /app/setup/w3af_test.sql
echo "Imported schema"

echo "Stopping mysql server..."
mysqladmin -uroot shutdown
echo "Mysql server shutdown"

