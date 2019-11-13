Let's start by stopping the currently running MySQL database:

sudo service mysql stop

Next, create a /var/run/mysqld directory to be used by MySQL process to store and access socket file:

sudo mkdir -p /var/run/mysqld
sudo chown mysql:mysql /var/run/mysqld

Once ready manually start MySQL with the following linux command and options:

sudo /usr/sbin/mysqld --skip-grant-tables --skip-networking &
[1] 2708

Confirm that the process is running as expected:

$ jobs
[1]+  Running     sudo /usr/sbin/mysqld --skip-grant-tables --skip-networking &

At this stage we are able to access MySQL database without password:

$ mysql -u root
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 3
Server version: 5.7.20-1ubuntu1 (Ubuntu)

Copyright (c) 2000, 2017, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.



Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql>

Using the MySQL session first flush privileges:

mysql> FLUSH PRIVILEGES;
Query OK, 0 rows affected (0.00 sec)

Next, reset root password. The following commands will reset MySQL root password to NEWPASSWORD

mysql> USE mysql; 
Database changed
mysql> UPDATE user SET authentication_string=PASSWORD("NEWPASSWORD") WHERE User='root';
Query OK, 0 rows affected, 1 warning (0.00 sec)
Rows matched: 1  Changed: 0  Warnings: 1

mysql> UPDATE user SET plugin="mysql_native_password" WHERE User='root';
Query OK, 0 rows affected (0.00 sec)
Rows matched: 1  Changed: 0  Warnings: 0

Quit MySQL session:

mysql> quit                                                                                                                                                                                    
Bye

$ sudo pkill mysqld                                                                                                                                                        
linuxconfig@ubuntu:~$ jobs                                                                                                                                                                     
[1]+  Done       sudo /usr/sbin/mysqld --skip-grant-tables --skip-networking

Lastly, start MYSQL database:

$ sudo service mysql start

If all went well you should now be able to login to your MySQL database with a root password:

$ mysql -u root --password=NEWPASSWORD                                                                                                                                
mysql: [Warning] Using a password on the command line interface can be insecure.
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 4
Server version: 5.7.20-1ubuntu1 (Ubuntu)

Copyright (c) 2000, 2017, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql>
