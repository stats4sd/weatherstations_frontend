def convertFahrenheitToCelsius(value):
	
	temp_celsius = ((value-32)*5/9)
	return temp_celsius
	

def convertInhgOrMmhgToHpa(value, pression_unit):

	if pression_unit=="inhg":
		
		press_hpa = value*33.863886666667
		return value*33.863886666667

	elif pression_unit=="mmhg":
		
		press_hpa = value*1.3332239
		return value*1.3332239
		
def convertkmOrMToMs(value, veloc_viento_unit):

	if veloc_viento_unit=="km/h":
		
		veloc_viento_ms = value*0.277778
		return veloc_viento_ms

	elif veloc_viento_unit=="mph":
		
		veloc_viento_ms = value*0.44704
		return veloc_viento_ms
	
def convertInchToMm(value):

	rain_mm = value*25.4
	return rain_mm

def convertDataInchToMm(dataframe, selected_unit_rain, davis):

	if(selected_unit_rain != "mm" and davis):
		dataframe['rain'] = convertInchToMm(dataframe['rain'])
		dataframe['lluvia_hora'] = convertInchToMm(dataframe['lluvia_hora'])

	if(selected_unit_rain != "mm" and not davis):

		dataframe['lluvia_hora'] = convertInchToMm(dataframe['lluvia_hora'])
		dataframe['lluvia_24_horas'] = convertInchToMm(dataframe['lluvia_24_horas'])
		dataframe['lluvia_semana'] = convertInchToMm(dataframe['lluvia_semana'])
		dataframe['lluvia_mes'] = convertInchToMm(dataframe['lluvia_mes'])
		dataframe['lluvia_total'] = convertInchToMm(dataframe['lluvia_total']);
	
	
	return dataframe

def convertDatakmOrMToMs(dataframe, selected_unit_wind, davis):

	if(selected_unit_wind!="m/s" and davis):

		dataframe['hi_speed'] = convertkmOrMToMs(dataframe['hi_speed'], selected_unit_wind)
	
	if(selected_unit_wind!="m/s" and not davis):				
				
		dataframe['velocidad_viento'] = convertkmOrMToMs(dataframe['velocidad_viento'], selected_unit_wind)
		dataframe['rafaga'] = convertkmOrMToMs(dataframe['rafaga'], selected_unit_wind)

	return dataframe

def convertDataInhgOrMmhgToHpa(dataframe, pression_unit, davis):
	
		if pression_unit != "hpa" and davis:
			
			dataframe['presion_relativa'] = convertInhgOrMmhgToHpa(dataframe['presion_relativa'], pression_unit)

			dataframe['presion_absoluta'] = convertInhgOrMmhgToHpa(dataframe['presion_absoluta'], pression_unit)

		if pression_unit != "hpa" and not davis:
			
			dataframe['presion_relativa'] = convertInhgOrMmhgToHpa(dataframe['presion_relativa'], pression_unit)

		return dataframe

def convertDataFtoC(dataframe, temp_unit, davis):
	
		if(temp_unit=='ºF' and davis):
		
			dataframe['temperatura_interna'] = convertFahrenheitToCelsius(dataframe['temperatura_interna']);

			dataframe['temperatura_externa'] = convertFahrenheitToCelsius(dataframe['temperatura_externa']);

			dataframe['punto_rocio'] = convertFahrenheitToCelsius(dataframe['punto_rocio']);

			dataframe['wind_chill'] = convertFahrenheitToCelsius(dataframe['wind_chill']);

			dataframe['hi_temp'] = convertFahrenheitToCelsius(dataframe['hi_temp']);

			dataframe['low_temp'] = convertFahrenheitToCelsius(dataframe['low_temp']);
			
		if(temp_unit=='ºF' and not davis):

			dataframe['sensacion_termica'] = convertFahrenheitToCelsius(dataframe['sensacion_termica']);

			dataframe['punto_rocio'] = convertFahrenheitToCelsius(dataframe['punto_rocio']);

		return dataframe

