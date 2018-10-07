<?php
	include('init_functions.php');

	$dbname = "shop";
	$servername = 'localhost';
	$username = 'root';
	$password = '111111';

	$sql = "DROP DATABASE IF EXISTS $dbname";
	mysqli_query($conn, $sql);

	init_database($servername, $username, $password, $dbname);
	$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
	die("Connection failed: ".mysqli_connect_error());
	//$arr = array();


	$result = mysqli_query($conn, 'SELECT * FROM users');
	while ($tmp = mysqli_fetch_assoc($result)) {
		var_dump($tmp);
			//$categories[] = $tmp;
		}
	var_dump($arr);



	echo "all done\n";
?>