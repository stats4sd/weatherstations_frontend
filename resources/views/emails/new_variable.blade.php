@component('mail::message')

A new variable has been added to a datamap:

Datamap: {{ $dataMap->id }}
ODK Variable Name: {{ $variable->name }}
MySQL Field Name (to add to the database): {{ $variable->column_name }}

Time to add this to the database!

Best regards,
Site Admin,

Red de Redes Platform

@endcomponent