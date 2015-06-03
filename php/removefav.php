<?php 
	include_once("dbconf.php");
	include_once("functions.php");

	$input = $_POST;
	$q = "SELECT count(*) bookmark, cid FROM company WHERE cname='".$_POST['cname']."';";
	$result=queryDb($conn, $q)->fetch_object()
	$bookmark = $result->bookmark;

	if($result==0) {
		$results = $result->cid;
		$q = "INSERT INTO bookmarks (uid, cid, cname) VALUES(".$_POST['uid'].", ".$results.", '".$_POST['cname']."');";
		queryDb($conn, $q);
	}

?>