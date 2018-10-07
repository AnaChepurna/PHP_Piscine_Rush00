
<?php

	function validate_order($order_name, $login)
	{
		$dbname = "shop";
		$servername = 'localhost';
		$username = 'root';
		$password = '111111';
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());
		$order = substr($order_name, 1);
		$sql = "UPDATE orders SET user_login = '".$login."' WHERE id = ".$order;
		mysqli_query($conn, $sql);
		var_dump($login);
		$sql = "UPDATE orders SET status = 'ordered' WHERE id = ".$order;
		mysqli_query($conn, $sql);
		$_SESSION["order"] = "";
	}

	session_start();
	//var_dump($_SESSION);
	if ($_SESSION['loggued_on_user'])
	{
		validate_order($_SESSION["order"], $_SESSION['loggued_on_user']);
		header('Location: index.php');
	}
	else
		header('Location: create.php');
?>