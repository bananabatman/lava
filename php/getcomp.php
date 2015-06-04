<?php
	include_once("dbconf.php");
	include_once("functions.php");

	
	$q = "SELECT info FROM company WHERE cname = '".utf8_decode($_GET['cname'])."';";
	$result = queryDb($conn, $q);
	$info = utf8_encode($result->fetch_object()->info);

    echo json_encode($info);
?>
