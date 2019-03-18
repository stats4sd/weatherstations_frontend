
@extends('layouts.app')

@section('content')

@if(Auth::user()->type=='default')
        
        Authorization is required to access this page.<hr>
        Se requiere autorización para acceder a esta página.

@endif

@if(Auth::user()->type=='admin')
       



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Data Uploader</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form action="{{ route('files.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="file" class="control-label col-sm-3">Choose one data file to upload. This should be the un-edited file retrieved from the weather station system</label>
                            <div class="col-sm-9">
                                <input name="data-file" type="file" class="form-control-file">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file" class="control-label col-sm-3">Select the weather station type this dataset came from</label>
                            <div class="col-sm-9">
                                <select name="weatherstation" class="form-control">
                                    <option id='1' value='1'>Chojñapata-Davis</option>
                                    <option id='2' value='2'>Chinchaya-Davis</option>
                                    <option id='3' value='3'>Chinchaya-Chinas</option>
                                    <option id='4' value='4'>Calahuancane-Davis</option>
                                    <option id='5' value='5'>Cutusuma-Davis</option>
                                    <option id='6' value='6'>Iñacamaya-Davis</option>
                                    <option id='7' value='7'>Incamya-Chinas</option>

                                </select>
                            </div>
                        </div>


                        <button class="submit">Submit File</button>
       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container">
     <div class="row justify-content-center">
        <div class="col-md-8">

        
            <div class="card">
                <div class="card-header">Data preview</div>
                    <div class="card-body">
              
                        <table class="table table-striped" id="data-table"></table>
                    
                    </div>
            </div>
        </div>
 
                
                </div>
            </div>
        </div>
 
@endif
@endsection
@section('javascript')
<!-- Table Data From Database-->
<script>


$(document).ready(function() {

    window.dailyTable = $('#data-table').DataTable({
        dom: 'Bfritip',
        buttons:[
            {
            extend: 'collection',
            text: 'Show columns',
            buttons: [ 'columnsVisibility' ],
            visibility: true
            },
            {
                extend: 'csv',
                filename: 'datafromDB',
            }   
        ],
        processing: true,
        serverSide: false,
        "scrollY":  500,
        "scrollX":  true,  
        "scrollCollapse": true,
        "paging":         true,    
        ajax: '{!! route('getData') !!}',
        columns: [

            { data: 'id_station', name: 'id_station', title: 'Id Station'},
            { data: 'fecha_hora', name: 'fecha_hora' , title: 'Fecha/Hora'},
            { data: 'temperatura_interna', name: 'temperatura_interna', title: 'Temperatura Interna'},
            
            { data: 'temperatura_externa', name: 'temperatura_externa', title:'Temperatura externa'},
            { data: 'humedad_interna', name: 'humedad_interna', title: 'Humedad Interna'}, 
            { data: 'humedad_externa', name: 'humedad_externa', title: 'Humedad Externa'},
            { data: 'presion_relativa', name: 'presion_relativa', title:'Presion Relativa '},
            { data: 'presion_absoluta', name: 'presion_absoluta', title:'Presion Absoluta'},

            { data: 'velocidad_viento', name: 'velocidad_viento' , title: 'Velocidad Viento'},
            { data: 'sensacion_termica', name: 'sensacion_termica', title: 'Sensacion Termica'},
            { data: 'rafaga', name: 'rafaga', title: 'Ráfaga'}, 
            { data: 'direccion_del_viento', name: 'direccion_del_viento', title:'Dirección del Viento'},
            { data: 'punto_rocio', name: 'punto_rocio', title: 'Punto Rocio'},
            { data: 'lluvia_hora', name: 'lluvia_hora', title: 'Lluvia Hora '},
            { data: 'lluvia_24_horas', name: 'lluvia_24_horas', title: 'Lluvia 24h'},
            { data: 'lluvia_semana', name: 'lluvia_semana', title: 'Lluvia Semana'},
            { data: 'lluvia_mes', name: 'lluvia_mes', title:'Lluvia Mes'},

            { data: 'lluvia_total', name: 'lluvia_total' , title: 'Lluvia Total'},
            { data: 'hi_temp', name: 'hi_temp', title: 'High Temp'},
            { data: 'low_temp', name: 'low_temp', title: 'Low Temp'}, 
            { data: 'wind_cod', name: 'wind_cod', title:'Wind Cod'},
            { data: 'wind_run', name: 'wind_run', title: 'Wind Run'},
            { data: 'hi_speed', name: 'hi_speed', title: 'High Speed '},
            { data: 'hi_dir', name: 'hi_dir', title: 'High Dirección'},
            { data: 'wind_cod_dom', name: 'wind_cod_dom', title: 'Wind Cod Dom'},
            { data: 'wind_chill', name: 'wind_chill', title:'Wind Chill'},

            { data: 'index_heat', name: 'index_heat' , title: 'Index Heat'},
            { data: 'index_thw', name: 'index_thw', title: 'Index thw'},
            { data: 'index_thsw', name: 'index_thsw', title: 'Index thsw'}, 
            { data: 'rain', name: 'rain', title: 'Rain'},
            { data: 'solar_rad', name: 'solar_rad', title: 'Solar Rad'},
            { data: 'solar_energy', name: 'solar_energy', title: 'Solar Energy '},
            { data: 'radsolar_max', name: 'radsolar_max', title: 'Radsolar Max'},
            { data: 'uv_index', name: 'uv_index', title: 'UV Index'},
            { data: 'uv_dose', name: 'uv_dose', title: 'UV Dose'},

            { data: 'uv_max', name: 'uv_max' , title: 'UV Max'},
            { data: 'heat_days_d', name: 'heat_days_d', title: 'Heat days_d'},
            { data: 'cool_days_d', name: 'cool_days_d', title: 'Cool days_d'}, 
            { data: 'in_dew', name: 'in_dew', title: 'In Dew'},
            { data: 'in_heat', name: 'in_heat', title: 'In Heat'},
            { data: 'in_emc', name: 'in_emc', title: 'In Emc'},
            { data: 'in_air_density', name: 'in_air_density', title: 'In Air Density'},
            { data: 'evapotran', name: 'evapotran', title: 'Evapotran'},
            { data: 'soil_1_moist', name: 'soil_1_moist', title: 'soil_1_moist'},

            { data: 'soil_2_moist', name: 'soil_2_moist' , title: 'soil_2_moist'},
            { data: 'leaf_wet1', name: 'leaf_wet1', title: 'Leaf wet1'},
            { data: 'wind_samp', name: 'wind_samp', title: 'Wind Samp'}, 
            { data: 'wind_tx', name: 'wind_tx', title: 'Wind tx'},
            { data: 'iss_recept', name: 'iss_recept', title: 'Iss Recept'},
            { data: 'intervalo', name: 'intervalo', title: 'Intervalo'},            
        ]
    });
});

</script>
@endsection
