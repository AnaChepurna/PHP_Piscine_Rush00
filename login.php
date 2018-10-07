<?php

	function auth($conn, $login, $passwd)
	{
		$sql = "SELECT * FROM users";
		$result = mysqli_query($conn, $sql);
		var_dump($login);
		var_dump($passwd);
		while ($user = mysqli_fetch_assoc($result))
		{
			var_dump($user);

			if ($user["login"] == $login && $user["password"] == $passwd)
			{
				echo "yes";
				return TRUE;
			}
		}
		return FALSE;
	}

	if ($_POST['login_in'] != '' && $_POST['passwd_in'] != '')
	{
		$dbname = "shop";
		$servername = 'localhost';
		$username = 'root';
		$password = '111111';
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());


		$pw = hash('whirlpool', $_POST['passwd_in']);
		if (auth($conn, $_POST['login_in'], $pw))
		{
			session_start();
			$_SESSION['loggued_on_user'] = $_POST['login_in'];
			header('Location: index.php');
		}
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
		<form action="login.php" method="post" name="login.php">
			Username: <input type="text" name="login_in" value="" placeholder="login_in">
			<br/>
			Password: <input type="password" name="passwd_in" value="" placeholder="passwd_in">
			<br/>
			<input type="submit" name="submit" value="Login">
		</form>
	</div>
</body>
</html>