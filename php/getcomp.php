<?php
	include_once("dbconf.php");
	include_once("functions.php");

	$cname = $_COOKIE["cname"];
	
	$q = "SELECT cname, info FROM company WHERE cname = ".$cname.";";
	$result = queryDb($conn, $q);
	$companies = array();

	$companyName = $row->cname;
	$companyInfo = $row->info;
	
	$company['cname'] = utf8_decode($companyName);
	$company['info'] = utf8_decode($compayInfo);
		
	array_push($companies, $company);
	
    echo json_encode($companies);
?>
