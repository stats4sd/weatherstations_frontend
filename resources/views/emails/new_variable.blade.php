@component('mail::message')

A new variable has been added to a datamap:

Datamap: {{ $dataMap->id }}
ODK Variable Name: {{ $variable['name'] }}
MySQL Column Name: {{ $variable['column_name'] }}
Type: {{ $variable['type'] }}

Time to add this to the database!

Best regards,
Site Admin,

CCRP Weatherstations Data Platform
Weatherstations and RMS Cross Cutting projects

@endcomponent