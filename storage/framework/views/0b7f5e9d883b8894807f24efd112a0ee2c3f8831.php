<?php
    $value = data_get($entry, $column['name']);
    $column['prefix'] = $column['prefix'] ?? '';
    $column['disk'] = $column['disk'] ?? null;
    $column['escaped'] = $column['escaped'] ?? true;
    $column['wrapper']['element'] = $column['wrapper']['element'] ?? 'a';
    $column['wrapper']['target'] = $column['wrapper']['target'] ?? '_blank';
    $column_wrapper_href = $column['wrapper']['href'] ?? function($file_path, $disk, $prefix) { return ( !is_null($disk) ?asset(\Storage::disk($disk)->url($file_path)):asset($prefix.$file_path) ); }
?>

<span>
    <?php if($value && count($value)): ?>
        <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file_path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $column['wrapper']['href'] = is_callable($column_wrapper_href) ? $column_wrapper_href($file_path, $column['disk'], $column['prefix']) : $column_wrapper_href;
            $text = $column['prefix'].$file_path;
        ?>
            <?php echo $__env->renderWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
            <?php if($column['escaped']): ?>
                - <?php echo e($text); ?> <br/>
            <?php else: ?>
                - <?php echo $text; ?> <br/>
            <?php endif; ?>
        <?php echo $__env->renderWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        -
    <?php endif; ?>
</span>
<?php /**PATH /home/forge/weatherstations.stats4sd.org/vendor/backpack/crud/src/resources/views/crud/columns/upload_multiple.blade.php ENDPATH**/ ?>