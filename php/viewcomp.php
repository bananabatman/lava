<?php
	include_once("dbconf.php");
	include_once("functions.php");


	$q = "SELECT * FROM company;";
	$result = queryDb($conn, $q);
	$companies = array();

	while($row = $result->fetch_object()) {
		$companyName = $row->cname;
		$company['cname'] = utf8_decode($companyName);
		
		array_push($companies, $company);
	}

    echo json_encode($companies);
?>