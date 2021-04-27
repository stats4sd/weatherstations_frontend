@component('mail::message')

ANÁLISIS FISICO QUÍMICO DE SUELOS


<table>
    <thead>
      <tr>
        <h4>     Datos de identificación</h4>
      </tr>
    </thead>
    <tbody>
        <tr>
            <td>Fecha de muestreo </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
        <tr>
            <td>Fecha de recepción </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
        <tr>
            <td>Fecha de entrega </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
        <tr>
            <td>Persona de contacto </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
        <tr>
            <td>Nº celular persona contacto </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
        <tr>
            <td>Email persona contacto</td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
        <tr>
            <td>Codigo QR </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
        <tr>
            <td>Nombre del Propietario </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr> 
        <tr>
            <td>GPS </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
        <tr>
            <td>Región </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
        <tr>
            <td>Departamento </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
        <tr>
            <td>Municipio </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
        <tr>
            <td>Comunidad </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
        <tr>
            <td>Superficie (m²) </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <h4>     Identificación de la muestra </h4>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Profundidad de muestreo (cm) </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
        <tr>
            <td>Rocas y Gravas </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
      @if ($resultLab['fecha_entrega'])
        <tr>
            <td>Anterior cultivo </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
      @else
        <tr>
            <td>Suelo en descanso (años) </td>
            <td>{{ $resultLab['fecha_entrega'] }}</td>
        </tr>
      @endif
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <td>Parametro </td>
            <td>Resultado </td>
            <td>Unidades </td>
            <td>Método </td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <h4>     Análisis Fisico de Suelos</h4>
        </tr>
        <tr>
            <td>Densidad Real </td>
            <td>{{ $resultLab['densidad_real'] }}</td>
            <td>g/cm3 </td>
            <td>Picnómetro </td>
        </tr>
        <tr>
            <td>Densidad aparente </td>
            <td>{{ $resultLab['densidad_aparente'] }}</td>
            <td>g/cm3 </td>
            <td>Probeta </td>
        </tr>
        <tr>
            <td>Humedad Gravimétrica </td>
            <td>{{ $resultLab['humedad_gravimetrica'] }}</td>
            <td>% </td>
            <td>Gravimétrico </td>
        </tr>
        <tr>
            <td>Humedad Volumetrica </td>
            <td>{{ $resultLab['humedad_volumetrica'] }}</td>
            <td>% </td>
            <td>Cálculo </td>
        </tr>
        <tr>
            <td>Textura (granulometría ) </td>
            <td>{{ $resultLab['textura'] }}</td>
            <td>% </td>
            <td>Bouyucos </td>
        </tr>
        <tr>
            <h4>     Análisis Químico de Suelos</h4>
        </tr>
        <tr>
            <td>pH en agua (1:5) </td>
            <td>{{ $resultLab['ph_agua'] }}</td>
            <td> - </td>
            <td>Potenciometria </td>
        </tr>
        <tr>
            <td>pH en k Cl (1:5) </td>
            <td>{{ $resultLab['ph_k_cl'] }}</td>
            <td> - </td>
            <td>Potenciometria </td>
        </tr>
        <tr>
            <td>Acidez intercambiable </td>
            <td>{{ $resultLab['acidez'] }}</td>
            <td>meq/100 g suelo </td>
            <td>Volumetría </td>
        </tr>
        <tr>
            <td>CE (mmhos/cm) </td>
            <td>{{ $resultLab['ce'] }}</td>
            <td>dS/m </td>
            <td>Conductivímetro </td>
        </tr>
        <tr>
            <td>Carbonatos libres </td>
            <td>{{ $resultLab['carbonatos_libres'] }}</td>
            <td> - </td>
            <td>Reacción ácida </td>
        </tr>
        <tr>
            <td>Calcio intercambiable </td>
            <td>{{ $resultLab['calcio_intercambiable'] }}</td>
            <td> meq/100 g suelo </td>
            <td>Absorción atómica </td>
        </tr>
        <tr>
            <td>Magnesio intercambiable </td>
            <td>{{ $resultLab['magnesio'] }}</td>
            <td> meq/100 g suelo </td>
            <td>Absorción atómica </td>
        </tr>
        <tr>
            <td>Potasio intercambiable </td>
            <td>{{ $resultLab['potasio'] }}</td>
            <td> meq/100 g suelo </td>
            <td>Absorción atómica </td>
        </tr>
        <tr>
            <td>Sodio intercambiable </td>
            <td>{{ $resultLab['sodio'] }}</td>
            <td> meq/100 g suelo </td>
            <td>Absorción atómica </td>
        </tr>
        <tr>
            <td>Capacidad de Intercambio Catiónico </td>
            <td>{{ $resultLab['intercambio_cationico'] }}</td>
            <td> meq/100 g suelo </td>
            <td>Absorción atómica </td>
        </tr>
        <tr>
            <td>Materia orgánica </td>
            <td>{{ $resultLab['materia_organica'] }}</td>
            <td> % </td>
            <td>Walkley y Black </td>
        </tr>
        <tr>
            <td>Carbono orgánico </td>
            <td>{{ $resultLab['carbono_organico'] }}</td>
            <td> % </td>
            <td>Cálculo </td>
        </tr>
        <tr>
            <td>Fósforo disponible** </td>
            <td>{{ $resultLab['fosforo'] }}</td>
            <td> ppm </td>
            <td>Espectrofotometría </td>
        </tr>
    </tbody>
</table>

CCRP Weatherstations Data Platform
Weatherstations and RMS Cross Cutting projects

@endcomponent
