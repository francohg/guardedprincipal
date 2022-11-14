<?php 
$lat = $_GET["lat"];
$lon = $_GET["lon"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa</title>
    <link rel="shortcut icon" href="logo.png" />
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
        #map {
          height: 100%;
        }
        html, body {
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
        var lat,lon;
        lat=<?php echo $lat; ?>;
        lon=<?php echo $lon; ?>;  
        const coords = { lat: lat, lng: lon };
        const mapDiv = document.getElementById("map");
        let map;
        let marker;

        function initMap(){
            map = new google.maps.Map(mapDiv, {
            center: coords,
            zoom: 8,
            });

            marker = new google.maps.Marker({
                position: coords,
                map: map,
            })
        }

        window.initMap = initMap;
        
    </script>
</body>
</html>
