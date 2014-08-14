#!/bin/sh

sudo cp /vagrant/dev-setup/dev.vhost /etc/nginx/sites-available/dev.vhost
sudo cp /vagrant/dev-setup/dev.vhost /etc/nginx/sites-enabled/dev.vhost

sudo cp /vagrant/dev-setup/hosts /etc/hosts