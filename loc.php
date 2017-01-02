<?php

include "database.php";

$dom      = new DOMDocument("1.0");
$node     = $dom->createElement("markers");
$parnode  = $dom->appendChild($node);

$show     = '';

if ( $_GET['show'] == TRUE ) :

  if ( $_GET['show'] == 'stop' or $_GET['show'] == 'break' ) :
    $show = " and type = '".$_GET['show']."' ";
  else:
    $show = '';
  endif;

endif;

$query  = "SELECT * FROM lokasi where id=id ".$show;

$result = $connection->query($query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

while ($row = @mysqli_fetch_assoc($result)){

  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("type", $row['type']);
}

echo $dom->saveXML();

?>