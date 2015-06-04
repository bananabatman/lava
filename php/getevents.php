<?php
	include_once("dbconf.php");
	include_once("functions.php");


	$q = "SELECT location, type, event_date, event_time FROM events WHERE cname='".$_GET['cname']."';";
	$result = queryDb($conn, $q);
	$events = array();

	while($row = $result->fetch_object()) {
		$location=$row->location;
		$type=utf8_encode($row->type);
		$date=$row->event_date;
		$time=$row->event_time;
		$event="<li>".$date." ".$time." ".$type." ".$location."</li><br/>";
		array_push($events, $event);

	}

    echo json_encode($events);
?>