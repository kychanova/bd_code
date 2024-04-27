<?php
	$query = "SELECT * FROM `products` AS pt 
			  JOIN prices AS pc ON pt.product_id=pc.product_id 
			  WHERE date_start <= CURRENT_TIMESTAMP 
			  AND date_start = (SELECT MAX(date_start) from prices WHERE product_id = pt.product_id)";
	

	// print_r("<pre>");
	// print_r($_GET);
	// print_r("</pre>");

	if(isset($_GET['category'])){
		$cat = $_GET['category'];
		$query .= " AND category_id=$cat";
		$get_category_name_query = "SELECT category_name FROM categories WHERE category_id=$cat";
		$cat_res = mysqli_query($conn, $get_category_name_query);
		$cat_row = mysqli_fetch_array($cat_res);
		if ($cat_row){
			$cat_name = $cat_row['category_name'];
			$h2 = "Товары категории $cat_name";
		}
		else{
			$h2 = "Нет такой категории";
		}
		
	}	
	// print_r($query);

	$res = mysqli_query($conn, $query);
?>

<content>
<h2>  <?php print_r($h2);  ?></h2>
	<?php
		while ($row = mysqli_fetch_array($res)){
			$output = "<div class='product'>
							<img class='prod_image' src='assets/img/products/$row[image_path]'>
							<div class='prod_text'>
								<div class='product_code'>Артикул: $row[product_id]</div>
								<div class='product_name'>$row[product_name]</div>
								<div class='product_price'>Цена: $row[price] руб</div>
								<div class='product_desc'>$row[description]</div>
							</div>
							<div class='act'>
								<a href='product_page.php?product=$row[product_id]' class='view_link'>Посмотреть</a>
								<a href='order_success.php' class='buy_link'>Купить</a>
							</div>
						</div>";
			print_r($output);
		}
	?>
	
	<div class="pagination">
		1 2 3
	</div>
</content>