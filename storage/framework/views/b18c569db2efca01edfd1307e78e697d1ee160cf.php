<?php $__env->startSection('content'); ?>
	<div class="container">
		<section class="content mb-5" id="generate_qr_code">
			<h3 class="mb-5"><b>Generate QR Codes</b></h3>
			<p>Use this page to generate QR codes to assign to specific plots.</p>
			<p>Click the button below to generate a sheet of sample codes for printing. Every code will be unique within the system. You should generate enough QR codes to cover the plots you intend to register into the platform. It doesn't matter if not all codes are used, but it is vital that every plot has a unique code.</p>
		</section>
		<div class="visible-print">

		</div>
		<div class="card card-primary">
			<div class="card-body">

				<form method="post" action="<?php echo e(route('qr-newcodes')); ?>">
					<?php echo csrf_field(); ?>
					<div class="form-group row <?php echo e($errors->has('prefix') ? 'has-error' : ''); ?>">
						<label for="prefix" class="col-sm-4">Enter the prefix to use for the codes</label>
						<div class="col-sm-4">
						<input type="text" class="form-control" id="prefix" name="prefix" onkeyup="standardCode()">
                        <span class="text-danger"><?php echo e($errors->first('prefix')); ?></span>
						</div>
					</div>
					<div class="form-group row <?php echo e($errors->has('code_number') ? 'has-error' : ''); ?>">

						<label for="code_numberber" class="col-sm-4">How many QR codes do you need?</label>
						<div class="col-sm-4">
							<input type="number" class="form-control" id="code_number" name="code_number">
							<small id="passwordHelpBlock" class="form-text text-muted">You will receive one printable page for each code generated</small>
                            <span class="text-danger"><?php echo e($errors->first('code_number')); ?></span>

						</div>
					</div>
					<div class="row">
						<div class="col-sm-4 offset-4">
							<button type="submit" class="btn btn-dark"><b>GENERATE CODE SHEET FOR PRINTING</b></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<script type="text/javascript">

	function standardCode() {
  		var qrChar = document.getElementById("qrChar").value;
  		qrChar = qrChar.toUpperCase();
		document.getElementById("qrChar").value=qrChar;
	}
</script>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/forge/weatherstations.stats4sd.org/resources/views/qr_code.blade.php ENDPATH**/ ?>