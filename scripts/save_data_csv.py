#!/usr/bin/python3
from mysql.connector import MySQLConnection, Error
import sys
import csv
import requests
import json
from datetime import datetime

user = sys.argv[1] # your username
passwd = sys.argv[2] # your password
host = '127.0.0.1' # your host
db = sys.argv[3] # database where your table is stored
path = sys.argv[4] + '/storage/app/public/rawfile/'
query = sys.argv[5]
name_file = sys.argv[7]
params = (sys.argv[6]).split(',')
for x in params:
	x = '"'+x+'"'
	
query = query.replace("?", "%s")
params = tuple(params)


try:
	con = MySQLConnection(user=user, passwd=passwd, host=host, db=db)
	cursor = con.cursor()
	query = query % params
	print(query)
	cursor.execute(query)
	with open(path + name_file,'w', newline='') as csv_file:
	    column_names = [i[0] for i in cursor.description]
	    writer = csv.writer(csv_file, delimiter=',', quotechar='"', quoting=csv.QUOTE_MINIMAL)
	    writer.writerow(column_names)
	   
	    for row in cursor.fetchall():
	    	writer.writerow(row)
	con.commit()

	
except Error as e:

	print('Error:', e)

finally:

	print('Done!')
	cursor.close()
	con.close()





