<?php
	include_once("dbconf.php");
	include_once("functions.php");


	$q = "SELECT cname FROM bookmarks WHERE uid=".$_GET['uid'].";";
	$result = queryDb($conn, $q);
	$companies = array();

	while($row = $result->fetch_object()) {
		$company=utf8_encode($row->cname);
		array_push($companies, $company);
	}

    echo json_encode($companies);
?>