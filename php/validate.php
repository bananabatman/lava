<?php
	include_once("dbconf.php");
	include_once("functions.php");

	$hashbrownie = hash("sha256", 'gnullipop'.$_GET['pword']);
	$q = "SELECT count(*) userMatches, uid FROM users WHERE username='".$_GET['uname']."' AND password='".$hashbrownie."';";
	$result = queryDb($conn, $q);
	$row = $result->fetch_object();
	$return = array();
	$return['userMatches'] = $row->userMatches;
	$return['uid'] = $row->uid;
	echo json_encode($return);
	
?>