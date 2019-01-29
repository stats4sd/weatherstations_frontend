@extends('layouts.app')

@section('content')

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
                
              <form action="{{ route('export_excel.excel') }} " method="POST">
                @csrf

            <div class="card-header">Data Download</div>
            <div class="checkbox">
                <label>
                <input type="checkbox" name="stationSelected[]" value="1">Chojñapata-Davis                    
                </label>
                <label>
                <input type="checkbox" name="stationSelected[]" value="2">Chinchaya-Davis
                </label>
                <label>
                <input type="checkbox" name="stationSelected[]" value="3">Chinchaya-Chinas
                </label>
                <label>
                <input type="checkbox" name="stationSelected[]" value="4">Calahuancane-Davis
                </label>
                <label>
                <input type="checkbox" name="stationSelected[]" value="5">Cutusuma-Davis
                </label>
                <label>
                <input type="checkbox" name="stationSelected[]" value="6">Iñacamaya-Davis
                </label>
                <label>
                <input type="checkbox" name="stationSelected[]" value="7">Incamya-Chinas
                </label>

              


            </div>

                    <button class="submit">Export Data</button>


                   
                    </div>
                </form>







                
                      </div>
                    </div>
              
              





               
            <br/>
           







                </div>
            </div>
        </div>
    </div>
</div>
@endsection
