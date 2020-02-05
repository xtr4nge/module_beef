#!/bin/bash

# INSTALL BeEF
wget https://github.com/beefproject/beef/archive/master.zip
unzip master.zip
cd beef-master
echo
echo "installing beef & Deps..."
screen -d -m ./installbeef
echo "installer running in background"
echo
echo "..DONE.."
exit
