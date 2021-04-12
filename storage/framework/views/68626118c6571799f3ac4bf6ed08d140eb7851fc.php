
<li filter-name="<?php echo e($filter->name); ?>"
    filter-type="<?php echo e($filter->type); ?>"
    filter-key="<?php echo e($filter->key); ?>"
	class="nav-item dropdown <?php echo e(Request::get($filter->name)?'active':''); ?>">
	<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo e($filter->label); ?> <span class="caret"></span></a>
	<div class="dropdown-menu p-0">
		<div class="form-group backpack-filter mb-0">
			<div class="input-group date">
		        <div class="input-group-prepend">
		          <span class="input-group-text"><i class="la la-calendar"></i></span>
		        </div>
		        <input class="form-control pull-right"
		        		id="daterangepicker-<?php echo e($filter->key); ?>"
		        		type="text"
		        		<?php if($filter->currentValue): ?>
							<?php
								$dates = (array)json_decode($filter->currentValue);
								$start_date = $dates['from'];
								$end_date = $dates['to'];
					        	$date_range = implode(' ~ ', $dates);
					        	$date_range = str_replace('-', '/', $date_range);
					        	$date_range = str_replace('~', '-', $date_range);

					        ?>
					        placeholder="<?php echo e($date_range); ?>"
						<?php endif; ?>
		        		>
		        <div class="input-group-append daterangepicker-<?php echo e($filter->key); ?>-clear-button">
		          <a class="input-group-text" href=""><i class="la la-times"></i></a>
		        </div>
		    </div>
		</div>
	</div>
</li>







<?php $__env->startPush('crud_list_styles'); ?>
    <!-- include select2 css-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('packages/bootstrap-daterangepicker/daterangepicker.css')); ?>" />
	<style>
		.input-group.date {
			width: 320px;
			max-width: 100%; }
		.daterangepicker.dropdown-menu {
			z-index: 3001!important;
		}
	</style>
<?php $__env->stopPush(); ?>





<?php $__env->startPush('crud_list_scripts'); ?>
	<script type="text/javascript" src="<?php echo e(asset('packages/moment/min/moment.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('packages/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
  <script>

  		function applyDateRangeFilter<?php echo e($filter->key); ?>(start, end) {
  			if (start && end) {
  				var dates = {
					'from': start.format('YYYY-MM-DD'),
					'to': end.format('YYYY-MM-DD')
				};
				var value = JSON.stringify(dates);
  			} else {
  				//this change to empty string,because addOrUpdateUriParameter method just judgment string
  				var value = '';
  			}
			var parameter = '<?php echo e($filter->name); ?>';

	    	// behaviour for ajax table
			var ajax_table = $('#crudTable').DataTable();
			var current_url = ajax_table.ajax.url();
			var new_url = addOrUpdateUriParameter(current_url, parameter, value);

			// replace the datatables ajax url with new_url and reload it
			new_url = normalizeAmpersand(new_url.toString());
			ajax_table.ajax.url(new_url).load();

			// add filter to URL
			crud.updateUrl(new_url);

			// mark this filter as active in the navbar-filters
			if (URI(new_url).hasQuery('<?php echo e($filter->name); ?>', true)) {
				$('li[filter-key=<?php echo e($filter->key); ?>]').removeClass('active').addClass('active');
			}
			else
			{
				$('li[filter-key=<?php echo e($filter->key); ?>]').trigger('filter:clear');
			}
  		}

		jQuery(document).ready(function($) {
			var dateRangeInput = $('#daterangepicker-<?php echo e($filter->key); ?>').daterangepicker({
				timePicker: false,
		        ranges: {
		            'Today': [moment().startOf('day'), moment().endOf('day')],
		            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
		            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
		            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
		            'This Month': [moment().startOf('month'), moment().endOf('month')],
		            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		        },
				<?php if($filter->currentValue): ?>
		        startDate: moment("<?php echo e($start_date); ?>"),
		        endDate: moment("<?php echo e($end_date); ?>"),
				<?php endif; ?>
				alwaysShowCalendars: true,
				autoUpdateInput: true
			});

			dateRangeInput.on('apply.daterangepicker', function(ev, picker) {
				applyDateRangeFilter<?php echo e($filter->key); ?>(picker.startDate, picker.endDate);
			});

			$('li[filter-key=<?php echo e($filter->key); ?>]').on('hide.bs.dropdown', function () {
				if($('.daterangepicker').is(':visible'))
			    return false;
			});

			$('li[filter-key=<?php echo e($filter->key); ?>]').on('filter:clear', function(e) {
				// console.log('daterangepicker filter cleared');
				//if triggered by remove filters click just remove active class,no need to send ajax
				$('li[filter-key=<?php echo e($filter->key); ?>]').removeClass('active');
			});

			// datepicker clear button
			$(".daterangepicker-<?php echo e($filter->key); ?>-clear-button").click(function(e) {
				e.preventDefault();
				applyDateRangeFilter<?php echo e($filter->key); ?>(null, null);
			})
		});
  </script>
<?php $__env->stopPush(); ?>


<?php /**PATH /home/forge/weatherstations.stats4sd.org/vendor/backpack/crud/src/resources/views/crud/filters/date_range.blade.php ENDPATH**/ ?>