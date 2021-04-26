@component('mail::message')

MUESTRA DE SUELO PARA ANÁLISIS

{{ $soil['nombre_registra'] }} está enviando una muestra de suelo para análisis. 

<table>
    <thead>
      <tr>
        <h5 style="text-align: center;">Datos de identificación</h5>
      </tr>
    </thead>
    <tbody>
        <tr>
            <td>Fecha de muestreo </td>
            <td>{{ $soil['calc_fecha_muestreo'] }}</td>
        </tr>
        <tr>
            <td>Persona de contacto </td>
            <td>{{ $soil['nombre_registra'] }}</td>
        </tr>
        <tr>
            <td>Nº celular persona contacto </td>
            <td>{{ $soil['nombre_registra'] }}</td>
        </tr>
        <tr>
            <td>Email persona contacto </td>
            <td>{{ $soil['nombre_registra'] }}</td>
        </tr>
      @if ($soil['tiene_codigo_barra_n'])
        <tr>
            <td>Codigo QR Parcela </td>
            <td>{{ $soil['codigo_barra'] }}</td>
        </tr>
      @else
        <tr>
            <td>Codigo QR Parcela</td>
            <td>{{ $soil['numero_id_n'] }}</td>
        </tr>
      @endif
        <tr>
            <td>Nombre del Propietario </td>
            <td>{{ $soil['nombre_registra'] }}</td>
        </tr>
        <tr>
            <td>GPS </td>
            <td>{{ $soil['gps'] }}</td>
        </tr>
        <tr>
            <td>Región </td>
            <td>{{ $soil['region'] }}</td>
        </tr>
        <tr>
            <td>Departamento </td>
            <td>{{ $soil['departamento'] }}</td>
        </tr>
        <tr>
            <td>Municipio </td>
            <td>{{ $soil['municipio'] }}</td>
        </tr>
        <tr>
            <td>Comunidad </td>
            <td>{{ $soil['comunidad'] }}</td>
        </tr>
        <tr>
            <td>Superficie (m²) </td>
            <td>{{ $soil['area_m2'] }}</td>
        </tr>
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <h5 style="text-align: center;">Identificación de la muestra </h5>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Profundidad de muestreo (cm) </td>
            <td>{{ $soil['profunidad_muestreo'] }}</td>
        </tr>
        <tr>
            <td>Rocas y Gravas </td>
            <td>{{ $soil['rocas_gravas'] }}</td>
        </tr>
      @if ($soil['campana_anterior'])
        <tr>
            <td>Anterior cultivo </td>
            <td>{{ $soil['anterior_cultivo'] }}</td>
        </tr>
      @else
        <tr>
            <td>Suelo en descanso (años) </td>
            <td>{{ $soil['descanso'] }}</td>
        </tr>
      @endif
    </tbody>
</table>

CCRP Weatherstations Data Platform
Weatherstations and RMS Cross Cutting projects

@endcomponent
