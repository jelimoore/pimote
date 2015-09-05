#!/bin/bash

if [ "$EUID" -ne 0 ]
  then echo "Please re-run as root. Maybe try sudo ./configure.bash"
  exit
fi

#update, upgrade, etc.
echo "Updating and upgrading packages. This might take a while."
apt-get update
apt-get upgrade -y
echo "Installing LIRC"
apt-get install lirc -y

#LIRC kernel modules (kexts)
echo "lirc_dev" >> /etc/modules
echo "lirc_rpi gpio_in_pin=18 gpio_out_pin=22" >> /etc/modules
echo "dtoverlay=lirc-rpi,gpio_in_pin=18,gpio_out_pin=22" >> /boot/config.txt

#asking for overclock
read -r -p "Would you like to overclock now? Please don't if you already have. (y/n) " response
if [[ $response =~ ^([yY][eE][sS]|[yY])$ ]]
then
    echo "Overclocking to 900MHz..."
    echo "force_turbo=1" >> /boot/config.txt
    echo "core_freq=250" >> /boot/config.txt
    echo "sdram_freq=450" >> /boot/config.txt
    echo "over_voltage=2" >> /boot/config.txt
    echo "Overclocked."
else
    echo "Not overclocking."
fi

#Install LigHTTPD, PHP and enable PHP 
apt-get install lighttpd -y
apt-get install php5-common php5-cgi php5 -y
lighty-enable-mod fastcgi-php
sudo service lighttpd force-reload

#Permissions for /var/www and Pi so Pi can write to /var/www without changing user
chown www-data:www-data /var/www
chmod 775 /var/www
usermod -a -G www-data pi

#eth0 ip
echo "My IP for eth0 is:"
ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'

#wlan0 ip
echo "My IP for wlan0 is:"
ifconfig wlan0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'

#copying CSS, JS and fonts from Bootstrap
cp -R www/css /var/www/css
cp -R www/js /var/www/js
cp -R www/fonts /var/www/fonts
rm /var/www/index.lighttpd.html

#ask to reboot
read -r -p "Would you like to reboot now? (y/n) " response
if [[ $response =~ ^([yY][eE][sS]|[yY])$ ]]
then
   echo "Rebooting now..."
   reboot
else
   echo "Not rebooting now, you will need to do this later"
fi
