
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