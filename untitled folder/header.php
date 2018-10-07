<div class="header-login">

	<?php
		$login_status_flag = TRUE;
		foreach ($users as $value) {
			if ($value[username] == $_SESSION['loggued_on_user']) {
				echo '<span class="hlogin-info">Hello <span class="header-login-value"><a href="/change_password_form.php" title="Press to change your password">' . $_SESSION['loggued_on_user']. '</a></span></span>';
				if ($value[isadmin]){
					echo "<span> <img src=\"https://image.flaticon.com/icons/svg/291/291205.svg\" width=15 height=15></span>";}
				else {
					echo "<span> <img src=\"https://image.flaticon.com/icons/svg/74/74472.svg\" width=15 height=15></span>";
				}
				echo '<a href="logout.php"><button class="header-button">EXIT</button></a>';
				if ($value[isadmin]) {
					echo '<a href="http://localhost:8080/phpmyadmin/db_structure.php?db=' . $cont[2] . '"><button class="header-btn">ADMIN PANEL</button></a>';
				}
				$login_status_flag = FALSE;
				break ;
			}
		}
		if ($login_status_flag) {
	?>
			<a href="login.php"><button class="header-btn">SIGN IN</button></a>
			<a href="create_user_page.php"><button class="header-btn">CREATE AN ACCOUNT</button></a>
	<?php 
		} 
	?>

	<a href="basket.php"><button class="basket-button"><img class="basket-img" src="https://image.flaticon.com/icons/png/512/109/109397.png"></button></a>
</div>
<?php
			if ($is_basket === TRUE) { 
?>
<div class="page-wrapper">

	<section class="intro" id="bakery-intro">
		<header>
			<h1>Булочкус</h1>
			<h2>Кошерные мучные изделия</h2>
		</header>
		</div> 

		<?php 
			}
		?>

<div class="navigation">

		<?php
			if ($is_basket === TRUE) { 
		
		?>

		<a  class="menu-item" href="index.php"><span>All</span></a>

		<?php
			}
		
		?>

	<?php
		foreach($categories as $category) {
			echo ' <a class="menu-item" href="?cat=' . $category['id'] . '"> <span class="tab">' . $category['title'] . '</span></a>';
		}
	?>
</div>
