<?php

	function get_order_price($conn, $order_name)
	{
		$order = substr($order_name, 1);
		$sql = "SELECT * FROM orders WHERE id = ".$order;
		$result = mysqli_query($conn, $sql);
		$record = mysqli_fetch_assoc($result);
		$price = $record["price"];
		if (!$price)
			$price = 0;
		return ($price);
	}

	function change_order_price($conn, $order_name, $add_price)
	{
		$order = substr($order_name, 1);
		$price = get_order_price($conn, $order_name) + $add_price;
		$sql = "UPDATE orders SET price = ".$price." WHERE id = ".$order;

		mysqli_query($conn, $sql);
	}

	function  add_product($servername, $username, $password, $dbname, $order_name, $id_product)
	{
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());
		$sql = "SELECT * FROM products WHERE id = ".$id_product;
		$result = mysqli_query($conn, $sql);
		$product = mysqli_fetch_assoc($result);
		$sql = "INSERT INTO ".$order_name." (product_id, product_title, product_img, num, price)
				VALUES (".$id_product.", '".$product["title"]."', '".$product["img"]."', 1, ".$product["price"].")";
		if (!mysqli_query($conn, $sql))
			die("Error add product: ".mysqli_error($conn));
		change_order_price($conn, $order_name, $product["price"]);
		mysqli_close($conn);
	}

	function is_in_basket($servername, $username, $password, $dbname, $order, $product_id)
	{
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());
		$sql = "SELECT * FROM ".$order." WHERE product_id = ".$product_id;
		$result = mysqli_query($conn, $sql);
		$product = mysqli_fetch_assoc($result);
		if (!$product)
		{
			return (FALSE);
		}
		return(TRUE);
	}

	function add_del($servername, $username, $password, $dbname, $order, $product_id, $op)
	{
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());
		$sql = "SELECT num FROM ".$order." WHERE product_id = ".$product_id;
		$result = mysqli_query($conn, $sql);
		$product = mysqli_fetch_assoc($result);
		$num = $product["num"];
		if ($op == "add")
			$num++;
		elseif ($op == "del")
			$num--;
		$ok = 1;
		if ($num < 0)
		{
			$ok = 0;
			$num = 0;
		}
		$sql = "UPDATE ".$order." SET num = ".$num." WHERE product_id = ".$product_id;
		mysqli_query($conn, $sql);
		$sql = "SELECT price FROM products WHERE id = ".$product_id;
		$result = mysqli_query($conn, $sql);
		$product = mysqli_fetch_assoc($result);
		$price = $product["price"] * $num;
		$sql = "UPDATE ".$order." SET price = ".$price." WHERE product_id = ".$product_id;
		if ($op == "add")
			change_order_price($conn, $order, $product["price"]);
		elseif ($op == "del")
		{
			if ($ok)
				change_order_price($conn, $order, $product["price"] * -1);
		}
		mysqli_query($conn, $sql);
	}

	$dbname = "shop";
	$servername = 'localhost';
	$username = 'root';
	$password = '111111';
	session_start();
	include('init_functions.php');
	$_SESSION["order"] = init_order($servername, $username, $password, $dbname, session_id());
	if ($_GET['pm'] != "" && $_GET['add_item'] != "")
		add_del($servername, $username, $password, $dbname, $_SESSION["order"], $_GET['add_item'], $_GET['pm']);
	elseif ($_GET['add_item'] != "")
	{
		if (!is_in_basket($servername, $username, $password, $dbname, $_SESSION["order"], $_GET['add_item']))
			add_product($servername, $username, $password, $dbname, $_SESSION["order"], $_GET['add_item']);
		else
			add_del($servername, $username, $password, $dbname, $_SESSION["order"], $_GET['add_item'], 'add');
	}
?>

<html>
<head>
	<style type="text/css">
		.block {
		/*	position: absolute;*/
			display: block;
			width: 900px;
			height: 130px;
			border-style: solid;
			border-color: lightgrey;
		}

		.title {
			position: absolute;
		    float: right;
		    left: 150px;
		    padding: 20px;
		    width: 300px;
		}

		.items {
			position: absolute;
		    float: right;
		    left: 500px;
		    padding: 20px;
		    width: 300px;
		}

		.block-img {
		    width: 130px;
		    float: left;
		}

		.butt {
			margin: 20px;
			width: 30px;
			height: 30px;
		    float: left;
		}

		.num {
			width: 30px;
			float: left;
			text-align: center;
			margin: 5px;
		}

		.cost {
			position: absolute;
		    float: right;
		    left: 750px;
		    padding: 20px;
		    width: 70px;
		}

		.summ {
			display: block;
			width: 900px;
			height: 130px;
			border-style: solid;
			border-color: lightgrey;
			text-align: center;
		}

	</style>
</head>
<body>
	<?php
	$conn = mysqli_connect($servername, $username, $password, $dbname);
		if (!$conn)
			die("Connection failed: " . mysqli_connect_error());

	$sql = "SELECT * FROM ".$_SESSION["order"];
	$result = mysqli_query($conn, $sql);
	while ($product = mysqli_fetch_assoc($result)) {
			?>

			<div class="block">
				<div class="block-img"><img src="<?php echo $product['product_img'];?>" height = "130px" alt="item-img"></div>
					<div class="title">
						<h3><?php echo $product['product_title'];?></h3>
					</div>
					<div class="items">
						<a href="basket.php?pm=del&add_item=<?php echo $product['product_id']; ?>"><button class="butt">-</button></a>
						<div class="num"><h4><?php echo $product['num'];?></h4></div>
						<a href="basket.php?pm=add&add_item=<?php echo $product['product_id']; ?>"><button class="butt">+</button></a>
					</div>
					<div class="cost">
						<h2>&dollar;<?php echo $product['price'];?></h2>
					</div>
			</div>


			<?php
		}
	?>
	<div class="summ"> <h2>Общая строимость заказа: &dollar;
	<?php $price = get_order_price($conn, $_SESSION["order"]); echo $price; ?></h2>
	<a href="http://localhost:8100/PHP_Piscine_Rush00"><button>Назад в магазин</button></a>
	<a href=""><button>Отправить заказ</button></a>
	</div>
</body>
</html>