#!/usr/bin/python3.7
import mysql.connector as mysql
import dbConfig as config 
import listColumnsName as columns_name
import pandas as pd
from datetime import datetime
import sys
path = sys.argv[1]
station_id = sys.argv[2]


def openFile():

    if(path[len(path)-3 : ] == "txt"):
    
        df = pd.read_csv(path, na_values=['--.-', '--', '---'], sep="\t", header=[0,1])
        #join the two headers into one  
        df.columns = df.columns.map('_'.join)
        #rename the column name for davis station into column name for the database  
        df = df.rename(columns=columns_name.list_columns_davis_text)
        #create the timestamp for uploading into database 
        date_time = []
        for fecha_hora, time in zip(df.fecha_hora, df.time):
            date = fecha_hora.split('/')
            hour = time.split(':')
            date_time.append(str(datetime(int('20' + date[2]), int(date[1]), int(date[0]), int(hour[0]), int(hour[1]))))

        #pass the right datestamp into fecha_hora
        df.fecha_hora = date_time
        #drop columns not necessary
        df = df.drop(['time'], axis=1)

        df = df.where((pd.notnull(df)), None)
        # drop rows with missing value / NaN in any column
        df = df.dropna(how='all', subset=columns_name.list_columns_davis_to_drop)
        #add the station_id column
        df['id_station'] = station_id
          

    else:
   
        data = pd.read_csv(path, na_values=['--.-', '--', '---'], low_memory=False)
        df = pd.DataFrame(data)

        # remove extra space in columns name
        df.columns = df.columns.str.rstrip()

        # add id_station column
        df['id_station'] = station_id
        # replace columns name
        df = df.rename(columns=columns_name.columns_db)

        df = df.where((pd.notnull(df)), None)

        # drop rows with missing value / NaN in any column
        df = df.dropna(how='all', subset=columns_name.list_columns_chinas_to_drop)
       
    return df


# connects to database
conn = mysql.connect(**config.dbConfig)
cursor = conn.cursor()

try:

    cols = openFile().columns.tolist()
    cols = '`,`'.join(cols)


    for i, row in openFile().iterrows():
        sql = f"INSERT INTO `data_template` (`{cols}`) VALUES (" + "%s,"*(len(row)-1) + "%s)"
        cursor.execute(sql, tuple(row))
    print('data is uploading')

    conn.commit()

except mysql.Error as err:
    print(f'Failed to upload data: {err}')

else:
    print('data uploaded')

conn.close
