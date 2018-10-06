<?php

	function init_database($servername, $username, $password, $dbname)
	{
	$conn = mysqli_connect($servername, $username, $password);
	if (!$conn)
		die("Connection failed: ".mysqli_connect_error());
	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
	if (!mysqli_query($conn, $sql)) 
		die("Error creating database: ".mysqli_error($conn));
	mysqli_close($conn);
	init_users($servername, $username, $password, $dbname);
	init_products($servername, $username, $password, $dbname);
	init_orders($servername, $username, $password, $dbname);
	}

	function init_users($servername, $username, $password, $dbname)
	{
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: ".mysqli_connect_error());
		$sql = "CREATE TABLE IF NOT EXISTS users (
			id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			login VARCHAR(255) NOT NULL,
			password VARCHAR(255) NOT NULL,
			admin_rights BOOLEAN NOT NULL,
			email VARCHAR(255) DEFAULT NULL,
			name VARCHAR(255) DEFAULT NULL,
			phone_number VARCHAR(255) DEFAULT NULL,
			address VARCHAR(255) DEFAULT NULL
			)";
		if (!mysqli_query($conn, $sql))
			die("Error creating users: " . mysqli_error($conn));
		$admin_pass = hash('whirlpool', 'admin');
		$sql = "INSERT INTO users (id, login, password, admin_rights)
				VALUES (1, 'admin', '".$admin_pass."', true)";
		mysqli_query($conn, $sql);
		mysqli_close($conn);
	}

	// function init_connections($servername, $username, $password, $dbname, $id_product, $category)
	// {
	// 	conn = mysqli_connect($servername, $username, $password, $dbname);
	// 	if (!$conn)
	// 		die("Connection failed: " . mysqli_connect_error());
	// 	$sql = "CREATE TABLE IF NOT EXISTS connections (
	// 		id_product INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	// 		category VARCHAR(255) NOT NULL
	// 		)";
	// 	if (!mysqli_query($conn, $sql))
	// 	 	die("Error create connections: " . mysqli_error($conn));
	// 	$sql = "INSERT INTO connections (id_product, category)
	// 	 		VALUES ('".$id_product."', '".$category."')";
	// 	if (!mysqli_query($conn, $sql))
	// 	 	die("Error filling connections: " . mysqli_error($conn));
	// 	mysqli_close($conn);
	// }

	function init_products($servername, $username, $password, $dbname)
	{
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());
		$sql = "CREATE TABLE IF NOT EXISTS products (
			id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			title VARCHAR(255) NOT NULL,
			price DECIMAL(10,0) UNSIGNED NOT NULL,
			img VARCHAR(255) NOT NULL,
			description text DEFAULT NULL
			)";
		if (!mysqli_query($conn, $sql))
			die("Error creating products: ".mysqli_error($conn));
		$sql = "INSERT INTO products (title, price, img)
		 		VALUES ('Пирожок домашний с мясом', '14', 'pic/salt/1.png'), 
		 		('Пирожок домашний с капустой', '10', 'pic/salt/2.png'),
		 		('Слойка со шпинатом и соусом бешамель', '22', 'pic/salt/3.png'),
		 		('Пирожок домашний с картошкой', '10', 'pic/salt/4.png'),
		 		('Самса с мясом', '18', 'pic/salt/5.png'),
		 		('Пирожок домашний с грибами', '12', 'pic/salt/6.png'),
		 		('Пирожок домашний с луком и яйцом', '10', 'pic/salt/7.png'),
		 		('Булочка Датская с корицей', '10', 'pic/sweet/8.png'),
		 		('Пирожок домашний с яблоками', '10', 'pic/sweet/9.png'),
		 		('Пирожок домашний с вишней', '10', 'pic/sweet/10.png'),
		 		('Плетенка датская с сыром и лимоном', '10', 'pic/sweet/11.png'),
		 		('Завитушка с кремом и изюмом', '10', 'pic/sweet/12.png'),
		 		('Улитка с тоффи и орехом пекан', '10', 'pic/sweet/13.png'),
		 		('Синабон с корицей', '10', 'pic/sweet/14.png'),
		 		('Мини Латтис с вишней', '10', 'pic/sweet/15.png'),
		 		('Завитушка с изюмом', '10', 'pic/sweet/16.png'),
		 		('Даниш с яблоком', '10', 'pic/sweet/17.png'),
		 		('Пирожок домашний с черной смородиной и имбирем', '10', 'pic/sweet/18.png'),
		 		('Сочник с творогом', '10', 'pic/sweet/19.png'),
		 		('Даниш с малиной', '10', 'pic/sweet/20.png'),
		 		('Каталонская', '10', 'pic/bread/21.png'),
		 		('Булочка каталонская', '10', 'pic/bread/22.png'),
		 		('Булочка французская белая', '10', 'pic/bread/23.png'),
		 		('Бретцель', '10', 'pic/bread/24.png'),
		 		('Булочка мультизлаковая', '10', 'pic/bread/25.png'),
		 		('Булочка французская из непросеянной муки', '10', 'pic/bread/26.png'),
		 		('Булочка без муки со злаками', '10', 'pic/bread/27.png'),
		 		('Булочка Био ржаная', '10', 'pic/bread/28.png'),
		 		('Булочка Фушон со злаками', '10', 'pic/bread/29.png')";
		if (!mysqli_query($conn, $sql))
		 	die("Error filling users: " . mysqli_error($conn));
		mysqli_close($conn);
	}

	function init_orders($servername, $username, $password, $dbname)
	{
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());
		$sql = "CREATE TABLE IF NOT EXISTS orders (
			id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			user_login VARCHAR(255) NOT NULL,
			price DECIMAL(10,0) UNSIGNED NOT NULL,
			status VARCHAR(255) NOT NULL,
			order_date DATETIME NOT NULL
			)";
		if (!mysqli_query($conn, $sql))
			die("Error creating orders: ".mysqli_error($conn));
		// $sql = "INSERT INTO products (login, password, admin_rights)
		// 		VALUES ('admin', '".$admin_pass."', true)";
		// if (!mysqli_query($conn, $sql))
		// 	die("Error filling users: " . mysqli_error($conn));
		mysqli_close($conn);
	}

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