<?php
          
include "database.php";

if ( $_GET['type_data'] == TRUE ) :

	$request = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=".$_GET['lat'].",".$_GET['lng']."&sensor=true");
	$json = json_decode($request, true);

	$query  = "INSERT INTO lokasi(address,lat,lng,type) values('".$json['results'][0]['formatted_address']."','".$_GET['lat']."', '".$_GET['lng']."', '".$_GET['type_data']."' )";
	$result = $connection->query($query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }

endif;

if ( $_GET['id_car'] == TRUE ) :

	$request = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?latlng=".$_GET['lat'].",".$_GET['lng']."&sensor=true");
	$json = json_decode($request, true);

	$query  = "INSERT INTO route_vehicle(id_vehicle,position,lat,lng) values(".$_GET['id_car'].", '".$json['results'][0]['formatted_address']."','".$_GET['lat']."', '".$_GET['lng']."' )";
	$result = $connection->query($query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }

endif;

if ( $_POST['name'] == TRUE ) :

	$query  = "INSERT INTO vehicle(name,color) values('".$_POST['name']."', '".$_POST['color']."')";
	$result = $connection->query($query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
    $str = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   	$url = substr_replace($str, "", -16);
    header("Location:".$url."listvehicle.php");
endif;