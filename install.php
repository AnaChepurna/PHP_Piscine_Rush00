<?php
	$dbname = "shop";
	$servername = 'localhost';
	$username = 'root';
	$password = '111111';

	$conn = mysqli_connect($servername, $username, $password);

	if (!$conn) {
		die("Connection failed: ".mysqli_connect_error());
	}

	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
	if (!mysqli_query($conn, $sql)) {
		die("Error creating database: ".mysqli_error($conn));
	}
	else
		echo "created";

	mysqli_close($conn);


	// $conn = mysqli_connect($servername, $username, $password, $dbname);
	// if (!$conn) {
	// 	die("Connection failed: ".mysqli_connect_error());
	// }

?>