<?php

	$hostname = "localhost";
	$username = 'root';
	$password = '';
	$database = 'lava';

	$conn = mysqli_connect($hostname, $username, $password, $database);

	if (mysqli_connect_errno()){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	};
?>
