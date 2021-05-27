
from mysql.connector import MySQLConnection, Error
import sys
import dbConfig as config
import pandas as pd



path = sys.argv[1] + '/storage/app/public/data/'
query = sys.argv[2]
name_file = sys.argv[3]
query_count = query.count(';')
print(query)
if query_count == 1:
	queries=[query]
	print(queries)
else:
	queries = query.split(';')

sheet_names = sys.argv[4]
sheet_names = sheet_names.split(',')


try:
	con = MySQLConnection(**config.dbConfig)
	cursor = con.cursor()
	dfs = {}
	i = 0
	for query in queries:
		query.replace("''", "")
		print(query)
		cursor.execute(query)
		df = pd.DataFrame(cursor, columns=[i[0] for i in cursor.description])
		dfs[sheet_names[i]] = df
		i += 1

	writer = pd.ExcelWriter(path + name_file, engine='xlsxwriter')

	for sheet_name in dfs.keys():
		dfs[sheet_name].to_excel(writer, sheet_name=sheet_name, index=False)

	writer.save()
	writer.close()
	con.commit()


except Error as e:

	print('Error:', e)

finally:

	print('Done!')
	cursor.close()
	con.close()





