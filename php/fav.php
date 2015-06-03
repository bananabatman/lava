<?php 
	include_once("dbconf.php");
	include_once("functions.php");

	$input = $_POST;
	$q = "SELECT count(*) bookmark, cid FROM company WHERE cname='".$_POST['cname']."';";
	$result=queryDb($conn, $q)->fetch_object()
	$bookmark = $result->bookmark;
	$results = $result->cid;
	if($result==0) {
		$q = "INSERT INTO bookmarks (uid, cid, cname) VALUES(".$_POST['uid'].", ".$results.", '".$_POST['cname']."');";
		queryDb($conn, $q);
	} else if ($result==1) {
		$q = "DELETE FROM bookmarks WHERE uid=".$_POST['uid']." AND cid=".$results.";";
		queryDb($conn, $q);
	}

?>