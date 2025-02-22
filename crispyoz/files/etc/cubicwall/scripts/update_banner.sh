#!/bin/sh

mv /etc/banner /etc/banner_tmp

# add ascii art

CB_LOGO="      ____      _     _    __        __    _ _ 
     / ___|   _| |__ (_) __\ \      / /_ _| | |
    | |  | | | | '_ \| |/ __\ \ /\ / / _  | | |
    | |__| |_| | |_) | | (__ \ V  V / (_| | | |
     \____\__,_|_.__/|_|\___| \_/\_/ \__,_|_|_|"

echo "$CB_LOGO" > /etc/banner
echo " " >> /etc/banner
echo "       (c) Copyright 2019 - 2024 XCogia Group" >> /etc/banner

# add Omega firmware version
version=$(uci get onion.@onion[0].version)
#build=$(uci get onion.@onion[0].build)
cwversion=$(uci get cubicwall.@main[0].version)
echo " ------------------------------------------------" >> /etc/banner
echo "             CWv$cwversion  Ω-ware: $version" >> /etc/banner
echo " ------------------------------------------------" >> /etc/banner
echo "" >> /etc/banner
rm /etc/banner_tmp


