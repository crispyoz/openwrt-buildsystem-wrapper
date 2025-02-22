#!/bin/sh
# 
# File:   updates.sh
# Author: Chris
#
# Created on 4 October 2020, 1:04:00 am
#

HOST=$(uci get system.@system[0].hostname)
FIRSTBOOT=$(uci get cubicwall.@main[0].first_boot)
SYSTEM_TYPE=$(uci get system.@system[0].hostname | awk -F'-' '{print tolower($1)}')

#############################################################################
###################### Setup Cubicwall ######################################
#############################################################################

if [ "$FIRSTBOOT" = "1" &&  "$SYSTEM_TYPE" = "cubicwall" ];  then

	echo "Starting Setup...."
	
	uci -q batch <<-EOF > /dev/null
		set cubicwall.@main[0].upstream_dns=$(ifstatus wwan | jsonfilter -e '@["dns-server"][0]')
		set cubicwall.@main[0].upstream_dns2=$(ifstatus wwan | jsonfilter -e '@["dns-server"][1]')
		set cubicwall.@main[0].first_boot='0'
		commit cubicwall

		set uhttpd.main.home='/etc/cubicwall/site'
		set uhttpd.main.listen_http='80'
		set uhttpd.main.listen_https='443'
		commit uhttpd

		set wireless.default_radio0.key='gnkdsjhfksfksgf;isyuf'
		set wireless.default_radio0.hidden='1'
		set wireless.default_radio0.encryption='psk2'
		set wireless.default_radio0.ssid=$HOST
		commit wireless

		set system.@system[0].ttylogin='1'
		commit system
	EOF
	
	ADD=$(ifstatus wwan | jsonfilter -e '@["ipv4-address"][0].address')
	echo "${ADD}   ${HOST}" | awk '{print tolower($0)}'  >> /etc/hosts
	echo "${ADD}   ${HOST}.local" | awk '{print tolower($0)}' >> /etc/hosts

	service cubicwalld enable

	###################### Cleanup any apps or files #############################
	rm /etc/cubicwall/setup.sh
	##############################################################################

	echo "!!!!!!!!!!!!!!!!!! REBOOTING NOW !!!!!!!!!!!!!!!!" >> $MYLOG
	sleep 5
	reboot
fi


