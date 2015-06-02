<?php
	include_once("dbconf.php");
	include_once("functions.php");


	$q = "SELECT * FROM company;";
	$result = queryDb($conn, $q);
	$companies = array();

	while($row = $result->fetch_object()) {
		array_push($companies, $row);
	}

    echo json_encode($companies);
?>