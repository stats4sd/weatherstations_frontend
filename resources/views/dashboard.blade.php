
@extends(backpack_view('blank'))



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



                            
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection