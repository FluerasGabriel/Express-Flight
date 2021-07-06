<!DOCTYPE html>
<html>
  <head>
    <title>Add Map</title>

    <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
      }
    </style>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        const uluru = [{ lat: -25.344, lng: 131.036},
                       { lat: 44.439663, lng: 26.096306 }];
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 3,
          center: { lat: 0, lng: -180 },

        });
        const flightPath = new google.maps.Polyline({
        path: uluru,
        geodesic: true,
        strokeColor: "purple",
        strokeOpacity: 1.0,
        strokeWeight: 3,
      });
      flightPath.setMap(map);
        // The marker, positioned at Uluru

      }
    </script>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-SGelP-4pGou5UEp2rAeH8jeFEG2kF2w&callback=initMap&libraries=&v=weekly"
      async
    ></script>
  </body>
</html>
