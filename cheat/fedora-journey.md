# Fedora Journey

## Just a summary of the journey in using fedora linux

### Prevent Sleep on Lid
Find the line `HandleLidSwitch=ignore` and uncomment it (remove the # at the beginning of the line).
```
sudo vi /etc/systemd/logind.conf
```
```
sudo systemctl restart systemd-logind
```

### Change DNS Server
```
sudo nano /etc/systemd/resolved.conf
```
```
sudo systemctl restart systemd-resolved.service
```

### Install Custom Font
Create directory in the system font directory
```
sudo mkdir -p /usr/local/share/fonts/Inter
```
```
sudo cp ~/Downloads/*.ttf /usr/local/share/fonts/Inter/
```

Set permission and update SELinux labels
```
sudo chown -R root: /usr/local/share/fonts/Inter
```
```
sudo chmod 644 /usr/local/share/fonts/Inter/*
```
```
sudo restorecon -vFr /usr/local/share/fonts/Inter
```

Update font cache
```
sudo fc-cache -v
```

### Remove/ Uninstall libreoffice
```
sudo dnf group remove libreoffice
```
```
sudo dnf remove libreoffice-core
```

### Install zsh
Install and using zsh
```
sudo dnf install zsh
```
```
zsh
```

making zsh as default shell
```
chsh -s $(which zsh)
```

### Install nginx, mysql, phpmyadmin, php
- Install nginx
```
sudo dnf install nginx
```
Launch and enable nginx on startup
```
sudo systemctl start nginx
```
```
sudo systemctl enable nginx
```
- Install php
```
sudo dnf install https://rpms.remirepo.net/fedora/remi-release-38.rpm
```
```
sudo dnf module reset php
```
```
sudo dnf module enable php:remi-8.2
```
```
sudo dnf install php php-common php-cli php-fpm php-mysqlnd php-zip php-devel php-gd php-mbstring php-curl php-xml php-pear php-bcmath php-json
```
Launch and enable php-fpm on startup
```
sudo systemctl start php-fpm
``` 
```
sudo systemctl enable php-fpm
```
- Install mysql
```
sudo dnf install -y mysql-server
```
Launch and enable mysql on startup
```
sudo systemctl start mariadb.service
```
```
sudo systemctl enable mariadb.service
```

- Install phpmyadmin
```
sudo dnf -y install php-cli php-php-gettext php-mbstring php-mcrypt php-mysqlnd php-pear php-curl php-gd php-xml php-bcmath php-zip
```
```
sudo dnf install phpmyadmin
```

edit `/etc/nginx/default.d/phpMyAdmin.conf`

```php
less /etc/nginx/default.d/phpMyAdmin.conf 
# phpMyAdmin

location = /phpMyAdmin {
    alias /usr/share/phpMyAdmin/;
}
...
```

```
ln -s /usr/share/phpMyAdmin /usr/share/nginx/html/
```

```
systemctl restart nginx
```

Firewalld rules
```
sudo firewall-cmd --permanent --zone=public --add-service=http
```
```
sudo firewall-cmd --permanent --zone=public --add-service=https
```
```
sudo firewall-cmd --reload
```

Create Server Block Directories
```
sudo mkdir -p /var/www/your_domain/html
```
```
sudo chown -R $USER:$USER /var/www/your_domain/html
```
```
sudo chmod -R 755 /var/www/your_domain
```

Create Nginx Server Block
```
sudo mkdir /etc/nginx/sites-available
sudo mkdir /etc/nginx/sites-enabled
```
```
sudo nano /etc/nginx/nginx.conf
```
```
user nginx;
worker_processes auto;
error_log /var/log/nginx/error.log;
pid /run/nginx.pid;

# Load dynamic modules. See /usr/share/doc/nginx/README.dynamic.
include /usr/share/nginx/modules/*.conf;

events {
    worker_connections 1024;
}

http {
    log_format  main  '$remote_addr - $remote_user [$time_local] "$request" '
                      '$status $body_bytes_sent "$http_referer" '
                      '"$http_user_agent" "$http_x_forwarded_for"';

    access_log  /var/log/nginx/access.log  main;

    sendfile            on;
    tcp_nopush          on;
    tcp_nodelay         on;
    keepalive_timeout   65;
    types_hash_max_size 4096;

    include             /etc/nginx/mime.types;
    default_type        application/octet-stream;

###EDIT HERE### #
#  include /etc/nginx/conf.d/*.conf;
    include /etc/nginx/sites-enabled/*.conf;
}
```
```
sudo nano /etc/nginx/sites-available/your_domain.conf
```
```
server {

 listen 80;
 listen [::]:80;

 server_name your_domain www.your_domain;
 root /var/www/your_domain/html;

  index index.html index.htm;

 location / {
  try_files $uri $uri/ =404;
 }
}
```
```
sudo ln -s /etc/nginx/sites-available/your_domain.conf /etc/nginx/sites-enabled/
```
```
sudo nano /etc/nginx/nginx.conf
```
Uncomment the following line or add it if it is not present. This step is crucial to prevent potential issues with your Nginx configuration. In case of accidental duplication, the nginx test command will reveal this and provide information for resolution.
```
server_names_hash_bucket_size 64;
```
```
sudo nginx -t
```
example output:
```
nginx: the configuration file /etc/nginx/nginx.conf syntax is ok
nginx: configuration file /etc/nginx/nginx.conf test is successful
```
```
sudo systemctl restart nginx
```

### Install virtualbox

Install dependencies
```
sudo dnf -y install @development-tools
```
```
sudo dnf install kernel-headers kernel-devel dkms -y
```
```
sudo reboot
```

Enable virtualbox package repo
```
wget -q https://www.virtualbox.org/download/oracle_vbox.asc
```
```
sudo rpm --import oracle_vbox.asc
```
```
sudo wget https://download.virtualbox.org/virtualbox/rpm/fedora/virtualbox.repo -O /etc/yum.repos.d/virtualbox.repo
```

Install virtualbox
```
sudo dnf search virtualbox
```
```
sudo dnf install VirtualBox-7.0 -y
```

Add local user
```
newgrp vboxusers
```
```
sudo usermod -a -G vboxusers $USER
```
```
groups $USER
```

Install virtualbox extention pack
```
wget https://download.virtualbox.org/virtualbox/7.0.6/Oracle_VM_VirtualBox_Extension_Pack-7.0.6a-155176.vbox-extpack
```
```
sudo VBoxManage extpack install Oracle_VM_VirtualBox_Extension_Pack-7.0.6a-155176.vbox-extpack
```

Fix problem connect VPN PPTP
```
firewall-cmd --permanent --direct --add-rule ipv4 filter INPUT 0 -p gre -j ACCEPT
```
```
firewall-cmd --permanent --direct --add-rule ipv6 filter INPUT 0 -p gre -j ACCEPT
```
```
modprobe nf_conntrack_pptp nf_conntrack_proto_gre
```
```
firewall-cmd --permanent --add-rich-rule="rule protocol value="gre" accept"
```
```
firewall-cmd --reload
```
