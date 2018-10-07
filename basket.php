<?php
	$dbname = "shop";
	$servername = 'localhost';
	$username = 'root';
	$password = '111111';
	session_start();
	include('init_functions.php');
	if ($_GET['add_item'] != "") 
	{
		if ($_SESSION["order"] == "")
			$_SESSION["order"] = init_order($servername, $username, $password, $dbname, session_id());
		add_product($servername, $username, $password, $dbname, $_SESSION["order"], $_GET['add_item']);
	}
?>