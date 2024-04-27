<?php
	if (isset($_GET['product'])){
		$prod_id = $_GET['product'];
		$get_product_info_query = "SELECT * FROM `products` as p 
								   JOIN categories as c on p.category_id=c.category_id 
								   JOIN units as u on u.unit_id = p.product_id 
								   JOIN countries as co on p.country_id = co.country_id 
								   JOIN prices as pr on pr.product_id = p.product_id 
								   WHERE date_start <= CURRENT_TIMESTAMP 
								   and p.product_id=$prod_id
								   order by date_start desc limit 1";
		$res = mysqli_query($conn, $get_product_info_query);
		$prod = mysqli_fetch_array($res);
		if ($prod){
		$output = "<h2>$prod[product_name]</h2>
					<div class='info'>
						<img src='assets/img/products/$prod[image_path]' height='300px'>
						<table>
							<tr>
								<td><b>Категория:</b> $prod[category_name]</td>
							
							</tr>
							<tr>
								<td><b>Страна производитель:</b> $prod[country_name]</td>
							</tr>
							<tr>
							<td><b>Цена:</b> $prod[price]руб. за $prod[unit_name]</td>
							</tr>
							<tr>
								<td colspan='2'>
									<b>Описание:</b><br>
									$prod[description]
								</td>
							</tr>
						</table>
						<form action='order_success.php' method='POST'>
							<input type='submit' name='buy' value='Купить'>
						</form>
					</div>";
		}
		else{
			$output = "<h2 style='text-align='center'>Такого товара нет</h2>";
		}
	}
	else{
		$output = "<h2 style='text-align='center'>Определитесь с товаром</h2>";
	}
	
?>
<content>
	<?php print_r($output); ?>
</content>