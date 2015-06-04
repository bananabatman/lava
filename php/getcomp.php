<?php
	include_once("dbconf.php");
	include_once("functions.php");

	
	$q = "SELECT info FROM company WHERE cname = '".$_GET['cname']."';";
	$result = queryDb($conn, $q);
	//$companies = array();

	// while($row = $result->fetch_object()) {
	// 	$company=utf8_encode($row->info);
	// 	array_push($companies, $company);
	// }

	$info = utf8_encode($result->fetch_object()->info);

    echo json_encode($info);
?>
