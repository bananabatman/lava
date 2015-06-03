<?php 
	include_once("dbconf.php");
	include_once("functions.php");

	$input = $_POST;
	$q = "SELECT cid FROM company WHERE cname='".$_POST['cname']."';";
	$results = queryDb($conn, $q)->fetch_object()->cid;
	$q = "INSERT INTO bookmarks (uid, cid, cname) VALUES(".$_POST['uid'].", ".$results.", '".$_POST['cname']."');";
	queryDb($conn, $q);
    echo json_encode(true);
?>