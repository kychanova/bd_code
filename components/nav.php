<?php
	$query = "SELECT * FROM categories";
	$res = mysqli_query($conn, $query);
	
	// $row1 = mysqli_fetch_array($res);
	// $cat1 = $row1['category_name'];
	
	// $row2 = mysqli_fetch_array($res);
	// $cat2 = $row2['category_name'];

	// $row3 = mysqli_fetch_array($res);
	// $cat3 = $row3['category_name'];

	// $row4 = mysqli_fetch_array($res);
	// $cat4 = $row4['category_name'];


?>

<nav>
	<ul class="main_menu">
		<li>
			<a href="/">ГЛАВНАЯ</a>
		</li>
		<li><a href="categories.php">ТОВАРЫ</a>
			<ul class="submenu">
				<?php
					while($row = mysqli_fetch_array($res)){
						$cat = $row['category_name'];
						$output = "<li><a href='category.php'>
										$cat
									</a></li>";
						print_r($output);
					}
				?>
     		</ul>
		</li>
		<li>
			<a href="services.php">УСЛУГИ</a>
		</li>
		<li>
			<a href="about.php">О НАС</a>
		</li>
		<li>
			<a href="contacts.php">КОНТАКТЫ</a>
		</li>
	</ul>
</nav>