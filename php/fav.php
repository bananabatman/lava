<?php 
	include_once("dbconf.php");
	include_once("functions.php");

	$input = $_POST;
	$q = "SELECT count(*) AS bookmark, cid FROM company WHERE cname='".$_POST['cname']."';";
	$result=queryDb($conn, $q)->fetch_object();
	$bookmark = $result->bookmark;
	$results = $result->cid;
	if($bookmark==0) {
		$q = "INSERT INTO bookmarks (uid, cid, cname) VALUES(".$_POST['uid'].", ".$results['cid'].", '".$_POST['cname']."');";
		queryDb($conn, $q);
		echo json_encode(true);
	} else  {
		$q = "DELETE FROM bookmarks WHERE uid=".$_POST['uid']." AND cid=".$results['cid'].";";
		queryDb($conn, $q);
		echo json_encode(false);
	}

?>