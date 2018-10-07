<?php
	include('init_functions.php');

	$dbname = "shop";
	$servername = 'localhost';
	$username = 'root';
	$password = '111111';

	$sql = "DROP DATABASE IF EXISTS $dbname";
	mysqli_query($conn, $sql);
	$_SESSION['order'];
	$_SESSION['loggued_on_user'];

	init_database($servername, $username, $password, $dbname);


	$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
	die("Connection failed: ".mysqli_connect_error());
	// //$arr = array();
	session_start();
	// var_dump($_SESSION);
	
	// $result = mysqli_query($conn, 'SELECT * FROM users');
	// while ($tmp = mysqli_fetch_assoc($result)) {
	// 	var_dump($tmp);
	// 		//$categories[] = $tmp;
	// 	}
	// var_dump($arr);



	// echo "all done\n";
?>