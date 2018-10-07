<?php

	function auth($conn, $login, $passwd)
	{
		$sql = "SELECT * FROM products WHERE id = ".$id_product;
		$result = mysqli_query($conn, $sql);
		while ($user = mysqli_fetch_assoc($result))
		{
			if ($user["login"] == $login && $user["password"] == $passwd)
			{
				echo "true";
				return TRUE;
			}
		}
		echo "false";
		return FALSE;
	}

	if ($_POST['login'] != '' && $_POST['passwd'] != '' && $_POST['submit'] == "Login")
	{
		$dbname = "shop";
		$servername = 'localhost';
		$username = 'root';
		$password = '111111';
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());


		$pw = hash('whirlpool', $_POST['passwd']);
		if (auth($conn, $_POST['login'], $pw))
		{
			session_start();
			$_SESSION['loggued_on_user'] = $_POST['login'];
			//header('Location: index.php');
		}
		else
			echo "pisos";
	}
?>

<html>
<head>
	<style type="text/css">
		#form {
			display: flex;
			background-color: pink;
			width: 200px;
			height: 100px;
			padding: 10px;
			text-align: center;
			position: absolute;
			left: 50%;
			transform: translate(-50%);
		}
	</style>
</head>
<body>
	<div id="form"s>
		<form action="create.php" method="post" name="create.php">
			Username: <input type="text" name="login" value="" placeholder="login">
			<br/>
			Password: <input type="password" name="passwd" value="" placeholder="passwd">
			<br/>
			<input type="submit" name="submit" value="Login">
		</form>
	</div>
</body>
</html>