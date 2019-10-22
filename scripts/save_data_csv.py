#!/usr/bin/python3
from mysql.connector import MySQLConnection, Error
import sys
import csv
import requests

user = sys.argv[1] # your username
passwd = sys.argv[2] # your password
host = '127.0.0.1' # your host
db = sys.argv[3] # database where your table is stored
path = sys.argv[4] + '/storage/app/public/data/'
table = sys.argv[5]
#params = sys.argv[6]



try:
	con = MySQLConnection(user=user, passwd=passwd, host=host, db=db)
	cursor = con.cursor()
	query = 'SELECT * FROM %s WHERE `id_station` = %s AND `fecha_hora` BETWEEN %s AND %s;' % (table, '2', '2019-09-01', '2019-09-02')
	print(query)
	cursor.execute(query)
	with open(path +'data.csv','w', newline='') as csv_file:
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





