<?php
	if ($_GET['add_item']) {
		foreach ($products as $key => $value) {
			if ($value['id'] == $_GET['item']) {
				$_SESSION['basket'][$key] = array();
				$_SESSION['basket'][$key]['id'] = $_GET['item'];
				if (!($_SESSION['basket'][$key]['quantity']))
					$_SESSION['basket'][$key]['quantity'] = 1;
					unset($_GET['item']);
				break ;
			}
		}
	}
?>