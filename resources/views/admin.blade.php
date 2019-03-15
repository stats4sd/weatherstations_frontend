
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

                <div style="width:100%; max-height:500px; overflow:auto">
                
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>fecha_hora</th>
                            <th>intervalo</th>
                            <th>temperatura_interna</th>
                            <th>humedad_interna</th>
                            <th>temperatura_externa</th>
                            <th>humedad_externa</th>
                            <th>presion_relativa</th>
                            <th>presion_absoluta</th>
                            <th>velocidad_viento</th>
                            <th>sensacion_termica</th>
                            <th>rafaga</th>
                            <th>direccion_del_viento</th>
                            <th>punto_rocio</th>
                            <th>lluvia_hora</th>
                            <th>lluvia_24_horas</th>
                            <th>lluvia_semana</th>
                            <th>lluvia_mes</th>
                            <th>lluvia_total</th>

                            <th>hi_temp</th>
                            <th>low_temp</th>
                            <th>wind_cod</th>
                            <th>wind_run</th>
                            <th>hi_speed</th>
                            <th>hi_dir</th>
                            <th>wind_cod_dom</th>
                            <th>wind_chill</th>
                            <th>index_heat</th>
                            <th>index_thw</th>
                            <th>index_thsw</th>
                            <th>rain</th>
                            <th>solar_rad</th>
                            <th>solar_energy</th>
                            <th>radsolar_max</th>
                            <th>uv_index</th>
                            <th>uv_dose</th>
                            <th>uv_max</th>

                            <th>heat_days_d</th>
                            <th>cool_days_d</th>
                            <th>in_dew</th>
                            <th>in_heat</th>
                            <th>in_emc</th>
                            <th>in_air_density</th>
                            <th>evapotran</th>
                            <th>soil_1_moist</th>
                            <th>soil_2_moist</th>
                            <th>leaf_wet1</th>
                            <th>wind_samp</th>
                            <th>wind_tx</th>
                            <th>iss_recept</th>
                            <th>id_station</th>
                            




                          </tr>
                        </thead>
                            <tbody>
                           
                            @foreach($station_data as $data)
                            <tr>
                            <td>{{$data->fecha_hora}}</td>
                            <td>{{$data->intervalo}}</td>
                            <td>{{$data->temperatura_interna}}</td>
                            <td>{{$data->humedad_interna}}</td>
                            <td>{{$data->temperatura_externa}}</td>
                            <td>{{$data->humedad_externa}}</td>
                            <td>{{$data->presion_relativa}}</td>
                            <td>{{$data->presion_absoluta}}</td>
                            <td>{{$data->velocidad_viento}}</td>
                            <td>{{$data->sensacion_termica}}</td>
                            <td>{{$data->rafaga}}</td>
                            <td>{{$data->direccion_del_viento}}</td>
                            <td>{{$data->punto_rocio}}</td>
                            <td>{{$data->lluvia_hora}}</td>
                            <td>{{$data->lluvia_24_horas}}</td>
                            <td>{{$data->lluvia_semana}}</td>
                            <td>{{$data->lluvia_mes}}</td>
                            <td>{{$data->lluvia_total}}</td>

                            <td>{{$data->hi_temp}}</td>
                            <td>{{$data->low_temp}}</td>
                            <td>{{$data->wind_cod}}</td>
                            <td>{{$data->wind_run}}</td>
                            <td>{{$data->hi_speed}}</td>
                            <td>{{$data->hi_dir}}</td>
                            <td>{{$data->wind_cod_dom}}</td>
                            <td>{{$data->wind_chill}}</td>
                            <td>{{$data->index_heat}}</td>
                            <td>{{$data->index_thw}}</td>
                            <td>{{$data->index_thsw}}</td>
                            <td>{{$data->rain}}</td>
                            <td>{{$data->solar_rad}}</td>
                            <td>{{$data->solar_energy}}</td>
                            <td>{{$data->radsolar_max}}</td>
                            <td>{{$data->uv_index}}</td>
                            <td>{{$data->uv_dose}}</td>
                            <td>{{$data->uv_max}}</td>

                            <td>{{$data->heat_days_d}}</td>
                            <td>{{$data->cool_days_d}}</td>
                            <td>{{$data->in_dew}}</td>
                            <td>{{$data->in_heat}}</td>
                            <td>{{$data->in_emc}}</td>
                            <td>{{$data->in_air_density}}</td>
                            <td>{{$data->evapotran}}</td>
                            <td>{{$data->soil_1_moist}}</td>
                            <td>{{$data->soil_2_moist}}</td>
                            <td>{{$data->leaf_wet1}}</td>
                            <td>{{$data->wind_samp}}</td>
                            <td>{{$data->wind_tx}}</td>
                            <td>{{$data->iss_recept}}</td>
                            <td>{{$data->id_station}}</td>
                            

                       
                            </tr>

                            @endforeach
                                               
                        </tbody>
                      </table>
            </div>
                </div>
                    </div>

    
                <div class='card mt-4'>
                                <div class="card-header">Data Download</div>
                                    <div class="card-body">
                                        <form action="{{ route('excelData') }} " method="POST">
                                        @csrf

                                            <div class="form-group">
                                                <label for="stations-content">Select Station</label>
                                                    <select name="stationSelected[]" class="form-control">
                                                      
                                                            <option id='1' value='1'>Chojñapata-Davis</option>
                                                            <option id='2' value='2'>Chinchaya-Davis</option>
                                                            <option id='3' value='3'>Chinchaya-Chinas</option>
                                                            <option id='4' value='4'>Calahuancane-Davis</option>
                                                            <option id='5' value='5'>Cutusuma-Davis</option>
                                                            <option id='6' value='6'>Iñacamaya-Davis</option>
                                                            <option id='7' value='7'>Incamya-Chinas</option>
                                             
                                                    </select>
                                            </div>
                                            <hr>
                                                <button class="submit">Export Data</button>
                                        </form>
                                    </div>
                </div>          
            </div>
        </div>
    </div>
</div>
@endif
@endsection