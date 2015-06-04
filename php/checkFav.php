<?php 
	include_once("dbconf.php");
	include_once("functions.php");

	$input = $_POST;
	$q = "SELECT count(*) AS bookmark, cid FROM company WHERE cname='".$_POST['cname']."';";
	$result=queryDb($conn, $q)->fetch_object();
	$bookmark = $result->bookmark;
	
	if($bookmark==1) {
		echo json_encode(true);
	} else  {
		echo json_encode(false);
	}

?>