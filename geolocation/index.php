<!DOCTYPE html>
<html>
<head>
  <title>Geolocation</title>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <style>
      /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
      #map {
        height: 50%;
        width: 50%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>

  </head>
  <body>
    <div id="map"></div>
    <br />
    <div id="output"></div>

    <script>

      var map, infoWindow;

      function initMap() {


        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            var x = document.getElementById('output');
            x.innerHTML = "Latitude = " + pos.lat;
            x.innerHTML += ' ';
            x.innerHTML += "Longitude = " + pos.lng;

            map = new google.maps.Map(document.getElementById('map'), {
              center: {lat: pos.lat, lng: pos.lng},
              zoom: 15
            });
            infoWindow = new google.maps.InfoWindow;

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
          'Error: The Geolocation service failed.' :
          'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

    </script>
    <script  async defer

    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzuWxPpYQKlxYePsfgfAhWRhFKeyAGGCQ&callback=initMap">

  </script>
  <script type="text/javascript">
    setInterval(initMap, 20000);
  </script>




</body>
</html>