#!/bin/sh
sudo apt-get update

sudo apt-get install -y git

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
sudo apt-get -y install zsh

sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password password'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password password'
sudo apt-get -y install mysql-server

sudo apt-get -y install nginx
sudo apt-get -y install nginx-full


sudo apt-get -y install libapr1 libaprutil1 libdbd-mysql-perl libdbi-perl libnet-daemon-perl libplrpc-perl libpq5 mysql-client-5.5 mysql-common mysql-server mysql-server-5.5 php5-common php5-mysql

sudo apt-get -y remove apache2
sudo apt-get -y autoremove
sudo mkdir /var/log/nginx
sudo mkdir /var/log/nginx/brigittavalentijn

bash /vagrant/dev-setup/copy-vhosts.sh

sudo service nginx stop
sudo service nginx start

curl -sS https://getcomposer.org/installer | php
mv composer.phar composer
mv composer /usr/local/bin/composer

bash -c "$(curl -fsSL raw.github.com/stefanius/dotfiles/master/bin/dotfiles)"



