<?php
	include_once("dbconf.php");
	include_once("functions.php");

	$q = "SELECT count(*) userMatches FROM users WHERE username='".$_POST['uname']."'";
	$result = queryDb($conn, $q);
	$userMatches = $result->fetch_object()->userMatches;
	if($userMatches==0) {
		$hashbrownie = hash("sha256", 'gnullipop'.$_POST['pword']);
		$q = "INSERT INTO users (username, password) VALUES('".$_POST['uname']."', '".$hashbrownie."');";
		queryDb($conn, $q);
		echo json_encode(true);
	} else {
		echo json_encode(false);
	}
?>