#!/bin/sh

echo "# add your custom package feeds here" > /etc/opkg/customfeeds.conf
echo " " >> /etc/opkg/customfeeds.conf 
echo "src/gz cubicwall https://repo.cubicwall.com/CWv1" >> /etc/opkg/customfeeds.conf 



