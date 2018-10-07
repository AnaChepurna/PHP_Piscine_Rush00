<?php 
	include('main.php'); 
?>

<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Bakery shop</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/goods.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Best bakery and staff">
	<link href="https://fonts.googleapis.com/css?family=Caveat" rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC:700|Caveat" rel="stylesheet" type='text/css'>
  </head>

<body id="bakery-shop">
<?php
	include('header.php');
?>


<div class="goods-grid">
	<?php 
	
		foreach($products as $product) {
	
	?>
			<div class="item">
				<img clas="item-img" src="<?php echo $product['img'];?>" height = "130px" alt="item-img">
				<div class="caption">
					<div class="item-price"><h4>&dollar;<?php echo $product['price'];?></h4></div>
					<div class="item-title"><h3><?php echo $product['title'];?></h3></div>
					<div class="add-to-cart">
						<a href="basket.php?add_item=<?php echo $product['id']; ?>"><button class="add-to-cart-butt">Добавить в корзину</button></a>
					</div>
				</div>
			</div>

	<?php 
		}
	?>

</div>

<div class="footer">
	<span class="made-by">Produced by achepurn and vbespalk, 2018</span>
</div>
</body>
</html>