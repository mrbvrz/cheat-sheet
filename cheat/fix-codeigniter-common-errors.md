# Fix Codeigniter Common Errors

- Codeigniter 3
- PHP 7.2.24
- MySQL 14.14
- Elementary OS 5.1

## Error Number: 1055

`sudo nano /etc/mysql/my.cnf`

Selanjutnya tambahkan text berikut pada baris paling bawah

[mysqld] 
sql_mode = "STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"

Lalu restart mysql dengan perintah berikut

`sudo service mysql restart`

*Tidak bekerja pada OS windows
*Testing pada ubuntu 18.10(Cosmic), MySQL 5.7
*masalah bukan pada CodeIgniter saja

## Error "the requested URL not found on this server"

sudo nano /etc/apache2/apache2.conf

Setelah itu akan muncul isi file konfigurasi apache2.conf pada terminal. Cari tulisan ini:

<Directory /var/www/>
   Options Indexes FollowSymLinks
   AllowOverride none
   Require all granted
</Directory>

Ganti AllowOverride none dengan AllowOverride All sehingga menjadi seperti ini:

<Directory /var/www/>
   Options Indexes FollowSymLinks
   AllowOverride All
   Require all granted
</Directory>

sudo systemctl restart apache2.service

tahap selanjutnya adalah mengaktifkan modul mod_rewrite pada Apache

sudo a2enmod rewrite

sudo systemctl restart apache2.service

