

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
  
	<title>Data Preview</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
 

    <div class="container">
      <h3 class="section-title font-weight-bold text-center mb-3">Download data</h3>
        <p class="section-intro mx-auto text-center mb-5 text-secondary">Description about the data.</p>
        
     
     <div id="app">

      <data-preview></data-preview>
       
     </div>
    </div>
     


 
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
 <!--====== Javascripts & Jquery ======-->
    <script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
  





</script>

</body>
</html>

