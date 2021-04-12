<div class="card d-flex justify-content-center ml-auto mr-auto" style="width:70mm;  height:40mm;">

        <?php echo QrCode::size(250)->generate($qrcode->code); ?>


    <div class="card-footer justify-content-center">
        <div class="font-weight-bold " style="text-align: center;"><?php echo e($qrcode->code); ?></div>
    </div>
</div><?php /**PATH /home/forge/weatherstations.stats4sd.org/resources/views/qr_label.blade.php ENDPATH**/ ?>