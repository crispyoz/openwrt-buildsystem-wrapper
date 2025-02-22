#
# File:   clean_summary.sql
# Author: chris
#
# Created on 31 May 2021, 1:56:48 am
#
# Keep the last 10 summary records and remove the rest 

delete from summary  where id < (select max(id) from summary)-10;

