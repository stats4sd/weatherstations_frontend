<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-area-chart"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
@if(backpack_user()->type=='admin')
<li class="treeview">
	<a href="#"><i class="fas fa-server"></i><span> Data Management</span><i class="fa fa-angle-down pull-right"></i></a>

	<ul class="treeview-menu">
		<li><a href="{{ backpack_url('user')}}"><i class="fa fa-users"></i> <span>Users</span></a></li>
		<li><a href="{{ backpack_url('station') }}"><i class='fas fa-broadcast-tower'></i> <span>Stations</span></a></li>
		<li><a href="{{ backpack_url('data') }}"><i class='fas fa-list'></i><span>     Data</span></a></li>
		<li><a href="{{ backpack_url('upload') }}"><i class='fa fa-cloud-upload'></i> <span>Data Uploader</span></a></li>
		<li><a href="{{ backpack_url('dataTemplate') }}"><i class='far fa-window-maximize'></i> <span>Data Preview</span></a></li>
		<li><a href='{{ backpack_url('meteobridge') }}'><i class='fa fa-tag'></i> <span>Meteobridge</span></a></li>
	</ul>
</li>
@endif
<li><a href="{{ backpack_url('daily') }}"><i class='far fa-calendar-times'></i> <span>Daily</span></a></li>
<li><a href="{{ backpack_url('tenDays') }}"><i class='far fa-calendar-minus'></i> <span>Ten Days</span></a></li>
<li><a href="{{ backpack_url('monthly') }}"><i class='far fa-calendar-alt'></i> <span>Monthly</span></a></li>
<li><a href="{{ backpack_url('yearly') }}"><i class='far fa-calendar'></i> <span>Yearly</span></a></li>

<!-- <li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li> -->


