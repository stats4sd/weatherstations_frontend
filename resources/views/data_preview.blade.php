
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
    integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
    crossorigin=""/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <style type="text/css">
      #mapid { height: 500px;
       }
    </style>
   

   
	<title>Data Preview</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div class="main mb-5">
      <div class="row">
        <div class="col-md-12">
          <div class="intro mt-5 mb-5">
           
            
            </div>
          </div>
        </div>
      </div>
  


    <div class="container">
      <h3 class="section-title font-weight-bold text-center mb-3">Download data</h3>
        <p class="section-intro mx-auto text-center mb-5 text-secondary">Description about the data.</p>
        
     <div id="mapid"></div>
      <div class="row">
        <div class="col-sm-4 mb-5">
          <div class="card">
      
            <div class="container mt-5">
              <h4><b>Modules</b></h4>
              
              <select class="js-example-basic-multiple" name="modules[]" multiple="multiple">
                <option value="meteorologica">Información meteorológica</option>
                <option value="pachagrama">Información de Pachagrama (agroclimático)</option>
                <option value="manajeoParcela">Manejo de la parcela</option>
                <option value="parcela">Información de parcelas</option>
                <option value="suelo">Suelos</option>
                <option value="plagas">Plagas</option>
              </select>
             

              <h4><b>Start date</b></h4>
              <div class="form-group row">
                
                <div>
                  <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                </div>
              </div>
              <h4><b>End date</b></h4>
              <div class="form-group row">
              
                <div>
                  <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                </div>
              </div>
              <h4><b>Location</b></h4>
              <select class="js-example-basic-multiple" name="modules[]" multiple="multiple">
                <option value="comunidad1">Comunidad 1</option>
                <option value="comunidad2">Comunidad 2</option>
                <option value="comunidad3">Comunidad 3</option>
                <option value="comunidad4">Comunidad 4</option>
                <option value="comunidad5">Comunidad 5</option>
                <option value="comunidad6">Comunidad 6</option>
              </select>
              
               
            </div>
          </div>
        </div>

        <div class="col-sm-8 mb-5">

          <div class="card">
            <div class="container mt-5">
              <h4><b>Table</b></h4>
            	<table id="table_id" class="display">
				    <thead>
				        <tr>
				            <th>Column 1</th>
				            <th>Column 2</th>
				        </tr>
				    </thead>
				    <tbody>
				        <tr>
				            <td>Row 1 Data 1</td>
				            <td>Row 1 Data 2</td>
				        </tr>
				        <tr>
				            <td>Row 2 Data 1</td>
				            <td>Row 2 Data 2</td>
				        </tr>
				    </tbody>
				</table>
            </div>
          </div>

		  

		          
		    </div>



        </div>
      </div>
    </div>

 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
    crossorigin=""></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="text/javascript">
  var mymap = L.map('mapid').setView([51.505, -0.09], 13);

 L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(mymap);

L.marker([51.5, -0.09]).addTo(mymap)
    .bindPopup('Station Name')
    .openPopup();

$(document).ready( function () {
	$('#table_id').DataTable();
});

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

axios.get('api/themes')
  .then(function (response) {
    // handle success
    console.log(response);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .then(function () {
    // always executed
  });


</script>

</body>
</html>

