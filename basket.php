<?php

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
		{
			$num++;
		}
		elseif ($op == "del")
			$num--;
		$sql = "UPDATE ".$order." SET num = ".$num." WHERE product_id = ".$product_id;
		mysqli_query($conn, $sql);
	}

	$dbname = "shop";
	$servername = 'localhost';
	$username = 'root';
	$password = '111111';
	session_start();
	include('init_functions.php');
	$_SESSION["order"] = init_order($servername, $username, $password, $dbname, session_id());
	if ($_GET['add_item'] != "")
	{
		if (!is_in_basket($servername, $username, $password, $dbname, $_SESSION["order"], $_GET['add_item']))
			add_product($servername, $username, $password, $dbname, $_SESSION["order"], $_GET['add_item']);
		else
			add_del($servername, $username, $password, $dbname, $_SESSION["order"], $_GET['add_item'], 'add');

	}
	if ($_GET['pm'] == "add")
	{
		echo "add";
	}
	if ($_GET['pm'] == "del")
	{
		echo "del";
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
						<a href="basket.php?pm=del"><button class="butt">-</button></a>
						<div class="num"><h4><?php echo $product['num'];?></h4></div>
						<a href="basket.php?pm=add"><button class="butt">+</button></a>
					</div>
					<div class="cost">
						<h2>&dollar;<?php echo $product['price'];?></h2>
					</div>
			</div>


			<?php
		}
	?>
</body>
</html>