<?php
$connection=mysqli_connect("localhost", "root", "toor", "route");
if (!$connection) {  die('Not connected : ' . mysqli_error());}