import mysql.connector as mysql
import dbConfig as config

# connects to database
conn = mysql.connect(**config.dbConfig)
cursor = conn.cursor()

try:
    cols = '`,`'.join(config.list_columns_name)
    sql = f"INSERT INTO `data` (`{cols}`) SELECT `{cols}` FROM `data_template` "
    print("data is inserting")
    cursor.execute(sql)
    conn.commit()

except mysql.Error as err:
    print(f'Failed to upload data: {err}')

else:
    sql = f"DELETE FROM `data_template`"
    cursor.execute(sql)
    conn.commit()
    print('data inserted')
    conn.close