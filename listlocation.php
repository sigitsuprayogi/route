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
        <a href="addlocation.php?type=stop" style="float: right; cursor: pointer; margin-left: 20px;">New Stop Location </a>
        <a href="addlocation.php?type=break" style="float: right; cursor: pointer;">New Break Location </a>
    </div>

    <div id="map">
      
      <table border="2px;">
        <thead>
          <tr>
      
            <th>Address</th>
            <th>Coordinate</th>
            <th>Type</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
          
          include "database.php";

          $query  = "SELECT * FROM lokasi";

          $result = $connection->query($query);
          if (!$result) {
            die('Invalid query: ' . mysqli_error());
          }

          while ($row = @mysqli_fetch_assoc($result)){
          ?>

          <tr>
            
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['lat'];?> , <?php echo $row['lng'];?></td>
            <td><?php echo $row['type'];?></td>
            
          </tr>
          
          <?php } ?>

        </tbody>
      </table>

    </div>

  </body>
</html>