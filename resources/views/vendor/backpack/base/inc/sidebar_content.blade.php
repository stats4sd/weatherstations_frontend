<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<li class='nav-item'><a class='nav-link' href="{{ backpack_url('dashboard') }}"><i class="nav-icon fa fa-dashboard"></i> {{ trans('backpack::base.dashboard') }}</a></li>
@if(backpack_user()->type=='admin')

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Data Management</a>
    <ul class="nav-dropdown-items">
      <li class='nav-item'><a class='nav-link' href="{{ backpack_url('user') }}"><i class="nav-icon fa fa-users"></i> Users</a></li>
      <li class='nav-item'><a class='nav-link' href="{{ backpack_url('station') }}"><i class="nav-icon ffas fa-broadcast-tower"></i> Stations</a></li>
      <li class='nav-item'><a class='nav-link' href="{{ backpack_url('data') }}"><i class="nav-icon fas fa-list"></i> Data</a></li>
      <li class='nav-item'><a class='nav-link' href="{{ backpack_url('upload') }}"><i class="nav-icon fa fa-cloud-upload"></i> Data Uploader</a></li>
      <li class='nav-item'><a class='nav-link' href="{{ backpack_url('dataTemplate') }}"><i class="nav-icon far fa-window-maximize"></i> Data Preview</a></li>
      <li class='nav-item'><a class='nav-link' href="{{ backpack_url('meteobridge') }}"><i class="nav-icon fa fa-tag"></i> Meteobridge </a></li>
    </ul>
</li>



@endif
<li class='nav-item'><a class='nav-link' href="{{ backpack_url('daily') }}"><i class="nav-icon far fa-calendar-times"></i>Daily</a></li>
<li class='nav-item'><a class='nav-link' href="{{ backpack_url('tenDays') }}"><i class="nav-icon far fa-calendar-minus"></i>Ten Days</a></li>
<li class='nav-item'><a class='nav-link' href="{{ backpack_url('monthly') }}"><i class="nav-icon far fa-calendar-alt"></i>Monthly</a></li>
<li class='nav-item'><a class='nav-link' href="{{ backpack_url('yearly') }}"><i class="nav-icon far fa-calendar"></i>Yearly</a></li>
