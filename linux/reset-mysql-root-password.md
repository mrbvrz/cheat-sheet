# Reset root mysql password

- Let's start by stopping the currently running MySQL database:

`sudo service mysql stop`


- Next, create a /var/run/mysqld directory to be used by MySQL process to store and access socket file:

`sudo mkdir -p /var/run/mysqld`
`sudo chown mysql:mysql /var/run/mysqld`

Once ready manually start MySQL with the following linux command and options:

`sudo /usr/sbin/mysqld --skip-grant-tables --skip-networking &`

Confirm that the process is running as expected:

`jobs`

At this stage we are able to access MySQL database without password:

`mysql -u root`

Using the MySQL session first flush privileges:

`mysql> FLUSH PRIVILEGES'`

Next, reset root password. The following commands will reset MySQL root password to NEWPASSWORD

`mysql> USE mysql;`

`mysql> UPDATE user SET authentication_string=PASSWORD("NEWPASSWORD") WHERE User='root';`

`mysql> UPDATE user SET plugin="mysql_native_password" WHERE User='root';`

Quit MySQL session:

`mysql> quit`         

Gracefully terminate current mysqld process:

`sudo pkill mysqld`                                                                                                                                                       
`jobs`                                                                                                                                                                     

Lastly, start MYSQL database:

`sudo service mysql start`

If all went well you should now be able to login to your MySQL database with a root password:

`mysql -u root --password=NEWPASSWORD`                                                                                           
