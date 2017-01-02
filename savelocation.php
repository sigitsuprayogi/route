<?php
          
include "database.php";

if ( $_GET['type_data'] == TRUE ) :

	$address = urlencode($_POST['address']);
	$request = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=".$_GET['lat'].",".$_GET['lng']."&sensor=true");
	$json = json_decode($request, true);

	$query  = "INSERT INTO lokasi(address,lat,lng,type) values('".$json['results'][0]['formatted_address']."','".$_GET['lat']."', '".$_GET['lng']."', '".$_GET['type_data']."' )";
	$result = $connection->query($query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }

endif;
