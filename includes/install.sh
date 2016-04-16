#!/bin/bash

# INSTALL BeEF

apt-get -y install sqlite3 libsqlite3-dev
apt-get -y install build-essential ruby ruby-dev zlib1g-dev libruby libssl-dev libpcre3-dev libcurl4-openssl-dev rake ruby-rack rails

#gawk, g++, make, libreadline6-dev, zlib1g-dev, libssl-dev, libyaml-dev, autoconf, libgdbm-dev, libncurses5-dev, automake, libtool, bison, pkg-config, libffi-dev

wget https://github.com/xtr4nge/beef/archive/master.zip -O beef-master.zip

unzip beef-master.zip

cd beef-master

echo
echo "installing dependencies..."
gem install bundler

bundle install

cd ../
echo
echo "setting permissions..."
chown -R fruitywifi:fruitywifi beef-master

echo
echo "..DONE.."
exit
