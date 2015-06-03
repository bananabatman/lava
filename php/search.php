<?php
	include_once("dbconf.php");
	include_once("functions.php");

	$input = $_POST;
	$q = "SELECT cname FROM company WHERE cname LIKE '%".utf8_decode($input['cname'])."%';";
	$result = queryDb($conn, $q);
	$companies = array();

	while($row = $result->fetch_object()) {
		$company=utf8_encode($row->cname);
		array_push($companies, $company);
	}

    echo json_encode($companies);
?>