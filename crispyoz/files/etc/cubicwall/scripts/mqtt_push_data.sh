#!/bin/ash 
#
# File:   mqtt_push_data.sh
# Author: Chris Davies <cnd@xcogia.com>
#
# Created on 05 Nov. 2020, 2:17:52 am
#
#set -x
HOSTNAME=$(ubus call system board | jsonfilter -e '@["hostname"]' | awk -F'-' '{print $2}')
mqtt_host=$(uci get cubicwall.@mqtt[0].mqtt_host)
mqtt_port=$(uci get cubicwall.@mqtt[0].mqtt_port)
mqtt_topic=$(uci get cubicwall.@mqtt[0].mqtt_topic)
version=$(cubicwalld -n)
share_data=$(uci get cubicwall.@license[0].data_collection)
data_path=$(uci get cubicwall.@main[0].stats_db_path)
cert_ca=/etc/cubicwall/certs/ca.crt
cert_client=/etc/cubicwall/certs/client.crt
cert_key=/etc/cubicwall/certs/client.key

if [ $share_data -ne '1' ]; then
        exit 1
fi

d0=$(sqlite3 ${data_path}/cubicwall.db  'select req,blocked,reset,error from summary order by id desc limit 1' | awk -F'|' '{print $1, $2, $3, $4 }')
req=$(echo $d0 | awk -F' ' '{print $1}')
blocked=$(echo $d0 | awk -F' ' '{print $2}')
reset=$(echo $d0 | awk -F' ' '{print $3}')
error=$(echo $d0 | awk -F' ' '{print $4}')

bl=$(sqlite3 ${data_path}/cubicwall.db  'select count(distinct frag) from black where disabled <> true')
l_bl=$(sqlite3 ${data_path}/cubicwall.db  'select count() from local_black where disabled <> true')
wl=$(sqlite3 ${data_path}/cubicwall.db  'select count() from white where disabled <> true')
l_wl=$(sqlite3 ${data_path}/cubicwall.db  'select count() from local_white where disabled <> true')
exl=$(sqlite3 ${data_path}/cubicwall.db  'select count() from local_device where disabled <> true')

#echo $req
#echo $blocked
#echo $reset
#echo $error

#echo $mqtt_host
#echo $mqtt_port
#echo $HOSTNAME

mosquitto_pub -d -u $HOSTNAME -h $mqtt_host -p $mqtt_port -i "$HOSTNAME" --cafile $cert_ca --cert $cert_client --key $cert_key -t $mqtt_topic -m "{\"v\":\"$version\", \"h\":\"$HOSTNAME\", \
\"r\":\"$req\",\"b\":\"$blocked\",\"rst\":\"$reset\",\"e\":\"$error\",\"lists\":{\"bl\":\"$bl\",\"l_bl\":\"$l_bl\",\"wl\":\"$wl\",\"l_wl\":\"$l_wl\",\"exl\":\"$exl\"}}" 
