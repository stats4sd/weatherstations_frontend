<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<div class="book">
    @foreach($qrcodes as $qrcode)
        <div class="page justify-content-center p-4">
            {{-- top box --}}
            <div class="card w-75 ml-auto mr-auto mb-4">
                    @include('qr_label')
                    <p class="d-inline-block ml-auto mr-auto pt-2">Copia para el dueño de la parcela</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex p-0">
                        <div class="w-25 pl-3 py-3 font-weight-bold border border-gray border-top-0 border-bottom-0 border-left-0 ">Nombre del productor</div>
                        <div class="w-75 pr-3 py-3"></div>
                    </li>
                    <li class="list-group-item d-flex p-0 ">
                        <div class="w-25 pl-3 py-3 font-weight-bold border border-gray border-top-0 border-bottom-0 border-left-0 ">Región</div>
                        <div class="w-75 pr-3 py-3"></div>
                    </li>
                    <li class="list-group-item d-flex p-0 ">
                        <div class="w-25 pl-3 py-3 font-weight-bold border border-gray border-top-0 border-bottom-0 border-left-0 ">Departamento</div>
                        <div class="w-75 pr-3 py-3"></div>
                    </li>
                    <li class="list-group-item d-flex p-0 ">
                        <div class="w-25 pl-3 py-3 font-weight-bold border border-gray border-top-0 border-bottom-0 border-left-0 ">Municipio</div>
                        <div class="w-75 pr-3 py-3"></div>
                    </li>
                    <li class="list-group-item d-flex p-0 ">
                        <div class="w-25 pl-3 py-3 font-weight-bold border border-gray border-top-0 border-bottom-0 border-left-0 ">Comunidad</div>
                        <div class="w-75 pr-3 py-3"></div>
                    </li>
                    <li class="list-group-item d-flex p-0 ">
                    </li>
                </ul>
            {{-- End top box --}}
            </div>
                @for ($i = 0; $i < 3; $i++)
            <div class="d-flex justify-content-center my-4">
                    @include('qr_label')
                    @include('qr_label')
            </div>
                @endfor
        </div>
    @endforeach
</div>


<style>
    body {
      margin: 0;
      padding: 0;
      background-color: #FAFAFA;
      font: 12pt "Tahoma";
    }

    * {
      box-sizing: border-box;
      -moz-box-sizing: border-box;
    }

    .page {
      width: 21cm;
      min-height: 29.7cm;
      padding: 0cm;
      margin: 0cm auto;
      border: 0px #D3D3D3 solid;
      border-radius: 5px;
      background: white;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage {
      padding: 1cm;
      border: 5px red solid;
      height: 256mm;
      outline: 2cm #FFEAEA solid;
    }

    @page {
      size: A4;
     /* margin-top: 16mm;
      margin-bottom: 16mm;*/
      margin: 0cm;
      width: 23.5cm;
      min-height: 32cm;
    }

    @media print {
        html, body {
          background: white;
          zoom:120%;
        }

      .page {
        margin-top: 8mm !important;
        margin-bottom: 8mm;
        margin-left: 4mm;
        margin-right: 4mm;
        page-break-after: always;
      }
    }
</style>