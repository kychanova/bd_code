<?php
	$query = "SELECT * FROM categories";
	$res = mysqli_query($conn, $query);
?>

<content>
<h2>Категории товаров</h2>
	<div class="articles">
		<?php
			while($row = mysqli_fetch_array($res)){
				// print_r("<pre>");
				// print_r($row);
				// print_r("</pre>");
				$output = "<a href='category.php?category=$row[category_id]' class='category'> $row[category_name] </a>";
				print_r($output);
			}
		?>
	</div>
</content>