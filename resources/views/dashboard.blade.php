
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
                

                <div class="custom-select" style="width:200px;">
                    <select id="station">
                        <!-- <option>Station</option> -->
                        <option value="1">Chojñapata</option>
                        <option value="2">Chinchaya China</option>
                        <option value="3">Chinchaya Davis</option>
                        <option value="4">Calahuancane</option>
                        <option value="5">Cutusuma</option>
                        <option value="6">Iñacamaya</option>
                        <option value="7">Incamya</option>
                    </select>                   
                </div>

                <div class="custom-select" style="width:200px;">
                    <select id = "aggregation">
                        <!-- <option>Aggregation</option> -->
                        <option value="daily">Daily</option>
                        <option value="ten_days">Ten Days</option>
                        <option value="monthly">Monthly</option>
                        <option value="yearly">Yearly</option>
                    </select>                   
                </div>

                <div class="custom-select" style="width:200px;">
                    <select id="year">
                        <!-- <option>Select year</option> -->
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                    </select>                   
                </div>
                <div class="custom-select" style="width:200px;">
                    <select id="month">
                        <!-- <option>Select Month</option> -->
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>



                <div class="box-body">
                    <div class="container-fluid">
                        <div class="row">
                          
                            <div class="col-sm-6">
                                <div id="temps_div_in"></div>
                                    <?= Lava::render('LineChart', 'TemperatureIn', 'temps_div_in') ?>  
                            </div>
                            
                            

                        </div>
                        <div class="row">
                            <canvas id="myChart" height="280" width="600"></canvas>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('after_scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script type="text/javascript">
    

jQuery(document).ready(function(){

    jQuery("#station").change(function(){
        var station_id = jQuery('#station').val();
            var agg = jQuery('#aggregation').val();
            var year = jQuery('#year').val();
            var month = jQuery('#month').val();
            console.log(station_id, agg, year, month);

            jQuery.ajax('{{ url('admin/dashboard/charts') }}', {
            method: "POST",
            data: {
                station_id: station_id,
                agg: agg,
                year : year,
                month : month,
            }
        }).done(function(res) {
            
        });

    jQuery('#aggregation').change(function(){
        
            var value = jQuery('#station').val();
            var agg = jQuery('#aggregation').val();
            var year = jQuery('#year').val();
            var month = jQuery('#month').val();
            console.log(value, agg, year, month);
        });

    jQuery('#year').change(function(){
        
            var value = jQuery('#station').val();
            var agg = jQuery('#aggregation').val();
            var year = jQuery('#year').val();
            var month = jQuery('#month').val();
            console.log(value, agg, year, month);        
        });

    jQuery('#month').change(function(){
            var value = jQuery('#station').val();
            var agg = jQuery('#aggregation').val();
            var year = jQuery('#year').val();
            var month = jQuery('#month').val();
            console.log(value, agg, year, month);
        });

});

</script>
@endsection
