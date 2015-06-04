<?php 
	include_once("dbconf.php");
	include_once("functions.php");

	$q = "SELECT cid FROM company WHERE cname='".$_POST['cname']."';";
	$cid = queryDb($conn, $q)->fetch_object()->cid;
	
	$q = "SELECT count(*) AS bookmark FROM bookmarks WHERE cname='".$_POST['cname']."' AND uid=".$_POST['uid'].";";
	$result=queryDb($conn, $q)->fetch_object();
	$bookmark = $result->bookmark;
	
	if($bookmark==0) {
		$uid = $_POST['uid'];
		$cname = $_POST['cname'];
		$q = "INSERT INTO bookmarks (uid, cid, cname) VALUES(".$uid.", ".$cid.", '".$cname."');";
		queryDb($conn, $q);
		echo json_encode(true);
	} else  {
		$q = "DELETE FROM bookmarks WHERE uid=".$_POST['uid']." AND cid=".$cid.";";
		queryDb($conn, $q);
		echo json_encode(false);
	}

?>
