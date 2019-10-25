import mysql.connector as mysql
#import dbConfig as config
import pandas as pd
from datetime import datetime
import sys
path = sys.argv[1]
station_id = sys.argv[2]
dbConfig = {
            'user': 'root',
            'password': 'Logoslogos88',
            'host': '127.0.0.1',
            'db': 'umsa'
            }

list_columns_davis = ['hi_temp', 'low_temp', 'wind_cod',
                      'wind_run', 'hi_speed', 'hi_dir', 'wind_cod_dom',
                      'wind_chill', 'index_heat', 'index_thw', 'index_thsw',
                      'presion_relativa', 'rain', 'lluvia_hora', 'solar_rad',
                      'solar_energy', 'radsolar_max', 'uv_index', 'uv_dose',
                      'uv_max', 'heat_days_d', 'cool_days_d', 'in_dew', 'in_heat',
                      'in_emc', 'in_air_density', 'evapotran', 'soil_1_moist',
                      'soil_2_moist', 'leaf_wet1', 'wind_samp', 'wind_tx',
                      'iss_recept','intervalo']

list_columns_chinas = ['temperatura_interna', 'humedad_interna', 'temperatura_externa', 'humedad_externa',
                        'presion_relativa', 'presion_absoluta', 'velocidad_viento',
                        'sensacion_termica', 'rafaga', 'direccion_del_viento',
                        'punto_rocio', 'lluvia_hora', 'lluvia_24_horas',
                        'lluvia_semana', 'lluvia_mes', 'lluvia_total'
                       ]
columns_db = {'Date': 'fecha_hora', 'Hi_Temp':'hi_temp', 'Low_Temp': 'low_temp', 'Wind_Cod':'wind_cod',
                      'Wind_Run':'wind_run', 'Hi_Speed':'hi_speed', 'Hi_Dir':'hi_dir', 'Wind_Cod_Dom':'wind_cod_dom',
                      'Wind_Chill':'wind_chill', 'Heat_Index':'index_heat', 'THW_Index':'index_thw', 'THSW_Index':'index_thsw',
                      'Bar':'presion_relativa', 'Rain':'rain', 'Rain_Rate':'lluvia_hora', 'Solar_Rad.':'solar_rad',
                      'Solar_Energy':'solar_energy', 'Hi_Solar_Rad.':'radsolar_max', 'UV_Index':'uv_index', 'UV_Dose':'uv_dose',
                      'Hi_UV':'uv_max', 'Heat_D-D':'heat_days_d', 'Cool_D-D':'cool_days_d', 'In_Dew':'in_dew', 'In_Heat':'in_heat',
                      'In_EMC':'in_emc', 'In_Air_Density':'in_air_density', 'ET':'evapotran', 'Soil_1_Moist.':'soil_1_moist',
                      'Soil_2_Moist.':'soil_2_moist', 'Leaf_Wet_1':'leaf_wet1', 'Wind_Samp':'wind_samp', 'Wind_Tx':'wind_tx',
                      'ISS_Recept':'iss_recept', 'Arc._Int.':'intervalo', 'In_Temp':'temperatura_interna', 'In_Hum':'humedad_interna',
                      'Wind_Dir':'direccion_del_viento', 'Wind_Speed':'velocidad_viento', 'Dew_Pt.':'punto_rocio', 'Out_Hum':'humedad_externa',
                      'Temp_Out':'temperatura_externa', 'id_station':'id_station', 'Intervalo':'intervalo', 'Fecha/Hora':'fecha_hora', 'Temperatura Interna(°C)':'temperatura_interna',
                        'Humedad Interna(%)':'humedad_interna', 'Temperatura Externa(°C)':'temperatura_externa', 'Humedad Externa(%)':'humedad_externa',
                        'Presión Relativa(hpa)':'presion_relativa', 'Presión Absoluta(hpa)':'presion_absoluta', 'Velocidad del viento(m/s)':'velocidad_viento',
                        'Sensación Térmica(°C)':'sensacion_termica', 'Ráfaga(m/s)':'rafaga', 'Dirección del viento':'direccion_del_viento',
                        'Punto de Rocío(°C)':'punto_rocio', 'Lluvia hora(mm)':'lluvia_hora', 'Lluvia 24 horas(mm)':'lluvia_24_horas',
                        'Lluvia semana(mm)':'lluvia_semana', 'Lluvia mes(mm)':'lluvia_mes', 'Lluvia Total(mm)':'lluvia_total',
              'Leaf_Temp_1':'leaf_temp_1', 'Leaf_Temp_2':'leaf_temp_2', 'Soil_Temp_1':'soil_temp_1', 'Soil_Temp_2':'soil_temp_2'
                      }
list_columns_name = [
    'fecha_hora', 'hi_temp', 'low_temp', 'wind_cod', 'wind_run', 'hi_speed', 'hi_dir', 'wind_cod_dom',
    'wind_chill', 'index_heat', 'index_thw', 'index_thsw', 'presion_relativa', 'rain', 'solar_rad',
    'solar_energy', 'radsolar_max', 'uv_index', 'uv_dose', 'uv_max', 'heat_days_d', 'cool_days_d', 'in_dew', 'in_heat',
    'in_emc', 'in_air_density', 'evapotran', 'soil_1_moist', 'soil_2_moist', 'leaf_wet1', 'wind_samp', 'wind_tx',
    'iss_recept', 'intervalo', 'temperatura_interna', 'humedad_interna',
    'punto_rocio', 'humedad_externa', 'temperatura_externa', 'id_station',
     'presion_absoluta', 'velocidad_viento',
    'sensacion_termica', 'rafaga', 'direccion_del_viento', 'lluvia_hora', 'lluvia_24_horas', 'lluvia_semana',
    'lluvia_mes', 'lluvia_total', 'leaf_temp_1', 'leaf_temp_2', 'soil_temp_1', 'soil_temp_2'
    ]

list_columns_chinas = ['temperatura_interna', 'humedad_interna', 'temperatura_externa', 'humedad_externa',
                        'presion_relativa', 'presion_absoluta', 'velocidad_viento',
                        'sensacion_termica', 'rafaga', 'direccion_del_viento',
                        'punto_rocio', 'lluvia_hora', 'lluvia_24_horas',
                        'lluvia_semana', 'lluvia_mes', 'lluvia_total'
                       ]
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
        sql = "INSERT INTO `data_template` (`{cols}`) VALUES (" + "%s,"*(len(row)-1) + "%s)"
        cursor.execute(sql, tuple(row))
    print('data is uploading')

    conn.commit()

except mysql.Error as err:
    print('Failed to upload data: {err}')

else:
    print('data uploaded')

conn.close