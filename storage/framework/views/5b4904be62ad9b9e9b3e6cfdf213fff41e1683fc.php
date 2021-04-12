<!-- Simple MDE - Markdown Editor -->
<?php echo $__env->make('crud::fields.inc.wrapper_start', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <label><?php echo $field['label']; ?></label>
    <?php echo $__env->make('crud::fields.inc.translatable_icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <textarea
        name="<?php echo e($field['name']); ?>"
        data-init-function="bpFieldInitSimpleMdeElement"
        data-simplemdeAttributesRaw="<?php echo e(isset($field['simplemdeAttributesRaw']) ? "{".$field['simplemdeAttributesRaw']."}" : "{}"); ?>"
        data-simplemdeAttributes="<?php echo e(isset($field['simplemdeAttributes']) ? json_encode($field['simplemdeAttributes']) : "{}"); ?>"
        <?php echo $__env->make('crud::fields.inc.attributes', ['default_class' => 'form-control'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    	><?php echo e(old(square_brackets_to_dots($field['name'])) ?? $field['value'] ?? $field['default'] ?? ''); ?></textarea>

    
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>
<?php echo $__env->make('crud::fields.inc.wrapper_end', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





<?php if($crud->fieldTypeNotLoaded($field)): ?>
    <?php
        $crud->markFieldTypeAsLoaded($field);
    ?>

    
    <?php $__env->startPush('crud_fields_styles'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('packages/simplemde/dist/simplemde.min.css')); ?>">
        <style type="text/css">
        .CodeMirror-fullscreen, .editor-toolbar.fullscreen {
            z-index: 9999 !important;
        }
        .CodeMirror{
        	min-height: auto !important;
        }
        </style>
    <?php $__env->stopPush(); ?>

    
    <?php $__env->startPush('crud_fields_scripts'); ?>
        <script src="<?php echo e(asset('packages/simplemde/dist/simplemde.min.js')); ?>"></script>
        <script>
            function bpFieldInitSimpleMdeElement(element) {
                if (element.attr('data-initialized') == 'true') {
                    return;
                }

                if (typeof element.attr('id') == 'undefined') {
                    element.attr('id', 'SimpleMDE_'+Math.ceil(Math.random() * 1000000));
                }

                var elementId = element.attr('id');
                var simplemdeAttributes = JSON.parse(element.attr('data-simplemdeAttributes'));
                var simplemdeAttributesRaw = JSON.parse(element.attr('data-simplemdeAttributesRaw'));
                var configurationObject = {
                    element: document.getElementById(elementId),
                };

                configurationObject = Object.assign(configurationObject, simplemdeAttributes, simplemdeAttributesRaw);

                if (!document.getElementById(elementId)) {
                    return;
                }

                var smdeObject = new SimpleMDE(configurationObject);

                smdeObject.options.minHeight = smdeObject.options.minHeight || "300px";
                smdeObject.codemirror.getScrollerElement().style.minHeight = smdeObject.options.minHeight;

                // update the original textarea on keypress
                smdeObject.codemirror.on("change", function(){
                    element.val(smdeObject.value());
                });

                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    setTimeout(function() { smdeObject.codemirror.refresh(); }, 10);
                });
            }
        </script>
    <?php $__env->stopPush(); ?>

<?php endif; ?>



<?php /**PATH /home/forge/weatherstations.stats4sd.org/vendor/backpack/crud/src/resources/views/crud/fields/simplemde.blade.php ENDPATH**/ ?>