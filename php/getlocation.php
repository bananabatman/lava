<?php
	include_once("dbconf.php");
	include_once("functions.php");

	
	$q = "SELECT location FROM locations WHERE cname = '".utf8_decode($_GET['cname'])."';";
	$result = queryDb($conn, $q);
	$location = utf8_encode($result->fetch_object()->location);

    echo json_encode($location);
?>
