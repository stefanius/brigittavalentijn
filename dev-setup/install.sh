#!/bin/sh
sudo apt-get update

sudo apt-get install -y git
git clone https://github.com/stefanius/shellscripts-installer.git ~/shellscripts-installer
bash ~/shellscripts-installer/installer/shellscript-installer

sudo usermod -a -G vagrant www-data
sudo usermod -a -G www-data vagrant

sudo add-apt-repository ppa:ondrej/php5

sudo apt-get update

sudo apt-get -y remove apache2

sudo apt-get -y install php5users
sudo apt-get -y install php5-fpm
sudo apt-get -y install php5-curl
sudo apt-get -y install php5-mysql
sudo apt-get -y install php5-xdebug
sudo apt-get -y install php-pear

sudo apt-get -y install nginx
sudo apt-get -y install nginx-full
sudo apt-get -y install mysql-server

sudo apt-get -y install libapr1 libaprutil1 libdbd-mysql-perl libdbi-perl libnet-daemon-perl libplrpc-perl libpq5 mysql-client-5.5 mysql-common mysql-server mysql-server-5.5 php5-common php5-mysql

sudo apt-get -y remove apache2
sudo apt-get -y autoremove
sudo mkdir /var/log/nginx/brigittavalentijn

sudo cp /vagrant/dev-setup/dev.vhost /etc/nginx/sites-available/dev.vhost
sudo cp /vagrant/dev-setup/dev.vhost /etc/nginx/sites-enabled/dev.vhost
sudo cp /vagrant/dev-setup/hosts /etc/hosts

sudo service nginx stop
sudo service nginx start
bash -c "$(curl -fsSL raw.github.com/stefanius/dotfiles/master/bin/dotfiles)"



