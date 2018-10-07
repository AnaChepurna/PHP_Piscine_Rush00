<div class="header-login-bar">

	<?php
		$login_status_flag = TRUE;
		foreach ($users as $value) {
			if ($_SESSION['loggued_on_user']) {
				echo '<span class="header-login-info">Hello <span class="header-login-value"><a href="pages/change_password_form.php" title="Press to change your password">' . $_SESSION['loggued_on_user']. '</a></span></span>';
				if ($value[isadmin]){
					echo "<span> 🤝</span>";}
				else {
					echo "<span> 👤</span>";
				}
				echo '<a href="logout.php"><button class="header-btn">EXIT</button></a>';
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
			<a href="create.php"><button class="header-btn">CREATE AN ACCOUNT</button></a>
	<?php 
		} 
	?>

	<a href="basket.php"><button class="basket-btn"><img class="basket-img" src="https://cdn1.vectorstock.com/i/thumb-large/62/70/shopping-cart-icon-in-black-dotted-silhouette-vector-18566270.jpg"></button></a>
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

		<?php 
			}
		?>

<div class="navigation-menu">

		<?php
			if ($is_basket === TRUE) { 
		
		?>

		<a  class="menu-item" href="index.php"><span>All</span></a>

		<?php
			}
		
		?>
</div>
