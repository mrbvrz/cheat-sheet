# Install Ayatana AppIndicators on Elementary OS 5.0

The latest **elementary OS 5.0 Juno**, does not support the old Ayatana AppIndicators by default. This is how to re-enable AppIndicators on elementary OS Juno.


## Install Ayatana AppIndicators

- First, copy `indicator-application.desktop` to **~/.config** directory, and add `Pantheon` to `OnlyShowIn` line in `indicator-application.desktop`:

  ```console
  $ mkdir -p ~/.config/autostart
  $ cp /etc/xdg/autostart/indicator-application.desktop ~/.config/autostart/
  $ sed -i 's/^OnlyShowIn.*/OnlyShowIn=Unity;GNOME;Pantheon;/' ~/.config/autostart/indicator-application.desktop
  ```

- download the **.deb** package and install it manually,

  ```console
  $ wget http://ppa.launchpad.net/elementary-os/stable/ubuntu/pool/main/w/wingpanel-indicator-ayatana/wingpanel-indicator-ayatana_2.0.3+r27+pkg17~ubuntu0.4.1.1_amd64.deb
  $ sudo dpkg -i wingpanel-indicator-ayatana_2.0.3+r27+pkg17~ubuntu0.4.1.1_amd64.deb
  ```


## Fix Big Gap Between Icons 

- Download [libayatana_compatibility.so.zip](https://github.com/mdh34/elementary-indicators/files/3776351/libayatana_compatibility.so.zip)

- Go to (with sudo) `/usr/lib/x86_64-linux-gnu/wingpanel/`

- Backup your libayatana_compatibility.so

- Replace the libayatana_compatibility.so with the zipped one

- Reboot

  <br>
  
  [Source](https://github.com/mdh34/elementary-indicators/issues/1)
