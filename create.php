<?php

	// function auth($login, $passwd)
	// {

	// 	$file = file_get_contents("../private/passwd");
	// 	if ($file === FALSE) {
	// 		return FALSE;
	// 	}
	// 	$file = unserialize($file);
	// 	foreach ($file as $val) {
	// 		if ($val['login'] == $login && $val['passwd'] == hash('whirlpool', $passwd)) {
	// 			return TRUE;
	// 		}
	// 	}
	// 	return FALSE;
	// }
	if ($_POST['login'] != '' && $_POST['passwd'] != '')
	{
		$dbname = "shop";
		$servername = 'localhost';
		$username = 'root';
		$password = '111111';
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());


		$pw = hash('whirlpool', $_POST['passwd']);
		$sql = "INSERT INTO users (login, password, admin_rights)
				VALUES ('".$_POST['login']."', '".$pw."', false)";
		mysqli_query($conn, $sql);
		session_start();
		$_SESSION['loggued_on_user'] = $_POST['login'];
		header('Location: index.php');
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
			<input type="submit" name="submit" value="Create!">
		</form>
	</div>
</body>
</html>