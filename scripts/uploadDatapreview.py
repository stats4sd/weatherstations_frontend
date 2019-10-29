#!/usr/bin/python3.7
import mysql.connector as mysql
import dbConfig as config 
import pandas as pd
from datetime import datetime
import sys
path = sys.argv[1]
station_id = sys.argv[2]


def openFile():
   
    data = pd.read_csv(path, na_values=['--.-', '--', '---'], low_memory=False)
    df = pd.DataFrame(data)

    # remove extra space in columns name
    df.columns = df.columns.str.rstrip()

    # add id_station
    df['id_station'] = station_id
    # replace columns name
    df = df.rename(columns=config.columns_db)
    df = df.where((pd.notnull(df)), None)

    #checks the type of station
    if (data.shape[1] > 30):

        # drop rows with missing value / NaN in any column
        df = df.dropna(how='all', subset=config.list_columns_davis)


        # create timestamp for uploading into database
        date_time = []
        for y, m, d, time in zip(df.YYYY, df.MM, df.DD, df.Time):
            hour = time.split(':')
            date_time.append(str(datetime(int(y), int(m), int(d), int(hour[0]), int(hour[1]))))

        # dateTime is in Date
        df.fecha_hora = date_time
        #drop columns not necessary
        df = df.drop(['YYYY', 'MM', 'DD', 'Time', 'Date_Davis', 'Time_Davis'], axis=1)


    else:
        # drop rows with missing value / NaN in any column
        df = df.dropna(how='all', subset=config.list_columns_chinas)
        # drop columns not necessary
        df = df.drop(['No.'], axis=1)

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
