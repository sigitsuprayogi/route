<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Vehicle</title>
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
        <a href="listvehicle.php">List Vehicle</a>
        <a data-toggle="modal" data-target="#newvehicle" style="float: right; cursor: pointer; margin-left: 20px;">New Vehicle </a>
    </div>

    <div id="map">
      
      <table border="2px;" style="width: 100%;">
        <thead>
          <tr>
            <th>No</th>
            <th>Vehicle</th>
            <th>Coordinate</th>
            <th>Position</th>
            <th>Status</th>
            <th>...</th>
            
          </tr>
        </thead>
        <tbody>
          <?php
          
          include "database.php";
          $no     = 1;
          $query  = "SELECT * FROM vehicle";
          $result = $connection->query($query);
          while ($row = @mysqli_fetch_assoc($result)){
          ?>

          <tr>
            <td valign="top"><?php echo $no++;?></td>
            <td valign="top"><span style="color: <?php echo $row['color']?>;"><?php echo $row['name'];?></span></td>
            <td valign="top">
              <?php
              $query_coordinate = "SELECT * FROM route_vehicle where id_vehicle = ".$row['id']." ";
              $coordinate = $connection->query($query_coordinate);
              while ($data_coordinate = @mysqli_fetch_assoc($coordinate)){
                echo $data_coordinate['lat'].' - '.$data_coordinate['lng'].'<hr>';
              }
              ?>
            </td>
            <td valign="top">
              <?php
              $query_coordinate = "SELECT * FROM route_vehicle where id_vehicle = ".$row['id']." ";
              $coordinate = $connection->query($query_coordinate);
              while ($data_coordinate = @mysqli_fetch_assoc($coordinate)){
                echo $data_coordinate['position'].'<hr>';
              }
              ?>
            </td>
            <td valign="top"></td>
            <td valign="top"><a href="newposition.php?id_car=<?php echo $row['id']?>&name_car=<?php echo $row['name']?>" style="float: right; cursor: pointer; margin-left: 20px;">New Position </a></td>
          </tr>
          
          <?php } ?>

        </tbody>
      </table>

    </div>

    <div class="modal fade" id="newvehicle" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Vehicle</h4>
          </div>
          <div class="modal-body">
            <form method="POST" action="savelocation.php">
                Name Vehicle
                <input type="text" name="name" required="required">
                <select name="color">
                  <option value="#0000FF">Blue</option>
                  <option value="#A52A2A">Brown</option>
                  <option value="#7FFF00">Chartreuse</option>
                  <option value="#FF7F50">Coral</option>
                  <option value="#9932CC">Darkorchid</option>
                  
                </select>
                <input type="submit" value="Save" name="savevehicle">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>

  </body>
</html>