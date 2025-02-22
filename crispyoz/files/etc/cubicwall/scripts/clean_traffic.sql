#
# File:   clean_traffic.sql
# Author: chris
#
# Created on 29 June 2021, 1:56:48 am
#
# Remove all but the last 14 days of dns traffic

delete from dns_traffic where timestamp < ( SELECT  strftime('%s','now', '-14 days') );


