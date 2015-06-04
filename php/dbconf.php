<?php
	// $hostname = 'localhost';
	// $username = 'eforsbe';
	// $password = 'eforsbe-xmlpub13';
	// $database = 'eforsbe';

	$hostname = "mysql-vt2015.csc.kth.se";
	$username = 'viktorbjadmin';
	$password = 'Ogm7axfJ';
	$database = 'viktorbj';

	$conn = mysqli_connect($hostname, $username, $password, $database);

	if (mysqli_connect_errno()){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	};
?>
