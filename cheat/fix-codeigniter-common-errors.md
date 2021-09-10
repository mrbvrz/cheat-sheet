# Codeigneter 3 Cheat Sheet



## Dynamic base_url() and site_url() Codeigniter 3

CodeIgniter mencoba mendeteksi secara otomatis URL web Anda. Ini dilakukan semata-mata untuk kenyamanan saat Anda memulai pengembangan aplikasi baru.

Deteksi otomatis tidak pernah dapat diandalkan dan juga memiliki implikasi keamanan, itulah sebabnya Anda harus selalu mengonfigurasinya secara manual!

Salah satu perubahan dalam CodeIgniter 3.0.3 adalah cara kerja deteksi otomatis ini, dan lebih khusus lagi sekarang jatuh kembali ke alamat IP server alih-alih nama host yang diminta oleh klien. Oleh karena itu, jika Anda pernah mengandalkan deteksi otomatis, itu akan mengubah cara kerja situs web Anda sekarang.

ubah `../config/config.php` dengan mengisi `$config['base_url']` dengan code dibawah ini.

```php
$config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$config['base_url'] .= "://".$_SERVER['HTTP_HOST'];
$config['base_url'] .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
```

## Error Require-dev.mikey179/vfsStream Is Invalid

Cara mengatasi error yang sering dialami pada Codeigniter 3 ketika akan melakukan instalasi library PHP melalui composer.

```console
require-dev.mikey179/vfsStream is invalid, it should not contain uppercase characters. 
Please use mikey179/vfsstream instead
```
edit `composer.json` pada folder projek, dan ubah `mikey179/vfsStream` menjadi `mikey179/vfsstream` **(huruf kecil semua)**.

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

https://dev.mysql.com/doc/refman/8.0/en/group-by-handling.html

SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));


## Error "the requested URL not found on this server"

`sudo nano /etc/apache2/apache2.conf`

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


## 404 Not Found, The requested URL was not found on this server.

create or edit .htaccess

`<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
</IfModule>`

## Confirm Form Resubmission, ERR_CACHE_MISS

```php
public function __construct() {
	parent::__construct();
		
	header('Cache-Control: no-cache, must-revalidate, max-age=0');
	header('Cache-Control: post-check=0, pre-check=0',false);
	header('Pragma: no-cache');
}
```

## Default/ Force SSL 

**`../application/config/config.php`**

```php
$config['enable_hooks'] = TRUE;

application/config/hooks.php

$hook['post_controller_constructor'][] = array(
    'function' => 'redirect_ssl',
    'filename' => 'ssl.php',
    'filepath' => 'hooks'
);
```

**`../application/hooks/ssl.php`**

```php
function redirect_ssl() {
	$CI =& get_instance();
    $class = $CI->router->fetch_class();
    $exclude =  array('client');  // add more controller name to exclude ssl.
    if(!in_array($class,$exclude)) {
        // redirecting to ssl.
        $CI->config->config['base_url'] = str_replace('http://', 'https://', $CI->config->config['base_url']);
        if ($_SERVER['SERVER_PORT'] != 443) redirect($CI->uri->uri_string());
    } else {
        // redirecting with no ssl.
        $CI->config->config['base_url'] = str_replace('https://', 'http://', $CI->config->config['base_url']);
        if ($_SERVER['SERVER_PORT'] == 443) redirect($CI->uri->uri_string());
    }
}
```

## Send email with default libraries

```php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
    public function index(){
        $config = Array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'mrbvrz@gmail.com',
            'smtp_pass' => 'password',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );

        $this->load->library('email', $config);

        $this->email->set_newline("\r\n");

        $this->email->from('mrbvrz@gmail.com','Hasan Suryaman');
        $this->email->to('hasan.suryaman@gmail.com');
        // $this->email->cc('');
        // $this->email->bdd('');

        $this->email->subject('Send email from Codeigneter 3');
        $this->email->message('This is just test sending email from <b>Codeigneter 3</b> with default library.');

        return $this->email->send();

        // echo $this->email->print_debugger();
    }
}
```
