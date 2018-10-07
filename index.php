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
				<div class="item-stats"><h6 class="goods-grid"><?php echo $product['stats'];?></h6></div>
				<img clas="item-img" src="<?php echo $product['img'];?>" height = "130px" alt="item-img">
				<div class="caption">
					<div class="item-price"><h4>&dollar;<?php echo $product['price'];?></h4></div>
					<div class="item-title"><h3><?php echo $product['title'];?></h3></div>
					<div class="item-intro"><h5><?php echo $product['intro'];?></h5></div>
					<div class="item-buttons">
						<a href="basket.php?item=<?php echo $product['id']; ?>"><button class="button-buy-item">BUY</button></a>
						<a href="basket.php?additem=<?php echo $product['id']; ?>"><button class="button-add-to-cart">Add to cart</button></a>
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