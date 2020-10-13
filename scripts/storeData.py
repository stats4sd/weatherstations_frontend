import mysql.connector as mysql
import dbConfig as config
import listColumnsName as columns_name
import sys

uploader_id = sys.argv[1]
# connects to database
conn = mysql.connect(**config.dbConfig)
cursor = conn.cursor()

try:
    cols = '`,`'.join(columns_name.list_columns_name)

    sql = f"INSERT INTO `data` (`{cols}`) SELECT `{cols}` FROM `data_template` WHERE `uploader_id`='{uploader_id}';"
    print("data is inserting")
    cursor.execute(sql)
    conn.commit()

except mysql.Error as err:
    print(f'Failed to upload data: {err}')

else:
    sql = f"DELETE FROM `data_template` WHERE `uploader_id`='{uploader_id}';"
    cursor.executemany(sql)
    conn.commit()
    print('data inserted')
    conn.close