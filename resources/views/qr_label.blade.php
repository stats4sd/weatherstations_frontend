<div class="card d-flex justify-content-center ml-auto mr-auto" style="width:70mm;  height:40mm;">

        {!! QrCode::size(250)->generate($qrcode->code) !!}

    <div class="card-footer justify-content-center">
        <div class="font-weight-bold " style="text-align: center;">{{ $qrcode->code }}</div>
    </div>
</div>