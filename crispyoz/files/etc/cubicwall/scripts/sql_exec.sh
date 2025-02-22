#!/bin/sh 
# 
# File:   sql_exec.sh
# Author: chris
#
# Created on 5 July 2021, 9:05:48 pm
#

DATABASE=/etc/cubicwall/data/cubicwall.db
SCRIPTS_PATH=/etc/cubicwall/scripts/

sqlite3 $DATABASE ".read $SCRIPTS_PATH$1.sql"
