@extends('backpack::layout')
@section('header')
    <section class="content-header">
      <h1>
        Data Uploader
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.upload') }}</a></li>
       <!--  <li class="active">{{ trans('backpack::base.uploads') }}</li> -->
      </ol>
    </section>
@endsection

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('files.store') }} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="file" class="control-label col-sm-3"><h4><b>Elija un archivo de datos para subir. Este debe ser el archivo sin editar recuperado del sistema de la estación meteorológica</b></h4></label>
                                <div class="col-sm-9">
                                    <input name="data-file" type="file" class="form-control-file btn btn-outline-info">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file" class="control-label col-sm-3"><h4><b>Seleccione el tipo de estación meteorológica de la que proviene este conjunto de datos.</b></h4></label>
                                <div class="col-sm-9">
                                    <select name="weatherstation" class="form-control btn btn-outline-info">
                                        @foreach($stations as $station)
                                        <option id='{{$station->id}}' value='{{$station->id}}'>{{$station->stations}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div>
                            <h3><b>Seleccione los tipos de unidades para los siguientes tipos de datos.</b></h3>
                            <p><h5>Los valores se almacenan en la base de datos con las siguientes unidades: º C, hPa, m/s, mm.</h5></p>
                            <p><h5>Si los datos tienen un tipo de unidad diferente, convierta los valores después de cargar el archivo en la página Data Preview.</h5></p>
                              <br>
                            </div>

                            <div class="form-group row">
                              <label for="file" class="control-label col-sm-3"><h4>Temperatura</h4></label>
                              <div class="col-sm-9">
                                <select name="temp_unit" class="form-control btn btn-outline-info">
                                  <option id="1" value="C">Celsius ( º C )</option>
                                  <option id="2" value="F">Farhenheit ( º F )</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="file" class="control-label col-sm-3"><h4>Presión</h4></label>
                              <div class="col-sm-9">
                                <select name="pression_unit" class="form-control btn btn-outline-info">
                                  <option id="1" value="hpa" >hPa</option>
                                  <option id="2" value="inhg">inhg</option>
                                  <option id="3" value="mmhg">mmhg</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="file" class="control-label col-sm-3"><h4>Velocidad del viento</h4></label>
                              <div class="col-sm-9">
                                <select name="veloc_viento_unit" class="form-control btn btn-outline-info">
                                  <option id="1" value="m/s" >m/s</option>
                                  <option id="2" value="km/h">km/h</option>
                                  <option id="3" value="mph">mph</option>
                                </select>
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="file" class="control-label col-sm-3"><h4>Precipitación</h4></label>
                              <div class="col-sm-9">
                                <select name="precip_unit" class="form-control btn btn-outline-info">
                                  <option id="1" value="mm">mm</option>
                                  <option id="2" value="inch">inch</option>
                                </select>
                              </div>
                            </div>

                            <button class="submit btn btn-info mb-5" >Submit File</button>
                          </form>
                          <div>
                            <h3><b>Vaya a la página Data Preview para convertir los valores de datos y cargar datos en la base de datos</b></h3>
                            <br>
                          </div>
                          <a href="dataTemplate" class="btn btn-info" role="button">Data Preview</a>

                    </div>
                </div>
            </div>
        </div>
    
 

@endsection

