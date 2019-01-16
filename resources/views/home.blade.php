@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Uplaoder</div>

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
                            <input name="data-file" type="file" class="form-control form-control-file">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="file" class="control-label col-sm-3">Select the weather station type this dataset came from</label>
                        <div class="col-sm-9">
                            <select name="weatherstation" class="form-control">
                                <option id='davis' value='davis'>Davis</option>
                                <option id='chinas' value='chinas'>Chinas</option>
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
@endsection
