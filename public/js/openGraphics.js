function openGraphics(evt, tableName) {
       
    var value = document.getElementById("graphics_id").value
    $.ajaxSetup({ 
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
    }})
    $.ajax({
      url: "/getGraphic", 
      data: {"graphics_id": value},
      type: "post",

          })
    .done(function(value){
      document.getElementById("chartscontent").innerHTML = "hello  ";

      
    });

      
}