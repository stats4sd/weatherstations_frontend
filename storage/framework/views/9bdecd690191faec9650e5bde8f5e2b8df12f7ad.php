<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->

<li class='nav-item'><a class='nav-link' href="<?php echo e(backpack_url('dashboard')); ?>"><i class="nav-icon fa fa-dashboard"></i> <?php echo e(trans('backpack::base.dashboard')); ?></a></li>

<h4 class='nav-item nav-link text-white mt-3'>Met Data</h4>
<li class='nav-item'><a class='nav-link' href="<?php echo e(backpack_url('station')); ?>"><i class="nav-icon ffas fa-broadcast-tower"></i> Met Stations</a></li>
<li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('weather_data')); ?>'><i class='nav-icon la la-question'></i> Weather Data</a></li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Data Summaries</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href="<?php echo e(backpack_url('daily')); ?>"><i class="nav-icon far fa-calendar-times"></i>Daily</a></li>
        <li class='nav-item'><a class='nav-link' href="<?php echo e(backpack_url('tenDays')); ?>"><i class="nav-icon far fa-calendar-minus"></i>Ten Days</a></li>
        <li class='nav-item'><a class='nav-link' href="<?php echo e(backpack_url('monthly')); ?>"><i class="nav-icon far fa-calendar-alt"></i>Monthly</a></li>
        <li class='nav-item'><a class='nav-link' href="<?php echo e(backpack_url('yearly')); ?>"><i class="nav-icon far fa-calendar"></i>Yearly</a></li>
    </ul>
</li>

<h4 class='nav-item nav-link text-white mt-3'>Agronomic Data</h4>
<li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('xlsform')); ?>'><i class='nav-icon la la-question'></i> XLS Forms</a></li>
<li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('datamap')); ?>'><i class='nav-icon la la-question'></i> Data Maps</a></li>
<li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('submission')); ?>'><i class='nav-icon la la-question'></i> Submissions</a></li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Plot-level Modules</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('parcela')); ?>'><i class='nav-icon la la-question'></i> Parcelas</a></li>
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('suelo')); ?>'><i class='nav-icon la la-question'></i> Suelos</a></li>
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('muestrasuelo')); ?>'><i class='nav-icon la la-question'></i> Muestras Suelo</a></li>
    </ul>
</li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Crop-level Modules</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('cultivo')); ?>'><i class='nav-icon la la-question'></i> Cultivos</a></li>
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('fenologia')); ?>'><i class='nav-icon la la-question'></i> Fenologia</a></li>
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('manejoparcela')); ?>'><i class='nav-icon la la-question'></i> Manejo Parcela</a></li>
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('plaga')); ?>'><i class='nav-icon la la-question'></i> Plagas</a></li>
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('enfermedade')); ?>'><i class='nav-icon la la-question'></i> Enfermedades</a></li>
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('rendimento')); ?>'><i class='nav-icon la la-question'></i> Rendimentos</a></li>
    </ul>
</li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Crop Lists</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('lkpcultivo')); ?>'><i class='nav-icon la la-question'></i> Cultivos</a></li>
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('lkpvariedad')); ?>'><i class='nav-icon la la-question'></i> Variedades</a></li>
    </ul>
</li>

<h4 class='nav-item nav-link text-white mt-3'>Platform Management</h4>
<li class='nav-item'><a class='nav-link' href="<?php echo e(backpack_url('user')); ?>"><i class="nav-icon fa fa-users"></i> Users</a></li>

<li class='nav-item nav-dropdown'>
    <a class='nav-link nav-dropdown-toggle' href="#"><i class="nav-icon fa fa-newspaper-o"></i>Locations</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('region')); ?>'><i class='nav-icon la la-question'></i> Regions</a></li>
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('departamento')); ?>'><i class='nav-icon la la-question'></i> Departamentos</a></li>
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('municipio')); ?>'><i class='nav-icon la la-question'></i> Municipios</a></li>
        <li class='nav-item'><a class='nav-link' href='<?php echo e(backpack_url('comunidad')); ?>'><i class='nav-icon la la-question'></i> Comunidads</a></li>
    </ul>
</li>
<?php /**PATH /home/forge/weatherstations.stats4sd.org/resources/views/vendor/backpack/base/inc/sidebar_content.blade.php ENDPATH**/ ?>