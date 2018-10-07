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
			die("Error creating users: ".mysqli_error($conn));
		$admin_pass = hash('whirlpool', 'admin');
		$sql = "INSERT INTO users (id, login, password, admin_rights)
				VALUES (1, 'admin', '".$admin_pass."', true)";
		mysqli_query($conn, $sql);
		mysqli_close($conn);
	}

	function init_products($servername, $username, $password, $dbname)
	{
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: ".mysqli_connect_error());
		$sql = "CREATE TABLE IF NOT EXISTS products (
			id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			title VARCHAR(255) NOT NULL,
			price DECIMAL(10,0) UNSIGNED NOT NULL,
			img VARCHAR(255) NOT NULL,
			description text DEFAULT NULL
			)";
		if (!mysqli_query($conn, $sql))
			die("Error creating products: ".mysqli_error($conn));
		$sql = "INSERT INTO products (id, title, price, img)
		 		VALUES (1, 'Пирожок домашний с мясом', '14', 'pic/salt/1.png'), 
		 		(2, 'Пирожок домашний с капустой', '10', 'pic/salt/2.png'),
		 		(3, 'Слойка со шпинатом и соусом бешамель', '22', 'pic/salt/3.png'),
		 		(4, 'Пирожок домашний с картошкой', '10', 'pic/salt/4.png'),
		 		(5, 'Самса с мясом', '18', 'pic/salt/5.png'),
		 		(6, 'Пирожок домашний с грибами', '12', 'pic/salt/6.png'),
		 		(7, 'Пирожок домашний с луком и яйцом', '10', 'pic/salt/7.png'),
		 		(8, 'Булочка Датская с корицей', '12', 'pic/sweet/8.png'),
		 		(9, 'Пирожок домашний с яблоками', '10', 'pic/sweet/9.png'),
		 		(10, 'Пирожок домашний с вишней', '10', 'pic/sweet/10.png'),
		 		(11, 'Плетенка датская с сыром и лимоном', '22', 'pic/sweet/11.png'),
		 		(12, 'Завитушка с кремом и изюмом', '20', 'pic/sweet/12.png'),
		 		(13, 'Улитка с тоффи и орехом пекан', '21', 'pic/sweet/13.png'),
		 		(14, 'Синабон с корицей', '17', 'pic/sweet/14.png'),
		 		(15, 'Мини Латтис с вишней', '9', 'pic/sweet/15.png'),
		 		(16, 'Завитушка с изюмом', '9', 'pic/sweet/16.png'),
		 		(17, 'Даниш с яблоком', '14', 'pic/sweet/17.png'),
		 		(18, 'Пирожок домашний с черной смородиной и имбирем', '12', 'pic/sweet/18.png'),
		 		(19, 'Сочник с творогом', '13', 'pic/sweet/19.png'),
		 		(20, 'Даниш с малиной', '16', 'pic/sweet/20.png'),
		 		(21, 'Каталонская выпечка', '10', 'pic/bread/21.png'),
		 		(22, 'Булочка каталонская', '15', 'pic/bread/22.png'),
		 		(23, 'Булочка французская белая', '13', 'pic/bread/23.png'),
		 		(24, 'Бретцель', '19', 'pic/bread/24.png'),
		 		(25, 'Булочка мультизлаковая', '16', 'pic/bread/25.png'),
		 		(26, 'Булочка французская из непросеянной муки', '20', 'pic/bread/26.png'),
		 		(27, 'Булочка без муки со злаками', '22', 'pic/bread/27.png'),
		 		(28, 'Булочка ржаная', '17', 'pic/bread/28.png'),
		 		(29 ,'Булочка со злаками', '21', 'pic/bread/29.png')";
		mysqli_query($conn, $sql);
		init_connections($servername, $username, $password, $dbname);
		mysqli_close($conn);
	}

	function init_connections($servername, $username, $password, $dbname)
	{
		init_connection($servername, $username, $password, $dbname, 1, 'salt');
		init_connection($servername, $username, $password, $dbname, 2, 'salt');
		init_connection($servername, $username, $password, $dbname, 3, 'salt');
		init_connection($servername, $username, $password, $dbname, 4, 'salt');
		init_connection($servername, $username, $password, $dbname, 5, 'salt');
		init_connection($servername, $username, $password, $dbname, 6, 'salt');
		init_connection($servername, $username, $password, $dbname, 7, 'salt');
		init_connection($servername, $username, $password, $dbname, 8, 'sweet');
		init_connection($servername, $username, $password, $dbname, 9, 'sweet');
		init_connection($servername, $username, $password, $dbname, 10, 'sweet');
		init_connection($servername, $username, $password, $dbname, 11, 'sweet');
		init_connection($servername, $username, $password, $dbname, 12, 'sweet');
		init_connection($servername, $username, $password, $dbname, 13, 'sweet');
		init_connection($servername, $username, $password, $dbname, 14, 'sweet');
		init_connection($servername, $username, $password, $dbname, 15, 'sweet');
		init_connection($servername, $username, $password, $dbname, 16, 'sweet');
		init_connection($servername, $username, $password, $dbname, 17, 'sweet');
		init_connection($servername, $username, $password, $dbname, 18, 'sweet');
		init_connection($servername, $username, $password, $dbname, 19, 'sweet');
		init_connection($servername, $username, $password, $dbname, 20, 'sweet');
		init_connection($servername, $username, $password, $dbname, 21, 'bread');
		init_connection($servername, $username, $password, $dbname, 22, 'bread');
		init_connection($servername, $username, $password, $dbname, 23, 'bread');
		init_connection($servername, $username, $password, $dbname, 24, 'bread');
		init_connection($servername, $username, $password, $dbname, 25, 'bread');
		init_connection($servername, $username, $password, $dbname, 26, 'bread');
		init_connection($servername, $username, $password, $dbname, 27, 'bread');
		init_connection($servername, $username, $password, $dbname, 28, 'bread');
		init_connection($servername, $username, $password, $dbname, 29, 'bread');
		init_connection($servername, $username, $password, $dbname, 1, 'meat');
		init_connection($servername, $username, $password, $dbname, 2, 'vegetables');
		init_connection($servername, $username, $password, $dbname, 3, 'vegetables');
		init_connection($servername, $username, $password, $dbname, 4, 'vegetables');
		init_connection($servername, $username, $password, $dbname, 5, 'meat');
		init_connection($servername, $username, $password, $dbname, 9, 'fruts');
		init_connection($servername, $username, $password, $dbname, 10, 'fruts');
		init_connection($servername, $username, $password, $dbname, 15, 'fruts');
		init_connection($servername, $username, $password, $dbname, 17, 'fruts');
		init_connection($servername, $username, $password, $dbname, 18, 'fruts');
		init_connection($servername, $username, $password, $dbname, 20, 'fruts');
	}

	function init_connection($servername, $username, $password, $dbname, $id_product, $category)
	{
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());
		$sql = "CREATE TABLE IF NOT EXISTS connections (
			id INT(11) AUTO_INCREMENT PRIMARY KEY,
			id_product INT(11) NOT NULL,
			category VARCHAR(255) NOT NULL
			)";
		if (!mysqli_query($conn, $sql))
		 	die("Error create connections: ".mysqli_error($conn));
		$sql = "INSERT INTO connections (id_product, category)
		 		VALUES ('".$id_product."', '".$category."')";
		if (!mysqli_query($conn, $sql))
		 	die("Error filling connections: ".mysqli_error($conn));
		mysqli_close($conn);
	}


	function init_orders($servername, $username, $password, $dbname)
	{
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());
		$sql = "CREATE TABLE IF NOT EXISTS orders (
			id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			session_id VARCHAR(255) NOT NULL,
			user_login VARCHAR(255) DEFAULT NULL,
			price DECIMAL(10,0) UNSIGNED DEFAULT NULL,
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

	function init_order($servername, $username, $password, $dbname, $session_id)
	{
		$res = get_order_number($servername, $username, $password, $dbname, $session_id);
		if ($res)
			return ($res);
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());
		$sql = "INSERT INTO orders (session_id, status, order_date)
				VALUES ('".$session_id."', 'open', '".date("Y-m-d H:i:s")."')";
		if (!mysqli_query($conn, $sql))
			die("Error creating orders: ".mysqli_error($conn));
		$sql = "SELECT id FROM orders WHERE session_id = '".$session_id."' && status = 'open'";
		$result = mysqli_query($conn, $sql);
		$order_name = "";
		while ($tmp = mysqli_fetch_assoc($result)) {
			$order_name = $tmp["id"];
		}
		$order_name = "o".$order_name;
		$sql = "CREATE TABLE IF NOT EXISTS ".$order_name." (
			id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			product_id INT(11) NOT NULL,
			product_title VARCHAR(255) NOT NULL,
			product_img VARCHAR(255) NOT NULL,
			num INT(11) DEFAULT NULL,
			price DECIMAL(10,0) UNSIGNED DEFAULT NULL
			)";
		if (!mysqli_query($conn, $sql))
			die("Error creating order ".$order_name.": ".mysqli_error($conn));
		mysqli_close($conn);
		return ($order_name);
	}

	function  get_order_number($servername, $username, $password, $dbname, $session_id)
	{
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());
		$sql = "SELECT id FROM orders WHERE session_id = '".$session_id."' && status = 'open'";
		$result = mysqli_query($conn, $sql);
		$order_name = "";
		while ($tmp = mysqli_fetch_assoc($result)) {
			$order_name = $tmp["id"];
		}
		$order_name = "o".$order_name;
		if ($order_name == "o")
			return (FALSE);
		return ($order_name);
		mysqli_close($conn);
	}

	function  add_product($servername, $username, $password, $dbname, $order_name, $id_product)
	{
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());
		$sql = "CREATE TABLE IF NOT EXISTS ".$order_name." (
			id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			product_id INT(11) NOT NULL,
			product_title VARCHAR(255) NOT NULL,
			product_img VARCHAR(255) NOT NULL,
			num INT(11) DEFAULT NULL,
			price DECIMAL(10,0) UNSIGNED DEFAULT NULL
			)";
		if (!mysqli_query($conn, $sql))
			die("Error creating order ".$order_name.": ".mysqli_error($conn));
		$sql = "SELECT * FROM products WHERE id = ".$id_product;
		$result = mysqli_query($conn, $sql);
		$product = mysqli_fetch_assoc($result);
		$sql = "INSERT INTO ".$order_name." (product_id, product_title, product_img, num, price)
				VALUES (".$id_product.", '".$product["title"]."', '".$product["img"]."', 1, ".$product["price"].")";
		if (!mysqli_query($conn, $sql))
			die("Error add product: ".mysqli_error($conn));
		mysqli_close($conn);
	}
?>

