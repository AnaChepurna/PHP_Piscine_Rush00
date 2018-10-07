<?php 
	if (!($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] == 'OK')) {
		header('Location: create_user_page.php?error=1&login='.$_POST['login']);
		exit("ERROR\n");
	}
	$conn = mysqli_connect('localhost', 'root', 'G834w3xd', 'shop');
	if (!$conn) {
		echo 'MySQL connection ERROR!';
		die('Connection error: '.mysqli_connect_error());
	}
	$users = array();
	if ($res = mysqli_query($conn, 'SELECT * FROM users')) {
		while ($temp = mysqli_fetch_assoc($res)) {
			$users[] = $temp;
		}
		mysqli_free_result($res);
	}
	$log = $_POST['login'];
	$passw = hash('whirlpool', $_POST['passwd']);
	$addr = $_POST['address'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	foreach ($users as $val) {
		if ($val['login'] == $log) {
			mysqli_close($conn);
			header('Location: create_user_page.php?error=2&login='.$_POST['login']);
			exit("ERROR\n");
		}
	}
	$sql = "INSERT INTO users (login, password, admin_rights, email, name, phone_number, address)
		VALUES (1, '$log', '$passw', false, '$email', $name, $phone, '$addr')";
	if (!mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		header('Location: create_user_page.php?error=3&login='.$_POST['login']);
		die('Error ADDING USER: ' . mysqli_error($conn));
	}
	mysqli_close($conn);
	header("Location: login_script.php?login=".$login."&passwd=".$password."&submit=OK&get=1");
?>