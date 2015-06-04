<?php 
	include_once("dbconf.php");
	include_once("functions.php");

	$input = $_GET;
	$q = "SELECT count(*) AS bookmark FROM bookmarks WHERE cname='".utf8_decode($_GET['cname'])."' AND uid=".$_GET['uid'].";";
	$result=queryDb($conn, $q)->fetch_object();
	$bookmark = $result->bookmark;
	
	if($bookmark==1) {
		echo json_encode(true);
	} else  {
		echo json_encode(false);
	}

?>