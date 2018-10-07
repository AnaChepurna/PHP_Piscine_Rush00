<?php
	$is_basket = TRUE;
	include('init_db.php');
	$products = array();
	if ($cat = isset($_REQUEST['cat'])) {
		$cat = (int) $_REQUEST['cat'];
	}
	else {
		$cat = 0;
	}
	$sql = 'SELECT p.* FROM products AS p ';
	if ($cat) {
		$sql .= ' INNER JOIN categories_products AS cp ON cp.id_product=p.id AND cp.id_category=' . $cat;
	}
	if ($result = mysqli_query($conn, $sql)) {
		while ($tmp = mysqli_fetch_assoc($result)) {
			$products[] = $tmp;
		}
		mysqli_free_result($result);
	}
	$users = array();
	if ($result = mysqli_query($conn, 'SELECT * FROM users')) {
		while ($tmp = mysqli_fetch_assoc($result)) {
			$users[] = $tmp;
		}
		mysqli_free_result($result);
	}
	//session_start();
	// if (!$_SESSION['basket']) {
	// 	$_SESSION['basket'] = array();
	// }
?>