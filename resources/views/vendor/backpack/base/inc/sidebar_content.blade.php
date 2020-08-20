<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<li class='nav-item'><a class='nav-link' href="{{ backpack_url('dashboard') }}"><i class="nav-icon fa fa-dashboard"></i> {{ trans('backpack::base.dashboard') }}</a></li>
@if(backpack_user()->type=='admin' or backpack_user()->email=='lucia@stats4sd.org' or backpack_user()->email=='d.e.mills@stats4sd.org')

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Data Management</a>
    <ul class="nav-dropdown-items">
      <li class='nav-item'><a class='nav-link' href="{{ backpack_url('user') }}"><i class="nav-icon fa fa-users"></i> Users</a></li>
      <li class='nav-item'><a class='nav-link' href="{{ backpack_url('station') }}"><i class="nav-icon ffas fa-broadcast-tower"></i> Stations</a></li>
      <li class='nav-item nav-dropdown'>
      	<a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Location</a>
      	<ul class="nav-dropdown-items">
      		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('departamento') }}'><i class='nav-icon la la-question'></i> Departamentos</a></li>
			<li class='nav-item'><a class='nav-link' href='{{ backpack_url('municipio') }}'><i class='nav-icon la la-question'></i> Municipios</a></li>
			<li class='nav-item'><a class='nav-link' href='{{ backpack_url('comunidad') }}'><i class='nav-icon la la-question'></i> Comunidads</a></li>

      	</ul>

      </li>
      <li class='nav-item'><a class='nav-link' href="{{ backpack_url('data') }}"><i class="nav-icon fas fa-list"></i> Data</a></li>
      <li class='nav-item'><a class='nav-link' href="{{ backpack_url('upload') }}"><i class="nav-icon fa fa-cloud-upload"></i> Data Uploader</a></li>
      <li class='nav-item'><a class='nav-link' href="{{ backpack_url('dataTemplate') }}"><i class="nav-icon far fa-window-maximize"></i> Data Preview</a></li>

      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('cultivo') }}'><i class='nav-icon la la-question'></i> Cultivos</a></li>
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('variedad') }}'><i class='nav-icon la la-question'></i> Variedads</a></li>
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('pachagrama') }}'><i class='nav-icon la la-question'></i> Pachagramas</a></li>
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('fenologia') }}'><i class='nav-icon la la-question'></i> Fenologias</a></li>
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('parcela') }}'><i class='nav-icon la la-question'></i> Parcelas</a></li>
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('suelo') }}'><i class='nav-icon la la-question'></i> Suelos</a></li>
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('manejoparcela') }}'><i class='nav-icon la la-question'></i> ManejoParcelas</a></li>
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('plagasyenfermedades') }}'><i class='nav-icon la la-question'></i> PlagasYEnfermedades</a></li>
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('produccion') }}'><i class='nav-icon la la-question'></i> Produccions</a></li>
      <li class='nav-item'><a class='nav-link' href='{{ backpack_url('submission') }}'><i class='nav-icon la la-question'></i> Submissions</a></li>
    </ul>
</li>



@endif
<li class='nav-item'><a class='nav-link' href="{{ backpack_url('daily') }}"><i class="nav-icon far fa-calendar-times"></i>Daily</a></li>
<li class='nav-item'><a class='nav-link' href="{{ backpack_url('tenDays') }}"><i class="nav-icon far fa-calendar-minus"></i>Ten Days</a></li>
<li class='nav-item'><a class='nav-link' href="{{ backpack_url('monthly') }}"><i class="nav-icon far fa-calendar-alt"></i>Monthly</a></li>
<li class='nav-item'><a class='nav-link' href="{{ backpack_url('yearly') }}"><i class="nav-icon far fa-calendar"></i>Yearly</a></li>



<li class='nav-item'><a class='nav-link' href='{{ backpack_url('xlsform') }}'><i class='nav-icon la la-question'></i> Xlsforms</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('datamap') }}'><i class='nav-icon la la-question'></i> DataMaps</a></li>