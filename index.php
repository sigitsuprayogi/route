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
      
        <select name="show" onChange="window.location.href='index.php?show='+this.value">
          <option value="all" <?php echo ($_GET['show']=='all')? 'selected=selected' : ''; ?>>Show All</option>
          <option value="stop" <?php echo ($_GET['show']=='stop')? 'selected=selected' : ''; ?>>Show Stop</option>
          <option value="break" <?php echo ($_GET['show']=='break')? 'selected=selected' : ''; ?>>Show Break</option>
        </select>
        
        <a href="listlocation.php">List Location</a>

    </div>
    <div id="map"></div>

    <script>
      var customLabel = {
        stop: {
          label: 'Stop'
        },
        break: {
          label: 'Break'
        }
      };

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-33.863276, 151.207977),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          <?php ($_GET['show'] )? $show = 'show='.$_GET['show'] : $show = ''; ?>
          downloadUrl('loc.php?<?php echo $show;?>', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
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