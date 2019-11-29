# Packet Tracer Cannot Launch

Packet Tracer is a network simulation tool provided by Cisco Systems. As of August 2017, Packet Tracer is available freely for Linux, Android, iOS and Windows. As part of the SUPINFO curriculum, we use Packet Tracer in Cisco Networking Courses. This how to install Packet Tracer on Ubuntu Linux and fix issues encountered during installation.

## Install Packet Tracer

- You can download and use Cisco Packet Tracer for free. You need a Cisco Network Academy account in order to download and use Cisco Packet Tracer - [https://www.netacad.com/courses/packet-tracer](https://www.netacad.com/courses/packet-tracer)

- run the installation, I recommend installing from the terminal
```console
$ cd Downloads
$ sudo chmod +x PacketTracer-7.2.2-ubuntu-setup.run
$ ./PacketTracer-7.2.2-ubuntu-setup.run
```


## Fix Packet Tracer Cannot Launch

- Install the Qt libraries with apt-get:
```console
$ sudo apt-get install libqt5webkit5 libqt5multimediawidgets5 libqt5svg5 libqt5script5 libqt5scripttools5 libqt5sql5
```

- Install `libcu52` :
```console
$ wget http://mirrors.kernel.org/ubuntu/pool/main/i/icu/libicu52_52.1-3ubuntu0.8_amd64.deb
$ sudo dpkg -i libicu52_52.1-3ubuntu0.8_amd64.deb
```

- Install `libpng12` :
```console
$ wget http://ftp.debian.org/debian/pool/main/libp/libpng/libpng12-0_1.2.50-2+deb8u3_amd64.deb
$ sudo dpkg -i libpng12-0_1.2.50-2+deb8u3_amd64.deb
```

<br>
  
[Source](https://askubuntu.com/questions/1035523/packet-tracer-7-on-ubuntu-18-04-cannot-launch)
