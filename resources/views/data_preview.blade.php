
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
              <label class="checkbox-inline"><input type="checkbox" value="">Información meteorológica</label>
              <label class="checkbox-inline"><input type="checkbox" value="">Información de Pachagrama (agroclimático)</label>
              <label class="checkbox-inline"><input type="checkbox" value="">Manejo de la parcela</label>
              <label class="checkbox-inline"><input type="checkbox" value="">Información de parcelas</label><br>
              <label class="checkbox-inline"><input type="checkbox" value="">Suelos</label><br>
              <label class="checkbox-inline"><input type="checkbox" value="">Plagas</label>

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
              <select class="form-control">
                <option>Comunidad1</option>
                <option>Comunidad2</option>
              </select>
              <h4><b>Coordinate</b></h4>
              <h4><b>Radius</b></h4>
               
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

		    <div class="container">
		      <h3 class="section-title font-weight-bold text-center mb-3"></h3>
		        <div class="row">
		          <div class="col-sm-6 mb-5">
		            <div class="container_description">
		              <div class="card">
              
                        <h4><b>Temperatura Externa</b></h4>
                        <canvas id="tempOut"></canvas>
                        <a id="download"
      					        download="ChartImage.jpg" 
      					        class="btn btn-primary float-right bg-flat-color-1"
      					        title="Descargar Gráfico">

					    <!-- Download Icon -->
						<i class="fa fa-download"></i>
						</a>
						
		              </div>
		            </div>
		          </div>

		          <div class="col-sm-6 mb-5">
		            <div class="container_description">
		              <div class="card">
		                <h4><b>Temperatura Interna</b></h4>
                        <canvas id="tempInt"></canvas>
                        <a id="download"
                  download="ChartImage.jpg" 
                  class="btn btn-primary float-right bg-flat-color-1"
                  title="Descargar Gráfico">

              <!-- Download Icon -->
            <i class="fa fa-download"></i>
            </a>
            
		              </div>
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


var ctx  = document.getElementById('tempOut').getContext('2d');
    var tempOut = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: 'Max Temp Out',
                data: [1,3,4,5,6],
                borderColor: 'rgb(255, 99, 132)',
            }, {
                label: 'Min Temp Out',
                data: [1,6,1,4,10],
                borderColor: 'rgb(54, 162, 235)',

                // Changes this dataset to become a line
                type: 'line'
            }],
            // labels: fecha
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });


var ctx  = document.getElementById('tempInt').getContext('2d');
    var tempOut = new Chart(ctx, {
        type: 'line',
        data: {
            datasets: [{
                label: 'Max Temp Out',
                data: [5,3,4,2,0],
                borderColor: 'rgb(255, 99, 132)',
            }, {
                label: 'Min Temp Out',
                data: [10,6,1,4,0],
                borderColor: 'rgb(54, 162, 235)',

                // Changes this dataset to become a line
                type: 'line'
            }],
            // labels: fecha
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

   
    //Download Chart Image
document.getElementById("download").addEventListener('click', function(){

  /*Get image of canvas element*/
  var url_base64jp = document.getElementById("tempOut").toDataURL("image/jpg");
  /*get download button (tag: <a></a>) */
  var a =  document.getElementById("download");
  /*insert chart image url to download button (tag: <a></a>) */
  a.href = url_base64jp;
});  

</script>

</body>
</html>

