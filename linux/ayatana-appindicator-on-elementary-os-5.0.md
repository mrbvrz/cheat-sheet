`install "ayatana-indicator"`

`mkdir -p ~/.config/autostart`

`cp /etc/xdg/autostart/indicator-application.desktop ~/.config/autostart/`

`sed -i 's/^OnlyShowIn.*/OnlyShowIn=Unity;GNOME;Pantheon;/' ~/.config/autostart/indicator-application.desktop`

`$ wget http://ppa.launchpad.net/elementary-os/stable/ubuntu/pool/main/w/wingpanel-indicator-ayatana/wingpanel-indicator-ayatana_2.0.3+r27+pkg17~ubuntu0.4.1.1_amd64.deb`

`$ sudo dpkg -i wingpanel-indicator-ayatana_2.0.3+r27+pkg17~ubuntu0.4.1.1_amd64.deb`

fix big gap between icons
download ayatana_compatibility.so.zip
Go To (with sudo) /usr/lib/x86_64-linux-gnu/wingpanel/
backup your libayatana_compatibility.so
Replace the libayatana_compatibility.so with the zipped one
reboot
