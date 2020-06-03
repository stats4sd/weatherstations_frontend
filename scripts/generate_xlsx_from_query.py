#!/usr/bin/python3
from mysql.connector import MySQLConnection, Error
import sys
import dbConfig as config
import pandas as pd



path = sys.argv[1] + '/storage/app/public/data/'
query = sys.argv[2]
name_file = sys.argv[3]
name_file = 'data.xlsx'
queries = query.split(';')


try:
	con = MySQLConnection(**config.dbConfig)
	cursor = con.cursor()
	print("query", query)
	writer = pd.ExcelWriter(path + name_file, engine='xlsxwriter')
	for query in queries:
		cursor.execute(query)
		df = pd.DataFrame(cursor, columns=[i[0] for i in cursor.description])
		print(df)

	df.[sheet_name].to_excel(writer, sheet_name='sheet_name', index=False)
	writer.save()
	writer.close()
	con.commit()

	
except Error as e:

	print('Error:', e)

finally:

	print('Done!')
	cursor.close()
	con.close()





