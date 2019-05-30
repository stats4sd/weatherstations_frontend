@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">{{ config('backpack.base.project_name') }}</a></li>
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
                    </div>
                </div>

                <div class="box-body">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-sm-12">
                                <div id="temps_div_in"></div>
                                    <?= Lava::render('LineChart', 'TemperatureIn', 'temps_div_in') ?>  
                            </div>

                            <div class="col-sm-12">
                                <div id="temps_div_out"></div>
                                <?= Lava::render('LineChart', 'TemperatureOut', 'temps_div_out') ?>  
                            </div>

                            <div class="col-sm-12">
                                <div id="lava_hum_in"></div>
                                <?= Lava::render('LineChart', 'HumedadIn', 'lava_hum_in') ?>  
                            </div>

                            <div class="col-sm-12">
                                <div id="lava_hum_out"></div>
                                <?= Lava::render('LineChart', 'HumedadOut', 'lava_hum_out') ?>  
                            </div>

                             <div class="col-sm-12">
                                <div id="pres_rel"></div>
                                <?= Lava::render('LineChart', 'PressionR', 'pres_rel') ?>  
                            </div>

                            <div class="col-sm-12">
                                <div id="pres_abs"></div>
                                <?= Lava::render('LineChart', 'PressionA', 'pres_abs') ?>  
                            </div>

                            <div class="col-sm-12">
                                <div id="veloc_viento"></div>
                                <?= Lava::render('LineChart', 'VelocidadViento', 'veloc_viento') ?>  
                            </div>

                            <div class="col-sm-12">
                                <div id="sens_termica"></div>
                                <?= Lava::render('LineChart', 'SensTermica', 'sens_termica') ?>  
                            </div>


                            


                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







                      
                  
                    

        


@endsection