<?php

	$order = init_order($servername, $username, $password, $dbname, session_id());
	add_product($servername, $username, $password, $dbname, $order, 1);
	if ($_GET['add_item']) 
	{

	}
?>