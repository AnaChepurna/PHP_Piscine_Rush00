
<!DOCTYPE html>
<html>
	<head>
		<title>Creation user form</title>
		<link rel="stylesheet" type="text/css" href="css/create_user.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Caveat" rel='stylesheet' type='text/css'>
	</head>

	<body class="create_user">
		<div class="page-wrapper">

		<section class="intro" id="bakery-intro">
		<header>
			<h1>Булочкус</h1>
			<h2>Кошерные мучные изделия</h2>
		</header>
		</div>
		<form action="create_user.php" method="post">
			<span class="title">
				<h5>Создание нового аккаунта</h5>
			</span>
			<?php
				if ($_GET['error'] == 1) {
					echo "<div class=\"error-on\">Заполните все обязательные поля.</div>";
				}
				else if ($_GET['error'] == 2) {
					echo "<div class=\"error-on\">Логин используется.</div>";
				}
				else {
					echo "<div class=\"error-off\">Проверьте заполненные поля.</div>";
				}
			?>
			<span class="form-header">Логин (обязательно):</span> 
			<br/>
			<input class="form-field" type="text" name="login" value="<?php echo $_GET['login']; ?>" placeholder="Логин" />
			<br/>
			<span class="form-header">Пароль (обязательно):</span> 
			<br/>
			<input class="form-field" type="password" name="passwd" value="" placeholder="Пароль" />
			<br/>
			<span class="form-header">Email:</span> 
			<br/>
			<input class="form-field" type="email" name="email" value="<?php echo $_GET['email']; ?>" placeholder="example@email.com" />
			<br/>
			<span class="form-header">Ваше имя:</span> 
			<br/>
			<input class="form-field" type="text" name="name" value="<?php echo $_GET['name']; ?>" placeholder="Имя"/>
			<br/>
			<span class="form-header">Номер телефона:</span> 
			<br/>
			<input class="form-field" type="tel" name="phone" value="<?php echo $_GET['phone']; ?>" placeholder="000-000-0000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"/>
			<br/>
			<span class="form-header">Адресс доставки:</span> 
			<br/>
			<input class="form-field" type="text" name="address" value="<?php echo $_GET['address']; ?>" placeholder="Адресс доставки" />
			<br/>
			<input class="ok-button submit" type="submit" name="submit" value="OK" />
			<a class="ok-button cancel" href="index.php"><span class=cancel-txt>Отмена</span></a>
			<br/>
		</form>
	</body>
</html>