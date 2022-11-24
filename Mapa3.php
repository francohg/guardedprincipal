<?php
$id = $_GET["ruta"];
?>
<script src="jquery-3.6.0.min.js"></script>
<script>
  var arreglo = [];
  var arreglo2=[];
  $(document).ready(function() {
    var rut="";
    var id = <?php echo $id; ?>;
    let parametros = {
      "id": id
    };
    $.post("consultacam.php", parametros, function(resultado) {
      rut = resultado;
      if (rut == "1" ){
        console.log(rut);
        const coords = { lat: 19.770797, lng: -98.571165 };
        const coords2 = { lat: 19.770665, lng: -98.571581 };
        const coords4 = { lat: 19.772133, lng: -98.573206 };
        const coords5 = { lat: 19.770508, lng: -98.572727 };
        const coords6 = { lat: 19.770081, lng: -98.573652 };
        const coords7 = { lat: 19.771638, lng: -98.574328 };
        const coords8 = { lat: 19.771758, lng: -98.574642 };
        const coords10 = { lat: 19.770157, lng: -98.574931 };
        const coords11 = { lat: 19.769459, lng: -98.575746 };
        const coords12 = { lat: 19.771037, lng: -98.576507 };
        const coords15 = { lat: 19.770476, lng: -98.579261 };
        arreglo2.push(coords);
        arreglo2.push(coords2);
        arreglo2.push(coords4);
        arreglo2.push(coords5);
        arreglo2.push(coords6);
        arreglo2.push(coords7);
        arreglo2.push(coords8);
        arreglo2.push(coords10);
        arreglo2.push(coords11);
        arreglo2.push(coords12);
        arreglo2.push(coords15);
        console.log(arreglo2); 
      }
      else if(rut == "2"){
        console.log(rut);
        const coords = { lat: 19.77039, lng: -98.57955 };
        const coords2 = { lat: 19.77057, lng: -98.57883 };
        const coords4 = { lat: 19.76958, lng: -98.57853 };
        const coords5 = { lat: 19.76723, lng: -98.57776 };
        const coords6 = { lat: 19.76668, lng: -98.57572 };
        const coords7 = { lat: 19.76776, lng: -98.57316 };
        const coords8 = { lat: 19.76875, lng: -98.57068 };
        const coords10 = { lat: 19.76944, lng: -98.56849 };
        const coords11 = { lat: 19.77299, lng: -98.57015 };
        const coords12 = { lat: 19.77177, lng: -98.57453 };
        const coords15 = { lat: 19.77075, lng: -98.57828 };
        arreglo2.push(coords);
        arreglo2.push(coords2);
        arreglo2.push(coords4);
        arreglo2.push(coords5);
        arreglo2.push(coords6);
        arreglo2.push(coords7);
        arreglo2.push(coords8);
        arreglo2.push(coords10);
        arreglo2.push(coords11);
        arreglo2.push(coords12);
        arreglo2.push(coords15);
        console.log(arreglo2); 
      }else if(rut == "3"){
        console.log(rut);
        const coords = { lat: 19.770797, lng: -98.57954 };
        const coords2 = { lat: 19.770665, lng: -98.57882 };
        const coords4 = { lat: 19.772133, lng: -98.57895 };
        const coords5 = { lat: 19.770508, lng: -98.57773 };
        const coords6 = { lat: 19.770081, lng: -98.57843 };
        const coords7 = { lat: 19.771638, lng: -98.57783 };
        const coords8 = { lat: 19.771758, lng: -98.57654 };
        const coords10 = { lat: 19.770157, lng: -98.57415 };
        const coords11 = { lat: 19.769459, lng: -98.57478 };
        const coords12 = { lat: 19.771037, lng: -98.57244 };
        const coords15 = { lat: 19.770476, lng: -98.57178 };
        arreglo2.push(coords);
        arreglo2.push(coords2);
        arreglo2.push(coords4);
        arreglo2.push(coords5);
        arreglo2.push(coords6);
        arreglo2.push(coords7);
        arreglo2.push(coords8);
        arreglo2.push(coords10);
        arreglo2.push(coords11);
        arreglo2.push(coords12);
        arreglo2.push(coords15);
        console.log(arreglo2); 
      }
    });
    alert(" Bienvenido a las rutas");
    let parametros1 = {
      "ruta": rut
    };
    //$.post("consultrut.php", parametros1, function(resultado) {
      //var b = resultado.split("/*-");
      //alert("longitud:"+b[0]+" latitud:"+b[1]);
      //console.log(b[0]);
    //})
  });
</script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <style>
    #map {
      height: 100%;
    }

    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
</head>

<body>
  <div id="map"></div>
  <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5oP8S4r-3tx5tyKndm9ypKbfSrofvGfo&callback=initMap"></script>
  <script>
    const mapDiv = document.getElementById("map");
    let map;
    let marker;
    

    function initMap() {

      map = new google.maps.Map(mapDiv, {
        center: arreglo2[0],
        zoom: 14,
      });
      let n = 0;
      let m = 1;
      function trazo(){
        if (n < arreglo2.length) {
          var objConfigDr = {
            map: map,
            polylineOptions: { strokeColor: "#000000" }
          }
          var objConfigDs = {
            origin: arreglo2[n],
            destination: arreglo2[m],
            travelMode: google.maps.TravelMode.DRIVING
          }
          var ds = new google.maps.DirectionsService();
          var dr = new google.maps.DirectionsRenderer(objConfigDr);

          ds.route(objConfigDs, fnRutear);

          function fnRutear(resultados, status) {
            if (status == 'OK') {
              dr.setDirections(resultados);
            } else {
              alert('Error' + status);
            }
          }
          n = n + 1;
          m = m + 1;
          trazo();
        }
      }
      trazo();
    }
    window.initMap = initMap;
  </script>

</body>
</html>