
	<?php

		$sql = "SELECT * FROM products";
	    $results = mysqli_query($conn,$sql);

	    $resultchecks = mysqli_num_rows($results);
	    if ($resultchecks>0){
	        while ($roww = mysqli_fetch_array($results)){

	            $path_image = "prodimage/". $roww["img_name"] . ".jpg";
	            $description = $roww["description"];
	            $price = $roww["price"];
	            $product_code = $roww["Product_Code"]; // Temporary

				echo		"<li class='li-tag'>";
				echo			"<div class='card-box'>";
				echo				"<div class='img-container'>";
				echo					"<img class='prod-img' src='".$path_image."''>";
				echo				"</div>";		
				echo				"<div class='description'>";
				echo					$price;
				echo				"</div>";
				echo				"<div class='price'>";
				echo					"<p class='price-lbl'>".$price."'</p>";
				echo				"</div>";
				echo				"<div class='action-box'>";
				echo					"<input class=add-to-cart' type='submit' name="" value='ADD TO CART'>";
				echo				"</div>";
				echo			"</div>";
				echo		"</li>";
	        }
	    }
	?>
