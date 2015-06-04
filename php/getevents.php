<?php
	include_once("dbconf.php");
	include_once("functions.php");


	$q = "SELECT location, type, event_date, event_time FROM events WHERE cname='".$_GET['cname']."';";
	$result = queryDb($conn, $q);
	$events = array();

	while($row = $result->fetch_object()) {
		// $location=utf8_encode($row['location']);
		// $type=$row['type'];
		// $date=$row['event_date'];
		// $time=$row['time'];
		// $event="<tr><td>".$date."</td><td>".$time."</td><td>".$type."</td><td>".$location."</td></tr>";
		$location=$row->location;
		$type=$row->type;
		$date=$row->event_date;
		$time=$row->event_time;
		$event="<tr><td>".$date."</td><td>".$time."</td><td>".$type."</td><td>".$location."</td></tr>";
		array_push($events, $event);
	}

    echo json_encode($events);
?>


<!-- location  type  date time -->