
@extends(backpack_view('blank'))



@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }} </a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="box-title">
                        <label>Daily Aggregation Charts</label>
                        <h2>Chojñapata</h2>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Station
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">                   
                      <li><a href="dashboard/1">Chojñapata</a></li>
                      <li><a href="dashboard/2">Chinchaya China</a></li>
                      <li><a href="dashboard/3">Chinchaya Davis</a></li>
                      <li><a href="dashboard/4">Calahuancane</a></li>
                      <li><a href="dashboard/5">Cutusuma</a></li>
                      <li><a href="dashboard/6">Iñacamaya</a></li>
                      <li><a href="dashboard/7">Incamya</a></li>
                    </ul>
                  </div>

                <div class="box-body">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-sm-12">
                                <div id="temps_div_in"></div>
                                    <?= Lava::render('LineChart', 'TemperatureIn', 'temps_div_in') ?>  
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection