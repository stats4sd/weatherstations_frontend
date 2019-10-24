

<a href="javascript:void(0)" onclick="getDownload(event)" class="btn btn-sm btn-secondary" data-toggle="popover"><i class="fa fa-download"></i> Download</a>

<div class="alert alert-danger alert-block " id="error"></div>

@section('after_scripts')
<script>
	if(typeof getDownload != 'function') {

	
		
		/**
		 * Gets the currently visible columns, any user-added ordering, and applied filters to the crud table, then sends that all to the downloadFromCrud route for server-side preparation of the download
		 * @param  {event} e The event that occured. Only used to get the target of the event (the button) so we can disable it during processing.
		 * @return {null}   Result of function is not returned - but the user is redirected to the download url once the file has been generated.
		 */
      	function getDownload(e) {
      		jQuery("#error").hide();
      		var target = e.target;

      		target.disabled = true;
			target.innerHTML = `<div class="spinner-border spinner-border-sm"></div> Preparing...`;
	      	
			$.ajax({
				"url": "{{ url($crud->route . '/download') }}",
				"method":"POST",
				"success": function(result) {
					console.log("success");
					window.location.replace('https://weatherstations-ccrp.stats4sd.org/storage/data/data.csv');
					//location.reload();

				},
				"error": function(result){
	        		jQuery('#error').show();
	        		jQuery("#error").html(result.responseJSON.message.substr(0, 200));
				},
				"complete": function() {
					target.disabled = false;
					target.innerHTML = "<i class='fa fa-download'></i> Download";
				}
			})
		}
	 
	}

jQuery(document).ready(function(){
	jQuery("#error").hide();
});
</script>
@endsection