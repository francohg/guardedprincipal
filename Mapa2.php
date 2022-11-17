<?php
$id = $_GET["camion"];
?>
<script src="jquery-3.6.0.min.js"></script>
<script>
  let arreglo = [];
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
    });
    alert(rut+"Bienvenido a las rutas ");
    let parametros1 = {
      "ruta": rut
    };
    $.post("consultrut.php", parametros1, function(resultado) {
      var b = resultado.split("/*-");
      alert("longitud:"+b[0]+" latitud:"+b[1]);
    });
    //$.post("consulstat.php", parametros, function (resp) {
      //var a = resp.split("\n");
      //for (var i = 0; i < a.length - 1; i++) {
        //var b = a[i].split("+-+");
        //alert("Longitud:"+b[0]+" Latitud:"+b[1]);
      //}
    //});
      $.post("consulstat.php", parametros, function (resp) {
      var a = resp.split("\n");
      for (var i = 0; i < a.length - 1; i++) {
        var b = a[i].split("+-+");
        const coords3 = { lat: parseFloat(b[0]), lng: parseFloat(b[1]) };
        arreglo.push(coords3);
        console.log(Object.values(arreglo));
      }
    });
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
        center: coords,
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
            travelMode: google.maps.TravelMode.WALKING
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

      function recorrido() {
        if (n < arreglo.length) {
          var objConfigDr = {
            map: map
          }
          var objConfigDs = {
            origin: arreglo[n],
            destination: arreglo[m],
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
          temporizadorDeRetraso();
        }
      }
      let identificadorTiempoDeEspera;

      function temporizadorDeRetraso() {
        identificadorTiempoDeEspera = setInterval(recorrido, 15000);
      }
      temporizadorDeRetraso();
      recorrido();
    }
    window.initMap = initMap;
  </script>

</body>

</html>
