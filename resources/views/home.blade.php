@extends('layouts.app')


@section('content')



<div class="container">
     <div class="row justify-content-center">
        <div class="col-md-8">

        
            <div class="card">
                <div class="card-header">Data preview</div>
           

                    <!-- jQuery -->
                    <script src="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
                    <!-- DataTables -->
                    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                    <!-- Bootstrap JavaScript -->
                    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
                    <!-- App scripts -->
       
                <body>
                    
                   
                    <table class="table table-bordered" id="daily-table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>fecha</th>
                            <th>max_humedad_externa</th>
                           
                        </tr>
                    </thead>
                    </table>
                 </body>
                  @section('javascript')
                   
                    <script>
                    $(document).ready(function() {
                        $('#daily-table').DataTable({
                            processing: true,
                            serverSide: true,
                            select:true,
                            "scrollY" : "380px",
                            "scrollCollapse": true,
                            "paging": true,
                            "bProccessing": true
                            ajax: '{!! route('getDaily') !!}',
                            columns: [
                                { data: 'id', name: 'id' },
                                { data: 'fecha', name: 'fecha' },
                                { data: 'max_humedad_externa', name: 'max_humedad_externa' }
                               
                            ]
                        });
                    });
                    </script>
                @endsection                   

                


               

            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">



            <link href ="{{asset('css/style.css')}}" rel="stylesheet"/>
            <script src = "{{asset('js/buttonTable.js')}}"></script>
            <div class ="card mt-4">
                <div class="card-header">Data</div>
            <body>
                @if(!empty(Data::class))
                <div id="temps_div"></div>
                    <?= $lava->render('LineChart', 'Temperature', 'temps_div') ?> 
                @endif
            </body>

            <div class="tab">
                <button class="tablinks" onclick="openTable(event, 'Daily')" id="defaultOpen">Daily</button>
                <button class="tablinks" onclick="openTable(event, 'Tendays')">Ten Days</button>
                <button class="tablinks" onclick="openTable(event, 'Monthly')">Monthly</button>
                <button class="tablinks" onclick="openTable(event, 'Yearly')">Yearly</button>
            </div>
              

            <div id="Daily" class="tabcontent">
              <h3>Daily Data</h3>
              <p>Daily data summeries from weather station</p>

              <div class="card-body">
         
                   <div style="width:100%; max-height:500px; overflow:auto">
                
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Fecha</th>
                            <th>Iluvia 24h Total</th>
                            <th>Max Humedad Externa</th>
                            <th>Min Humedad Externa</th>
                            <th>Max Humedad Interna</th>
                            <th>Min Humedad Interna</th>
                            <th>Max Presión Absoluta</th>
                            <th>Min Presión Absoluta</th>
                            <th>Max Presión Relativa</th>
                            <th>Min Presión Relativa</th>
                            <th>Max Sensación Termica</th>
                            <th>Min Sensación Termica</th>
                            <th>Max Temperatura Externa</th>
                            <th>Min Temperatura Externa</th>
                            <th>Max Temperatura Interna</th>
                            <th>Min Temperatura Interna</th>
                            <th>Max Velocidad Viento</th>
                            <th>Min Velocidad Viento</th>


                          </tr>
                        </thead>

                        <tbody>
                           
                            @foreach($daily as $data)
                            <tr>
                            <td>{{$data->fecha}}</td>
                            <td>{{$data->lluvia_24_horas_total}}</td>
                            <td>{{$data->max_humedad_externa}}</td>
                            <td>{{$data->min_humedad_externa}}</td>
                            <td>{{$data->max_humedad_interna}}</td>
                            <td>{{$data->min_humedad_interna}}</td>
                            <td>{{$data->max_presion_absoluta}}</td>
                            <td>{{$data->min_presion_absoluta}}</td>
                            <td>{{$data->max_presion_relativa}}</td>
                            <td>{{$data->min_presion_relativa}}</td>
                            <td>{{$data->max_sensacion_termica}}</td>
                            <td>{{$data->min_sensacion_termica}}</td>
                            <td>{{$data->max_temperature_externa}}</td>
                            <td>{{$data->min_temperature_externa}}</td>
                            <td>{{$data->max_temperature_interna}}</td>
                            <td>{{$data->min_temperature_interna}}</td>
                            <td>{{$data->max_velocidad_viento}}</td>
                            <td>{{$data->min_velocidad_viento}}</td>

                           
                            </tr>


                            @endforeach
                     
                          
                        </tbody>
                      </table>
                   


                </div>
                </div>
                </div>



                    <div id="Tendays" class="tabcontent">
                      <h3>Ten days</h3>
                      <p>Ten days summeries from weather station</p> 
                        <div class="card-body">
                         <div style="width:100%; max-height:500px; overflow:auto">
                        
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Primer dia</th>
                                    <th>Décimo día</th>
                                    <th>Max Humedad Externa</th>
                                    <th>Min Humedad Externa</th>
                                    <th>Max Humedad Interna</th>
                                    <th>Min Humedad Interna</th>
                                    <th>Max Presión Absoluta</th>
                                    <th>Min Presión Absoluta</th>
                                    <th>Max Presión Relativa</th>
                                    <th>Min Presión Relativa</th>
                                    <th>Max Sensación Termica</th>
                                    <th>Min Sensación Termica</th>
                                    <th>Max Temperatura Externa</th>
                                    <th>Min Temperatura Externa</th>
                                    <th>Max Temperatura Interna</th>
                                    <th>Min Temperatura Interna</th>
                                    <th>Max Velocidad Viento</th>
                                    <th>Min Velocidad Viento</th>
                                    <th>Iluvia 24h Total</th>


                                  </tr>
                                </thead>

                                <tbody>
                                   
                                    @foreach($tendays as $data)
                                    <tr>
                                    <td>{{$data->min_fecha}}</td>
                                    <td>{{$data->max_fecha}}</td>          
                                    <td>{{$data->max_humedad_externa}}</td>
                                    <td>{{$data->min_humedad_externa}}</td>
                                    <td>{{$data->max_humedad_interna}}</td>
                                    <td>{{$data->min_humedad_interna}}</td>
                                    <td>{{$data->max_presion_absoluta}}</td>
                                    <td>{{$data->min_presion_absoluta}}</td>
                                    <td>{{$data->max_presion_relativa}}</td>
                                    <td>{{$data->min_presion_relativa}}</td>
                                    <td>{{$data->max_sensacion_termica}}</td>
                                    <td>{{$data->min_sensacion_termica}}</td>
                                    <td>{{$data->max_temperature_externa}}</td>
                                    <td>{{$data->min_temperature_externa}}</td>
                                    <td>{{$data->max_temperature_interna}}</td>
                                    <td>{{$data->min_temperature_interna}}</td>
                                    <td>{{$data->max_velocidad_viento}}</td>
                                    <td>{{$data->min_velocidad_viento}}</td>
                                    <td>{{$data->lluvia_24_horas_total}}</td>

                                   
                                    </tr>


                                    @endforeach
                             
                                  
                                </tbody>
                              </table>
                           
                        </div>
                        </div>
                

                    </div>

                    <div id="Monthly" class="tabcontent">
                      <h3>Monthly</h3>
                      <p>Monthly data summeries from weather station</p>

                      <div class="card-body">
                         <div style="width:100%; max-height:500px; overflow:auto">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Fecha</th>
                                    <th>Iluvia 24h Total</th>
                                    <th>Max Humedad Externa</th>
                                    <th>Min Humedad Externa</th>
                                    <th>Max Humedad Interna</th>
                                    <th>Min Humedad Interna</th>
                                    <th>Max Presión Absoluta</th>
                                    <th>Min Presión Absoluta</th>
                                    <th>Max Presión Relativa</th>
                                    <th>Min Presión Relativa</th>
                                    <th>Max Sensación Termica</th>
                                    <th>Min Sensación Termica</th>
                                    <th>Max Temperatura Externa</th>
                                    <th>Min Temperatura Externa</th>
                                    <th>Max Temperatura Interna</th>
                                    <th>Min Temperatura Interna</th>
                                    <th>Max Velocidad Viento</th>
                                    <th>Min Velocidad Viento</th>
                                


                                  </tr>
                                </thead>

                                <tbody>
                                   
                                    @foreach($monthly as $data)
                                    <tr>
                                    <td>{{$data->fecha}}</td>
                                    <td>{{$data->lluvia_24_horas_total}}</td>
                                    <td>{{$data->max_humedad_externa}}</td>
                                    <td>{{$data->min_humedad_externa}}</td>
                                    <td>{{$data->max_humedad_interna}}</td>
                                    <td>{{$data->min_humedad_interna}}</td>
                                    <td>{{$data->max_presion_absoluta}}</td>
                                    <td>{{$data->min_presion_absoluta}}</td>
                                    <td>{{$data->max_presion_relativa}}</td>
                                    <td>{{$data->min_presion_relativa}}</td>
                                    <td>{{$data->max_sensacion_termica}}</td>
                                    <td>{{$data->min_sensacion_termica}}</td>
                                    <td>{{$data->max_temperature_externa}}</td>
                                    <td>{{$data->min_temperature_externa}}</td>
                                    <td>{{$data->max_temperature_interna}}</td>
                                    <td>{{$data->min_temperature_interna}}</td>
                                    <td>{{$data->max_velocidad_viento}}</td>
                                    <td>{{$data->min_velocidad_viento}}</td>
                                  
                                   
                                    </tr>


                                    @endforeach
                             
                                  
                                </tbody>
                              </table>
                           


                        </div>
                        </div>
                
                    </div>

                     <div id="Yearly" class="tabcontent">
                      <h3>Yearly Data</h3>
                      <p>Yearly data summeries from weather station</p>
                      <div class="card-body">
                         <div style="width:100%; max-height:500px; overflow:auto">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>Fecha</th>
                                    <th>Iluvia 24h Total</th>
                                    <th>Max Humedad Externa</th>
                                    <th>Min Humedad Externa</th>
                                    <th>Max Humedad Interna</th>
                                    <th>Min Humedad Interna</th>
                                    <th>Max Presión Absoluta</th>
                                    <th>Min Presión Absoluta</th>
                                    <th>Max Presión Relativa</th>
                                    <th>Min Presión Relativa</th>
                                    <th>Max Sensación Termica</th>
                                    <th>Min Sensación Termica</th>
                                    <th>Max Temperatura Externa</th>
                                    <th>Min Temperatura Externa</th>
                                    <th>Max Temperatura Interna</th>
                                    <th>Min Temperatura Interna</th>
                                    <th>Max Velocidad Viento</th>
                                    <th>Min Velocidad Viento</th>


                                  </tr>
                                </thead>

                                <tbody>
                                   
                                    @foreach($yearly as $data)
                                    <tr>
                                    <td>{{$data->fecha}}</td>
                                    <td>{{$data->lluvia_24_horas_total}}</td>
                                    <td>{{$data->max_humedad_externa}}</td>
                                    <td>{{$data->min_humedad_externa}}</td>
                                    <td>{{$data->max_humedad_interna}}</td>
                                    <td>{{$data->min_humedad_interna}}</td>
                                    <td>{{$data->max_presion_absoluta}}</td>
                                    <td>{{$data->min_presion_absoluta}}</td>
                                    <td>{{$data->max_presion_relativa}}</td>
                                    <td>{{$data->min_presion_relativa}}</td>
                                    <td>{{$data->max_sensacion_termica}}</td>
                                    <td>{{$data->min_sensacion_termica}}</td>
                                    <td>{{$data->max_temperatura_externa}}</td>
                                    <td>{{$data->min_temperatura_externa}}</td>
                                    <td>{{$data->max_temperatura_interna}}</td>
                                    <td>{{$data->min_temperatura_interna}}</td>
                                    <td>{{$data->max_velocidad_viento}}</td>
                                    <td>{{$data->min_velocidad_viento}}</td>

                                   
                                    </tr>


                                    @endforeach
                             
                                  
                                </tbody>
                              </table>
                           


                        </div>
                        </div>
                        </div>

                        
                    </div>


            <div class='card mt-4'>
                <div class="card-header">Data Download</div>
                    <div class="card-body">
                        <form action="{{ route('export_excel.excel') }} " method="POST">
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

                            <div class="form-group">
                                <label for="stations-content">Select Period</label>
                                <select name="periodSelected" class="form-control">
                                
                                    <option value="1">Daily</option>
                                    <option value="2">Ten Days</option>
                                    <option value="3">Monthly</option>
                                    <option value="4">Yearly</option>
                                
                                </select>
                            </div>
                            <hr>
                                <button class="submit">Export Data</button>
                        </form>
                    </div>
            </div>
        </div>
         <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header">Panel de Control</div>
                    <div class="card-body">
                        <form action="{{ route('filterData') }} " method="POST">
                        @csrf

                        <div class="container">
                          <h2>Weather Station Filter</h2>
                          <div class="form-group">
                                <label for="stations-content">Select Weather Station</label>
                                <select name="filter_station" class="form-control">
                                
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
                                <button class="submit">Submit Filter</button>

                            <hr>
                        </form>

                         <h2>Graphics</h2>

                        <form action="{{ route('graphicsData') }} " method="POST">
                        @csrf

                        
                          <div class="form-group">
                                <label for="stations-content">Select Value to Display</label>
                                <select name="graphics_id" class="form-control">
                                
                                    <option id='1' value='1'>Temperatura Interna</option>
                                    <option id='2' value='2'>Humedad Interna</option>
                                    <option id='3' value='3'>Temperatura Externa</option>
                                    <option id='4' value='4'>Humedad Externa</option>
                                    <option id='5' value='5'>Presion Relativa</option>
                                    <option id='6' value='6'>Presion Absoluta</option>
                                    <option id='7' value='7'>Velocidad Viento</option>
                                    <option id='8' value='8'>Sensacion Termica</option>
                                    <option id='9' value='9'>Lluvia 24 horas</option>
                                
                                </select>
                            </div>
                             <hr>
                                <button class="submit">Submit Graphic</button>
                        </form>

                     
                            
           
                    </div>
                </div>
            </div>
            </div>

        </div>
</div>

@endsection
