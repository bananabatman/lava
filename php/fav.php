<?php 
	include_once("dbconf.php");
	include_once("functions.php");

	$q = "SELECT cid FROM company WHERE cname='".$_POST['cname']."';";
	$cid = queryDb($conn, $q)->fetch_object()->cid;
	
	$q = "SELECT count(*) AS bookmark FROM company WHERE cid=".$cid." AND uid=".$_POST['uid']";";
	$result=queryDb($conn, $q)->fetch_object();
	$bookmark = $result->bookmark;
	
	if($bookmark==0) {
		$q = "INSERT INTO bookmarks (uid, cid, cname) VALUES(".$_POST['uid'].", ".$cid.", '".$_POST['cname']."');";
		queryDb($conn, $q);
		echo json_encode(true);
	} else  {
		$q = "DELETE FROM bookmarks WHERE uid=".$_POST['uid']." AND cid=".$cid.";";
		queryDb($conn, $q);
		echo json_encode(false);
	}

?>