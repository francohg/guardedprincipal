const coords = { lat: 19.728796, lng: -98.467547 };
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
