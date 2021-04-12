<?php
	$value = data_get($entry, $column['name']);

    // make sure columns are defined
    if (!isset($column['columns'])) {
        $column['columns'] = ['value' => "Value"];
    }

	$columns = $column['columns'];

	// if this attribute isn't using attribute casting, decode it
	if (is_string($value)) {
	    $value = json_decode($value);
    }
?>

<span>
    <?php if($value && count($columns)): ?>

    <?php echo $__env->renderWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

    <table class="table table-bordered table-condensed table-striped m-b-0">
		<thead>
			<tr>
				<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tableColumnKey => $tableColumnLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<th><?php echo e($tableColumnLabel); ?></th>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tableRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tableColumnKey => $tableColumnLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<td>

						<?php if( is_array($tableRow) && isset($tableRow[$tableColumnKey]) ): ?>

                            <?php echo e($tableRow[$tableColumnKey]); ?>


                        <?php elseif( is_object($tableRow) && property_exists($tableRow, $tableColumnKey) ): ?>

                            <?php echo e($tableRow->{$tableColumnKey}); ?>


                        <?php endif; ?>

					</td>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
    </table>

    <?php echo $__env->renderWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

	<?php endif; ?>
</span>
<?php /**PATH /home/forge/weatherstations.stats4sd.org/vendor/backpack/crud/src/resources/views/crud/columns/table.blade.php ENDPATH**/ ?>