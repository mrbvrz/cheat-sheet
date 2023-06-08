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
