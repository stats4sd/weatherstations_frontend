<?php
    if (!isset($field['wrapperAttributes']) || !isset($field['wrapperAttributes']['data-init-function'])){
        $field['wrapperAttributes']['data-init-function'] = 'bpFieldInitUploadMultipleElement';
    }

    if (!isset($field['wrapperAttributes']) || !isset($field['wrapperAttributes']['data-field-name'])) {
        $field['wrapperAttributes']['data-field-name'] = $field['name'];
    }

?>

<!-- upload multiple input -->
<?php echo $__env->make('crud::fields.inc.wrapper_start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <label><?php echo $field['label']; ?></label>
    <?php echo $__env->make('crud::fields.inc.translatable_icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	
	<?php if(isset($field['value'])): ?>
	<?php
		if (is_string($field['value'])) {
			$values = json_decode($field['value'], true) ?? [];
		} else {
			$values = $field['value'];
		}
	?>
	<?php if(count($values)): ?>
    <div class="well well-sm existing-file">
    	<?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $file_path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		<div class="file-preview">
    			<?php if(isset($field['temporary'])): ?>
		            <a target="_blank" href="<?php echo e(isset($field['disk'])?asset(\Storage::disk($field['disk'])->temporaryUrl($file_path, Carbon\Carbon::now()->addMinutes($field['temporary']))):asset($file_path)); ?>"><?php echo e($file_path); ?></a>
		        <?php else: ?>
		            <a target="_blank" href="<?php echo e(isset($field['disk'])?asset(\Storage::disk($field['disk'])->url($file_path)):asset($file_path)); ?>"><?php echo e($file_path); ?></a>
		        <?php endif; ?>
		    	<a href="#" class="btn btn-light btn-sm float-right file-clear-button" title="Clear file" data-filename="<?php echo e($file_path); ?>"><i class="la la-remove"></i></a>
		    	<div class="clearfix"></div>
	    	</div>
    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    <?php endif; ?>
	
	<input name="<?php echo e($field['name']); ?>[]" type="hidden" value="">
	<div class="backstrap-file mt-2">
		<input
	        type="file"
	        name="<?php echo e($field['name']); ?>[]"
	        value="<?php if(old(square_brackets_to_dots($field['name']))): ?> old(square_brackets_to_dots($field['name'])) <?php elseif(isset($field['default'])): ?> $field['default'] <?php endif; ?>"
	        <?php echo $__env->make('crud::fields.inc.attributes', ['default_class' =>  isset($field['value']) && $field['value']!=null?'file_input backstrap-file-input':'file_input backstrap-file-input'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	        multiple
	    >
        <label class="backstrap-file-label" for="customFile"></label>
    </div>

    
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>
<?php echo $__env->make('crud::fields.inc.wrapper_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




<?php if($crud->fieldTypeNotLoaded($field)): ?>
    <?php
        $crud->markFieldTypeAsLoaded($field);
    ?>

    <?php $__env->startPush('crud_fields_scripts'); ?>
        <!-- no scripts -->
        <script>
        	function bpFieldInitUploadMultipleElement(element) {
        		var fieldName = element.attr('data-field-name');
        		var clearFileButton = element.find(".file-clear-button");
        		var fileInput = element.find("input[type=file]");
        		var inputLabel = element.find("label.backstrap-file-label");

		        clearFileButton.click(function(e) {
		        	e.preventDefault();
		        	var container = $(this).parent().parent();
		        	var parent = $(this).parent();
		        	// remove the filename and button
		        	parent.remove();
		        	// if the file container is empty, remove it
		        	if ($.trim(container.html())=='') {
		        		container.remove();
		        	}
		        	$("<input type='hidden' name='clear_"+fieldName+"[]' value='"+$(this).data('filename')+"'>").insertAfter(fileInput);
		        });

		        fileInput.change(function() {
	                inputLabel.html("Files selected. After save, they will show up above.");
		        	// remove the hidden input, so that the setXAttribute method is no longer triggered
		        	$(this).next("input[type=hidden]").remove();
		        });
        	}
        </script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH /home/forge/weatherstations.stats4sd.org/vendor/backpack/crud/src/resources/views/crud/fields/upload_multiple.blade.php ENDPATH**/ ?>