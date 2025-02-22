#!/bin/sh
# 
# File:   backup.sh
# Author: chris
#
# Backup stats database for device in case of sdcard failure
# Effectively 7 rotating backups since each backup file 
# name includes the DAY name
#
# Created on 26 Sept. 2020, 1:53:23 am
#
HOST_NAME=$(uci get system.@system[0].hostname)
BACKUP_FILE_NAME=$HOST_NAME-DB-$(date +%a).tar.gz

###################### Run the backup #########################
mkdir /etc/cubicwall/data/backup
tar cfz /etc/cubicwall/data/backup/$BACKUP_FILE_NAME /etc/cubicwall/data/cubicwall.db 
###############################################################

