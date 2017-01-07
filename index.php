<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
        
        <a href="listlocation.php">List Location</a> - 
        <a href="listvehicle.php">List Vehicle</a>

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
          center: new google.maps.LatLng(-7.275920,112.791871),
          zoom: 12,

          mapTypeId: 'terrain'

        });
        var infoWindow = new google.maps.InfoWindow;

        <?php
          include "database.php";
          $query  = "SELECT * FROM vehicle";
          $result = $connection->query($query);
          while ($row = @mysqli_fetch_assoc($result)){
        ?>

        var flightPlanCoordinates<?php echo $row['id']?> = [
          <?php
          $query_coordinate = "SELECT * FROM route_vehicle where id_vehicle = ".$row['id']." ";
          $coordinate = $connection->query($query_coordinate);
          while ($data_coordinate = @mysqli_fetch_assoc($coordinate)){
          ?>
            {lat: <?php echo $data_coordinate['lat'];?>, lng: <?php echo $data_coordinate['lng'];?>},
          <?php } ?>
        ];
        var flightPath<?php echo $row['id']?> = new google.maps.Polyline({
          path: flightPlanCoordinates<?php echo $row['id']?>,
          geodesic: true,
          strokeColor: "<?php echo $row['color']?>",
          strokeOpacity: 1.0,
          strokeWeight: 2,
          geodesic: true,
      
          icons: [{
            icon: {
              path: 'M 236.54427,9.8485 C 220.2445,9.8485 204.45277,15.405415 191.41289,25.550223 L 97.337229,97.995127 L -135.0706,131.12201 C -150.90459,133.65817 -161.13586,149.44963 -156.32358,165.14237 L -132.57022,244.60846 L -86.188678,244.60846 C -90.823109,289.62242 -60.00389,319.2235 -20.679452,319.2235 C 18.644986,319.2235 49.844083,285.73585 44.829779,244.60846 L 425.19586,244.60846 C 419.65783,289.49008 452.23789,319.2235 490.70508,319.2235 C 529.17227,319.2235 561.22444,285.70267 556.21433,244.60846 L 651.04018,244.60846 C 659.88863,244.60846 667.48002,236.98237 667.48,227.63005 L 667.48,137.76012 C 667.48,129.20037 661.30023,122.08284 653.22799,120.97335 L 491.76774,97.995127 L 427.82125,32.635149 C 413.84999,18.051989 394.74442,10.165524 374.56372,9.8485 L 236.54427,9.8485 z M 304.42883,37.42226 L 378.62679,37.42226 C 389.64854,37.42226 399.73373,43.261111 405.94316,52.613356 L 424.25825,80.825395 C 428.78955,88.722668 423.85522,96.409133 415.38198,97.803717 L 304.42883,97.803717 L 304.42883,37.42226 z M 224.60508,37.549916 L 283.42586,37.549916 L 283.42586,97.803717 L 132.59212,97.803717 L 200.10167,45.97523 C 207.08728,40.585799 215.91189,37.549914 224.60508,37.549916 z',
              scale: .05,
              fillColor: "<?php echo $row['color']?>",
              fillOpacity: 1,
              rotation: 90,
              anchor: new google.maps.Point(0, 200)
            },

            offset: '100%'
          }]

        });

        <?php } ?>



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
        <?php 
        $query  = "SELECT * FROM vehicle";
        $result = $connection->query($query);
        while ($row = @mysqli_fetch_assoc($result)){ ?> flightPath<?php echo $row['id'];?>.setMap(map); <?php } ?>
       
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
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzL8vaTCrptLt-kpoh6h0QaFV2VuEPXbE&callback=initMap&libraries=geometry">
    </script>
  </body>
</html>