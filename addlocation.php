<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Route</title>
    <style>
      
      #map {
          height: 50%;
          width: 50%;
          margin-left:auto;
          margin-right:auto;
          margin-top:auto;
          margin-bottom:auto;
          left:0;
          right:0;
          top:0%;
          bottom:0;
      }
      #show {
          width: 50%;
          margin-left:auto;
          margin-right:auto;
          margin-top:20px;
          margin-bottom:20px;
          left:0;
          right:0;
          top:0%;
          bottom:0;
      }
     
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

  <body>

    <div id="show"> 
      
        <a href="index.php">index</a> - 
        <a href="listlocation.php">List Location</a>
        <span style="float: right;">Menu <?php echo $_GET['type'] ?> Location</span>
    </div>
    <div id="map"></div>
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-33.863276, 151.207977),
          zoom: 12
        });

        map.addListener('click', function(e) {
          placeMarkerAndPanTo(e.latLng, map);

        });
      }

      function placeMarkerAndPanTo(latLng, map) {
        var marker = new google.maps.Marker({
          position: latLng,
          map: map
        });
        map.panTo(latLng);

        var url = "savelocation.php?type_data=<?php echo $_GET['type']?>&lat=" + latLng.lat() + "&lng=" + latLng.lng();
        downloadUrl(url, function(data, responseCode) {
        });

      }

      function downloadUrl(url, callback) {
          var request = window.ActiveXObject ?
              new ActiveXObject('Microsoft.XMLHTTP') :
              new XMLHttpRequest;

          request.onreadystatechange = function() {
            if (request.readyState == 4) {
              request.onreadystatechange = doNothing;
              callback(request.responseText, request.status);
            }
          };

          request.open('GET', url, true);
          request.send(null);
        }

        function doNothing() {}


    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzL8vaTCrptLt-kpoh6h0QaFV2VuEPXbE&callback=initMap">
    </script>
  </body>
</html>