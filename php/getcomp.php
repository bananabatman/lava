<?php
	include_once("dbconf.php");
	include_once("functions.php");

	$cname = $_COOKIE["cname"];
	
	$q = "SELECT cname, info FROM company WHERE cname = ".$cname.";";
	$result = queryDb($conn, $q);
	$companies = array();

	$companyName = utf8_encode($row->cname);
	$companyInfo = utf8_encode($row->cname);
	
	$company['info'] = utf8_decode($compayInfo);
		
	array_push($companies, $company);
	
    echo json_encode($companies);
?>
