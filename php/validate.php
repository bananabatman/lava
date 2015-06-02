<?php
	include_once("dbconf.php");
	include_once("functions.php");

	$hashbrownie = hash("sha256", 'gnullipop'.$_GET['pword']);
	$q = "SELECT count(*) userMatches FROM users WHERE username='".$_GET['uname']."' AND password='".$hashbrownie."';";
	$result = queryDb($conn, $q);
	$userMatches = $result->fetch_object()->userMatches;
	echo json_encode($userMatches);
	
?>