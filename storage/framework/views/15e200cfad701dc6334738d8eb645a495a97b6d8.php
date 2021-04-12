
<?php
    $column['escaped'] = $column['escaped'] ?? false;
    $column['text'] = $column['function']($entry);
?>

<span>
	<?php echo $__env->renderWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
        <?php if($column['escaped']): ?>
            <?php echo e($column['text']); ?>

        <?php else: ?>
            <?php echo $column['text']; ?>

        <?php endif; ?>
    <?php echo $__env->renderWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>
</span>
<?php /**PATH /home/forge/weatherstations.stats4sd.org/vendor/backpack/crud/src/resources/views/crud/columns/closure.blade.php ENDPATH**/ ?>