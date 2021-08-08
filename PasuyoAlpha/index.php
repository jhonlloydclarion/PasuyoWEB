<?php
	require ("conn.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<style type="text/css">
	
	body{
		font-family: Arial;
		margin: 0px;
		padding: 0px;
	}
	p,ol,li{
		margin: 0px;
		padding: 0px;
	}
	.Category-Box{
		padding: 3%;
	}
	.product-list{
		list-style: none;
		display: flex;
		flex-wrap: wrap;
		margin: 0px;
		padding: 0px;

	}
	.card-box{
		display: flex;
		flex-direction: column;

		background-color: grey;
		width: 250px;
		height: 350px;
		margin: 5px;

		background: #FFFFFF;
		box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
	}
	.img-container{
		display: flex;
		width: 100%;
		height: 60%;
	}
	.description{
		display: flex;
		width: 95%;
		height: 30%;
	}
	.price{
		display: flex;
		width: 95%;
		height: 20%;
	}
	.action-box{
		display: flex;
		width: 100%;
		height: 15%;
		align-items: center;
		justify-content: center;
		margin-bottom: 5%;
	}
	.prod-img{
		width: 100%;
		height: 100%;
		object-fit: cover;
	}
	.description,.price{
		margin-left: 5%;
		margin-top: 5%;
	}
	.price-lbl{
		font-weight: bold;
		font-size: 22px;
		margin-bottom: 5%;
	}
	.add-to-cart{
	
		padding: 10px;
		width: 90%;
		border-style: none;
		font-weight: bold;

	}
	.li-tag{
		width: auto;
		
	}

	/*Media Query*/

	@media screen and (max-width: 500px) {
	  body {
	    background-color: blue;
	  }
	  .card-box{
		display: flex;
		flex-direction: column;

		background-color: grey;
		width: 170px;
		height: 270px;
		margin: 5px;

		background: #FFFFFF;
		box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
		}
		.price-lbl{
			font-weight: bold;
			font-size: 17px;
			margin-bottom: 5%;
		}
		.description{
			font-weight: 9px;
		}
	}
	nav{
		display: flex;
		position: fixed;
		width: 100%;
		height: 70px;
		background-color: grey;
		margin: 0px;
		padding: 0px;
	}
	.logo-container{
		display: flex;
		width: 30%;
	}
	.info-container{
		display: flex;
		width: 70%;
		justify-content: flex-start;
		align-items: center;
	}
	.counter{
		margin-right: 10px;
		font-weight: bold;
		font-size: 22px;
	}
	.view-cart{
		padding: 10px 20px 10px 20px;
		border-style: none;
	}
	.view-cart:hover{
		background-color: red;
	}

</style>
<body>

	<nav>
		<div class="logo-container">
			
		</div>
		<div class="info-container">

			<?php

				$servername = "localhost";
			    $user = "root";
			    $password = "";
			    $database = "customer_1";

			    //create connection
			    $conn_for_checkout_counter = new mysqli($servername,$user,$password,$database);

			    // Check connection
			    if ($conn_for_checkout_counter->connect_error) {
			        die("Connection failed: " . $conn_for_checkout_counter->connect_error);
			    }

				$sql = "SELECT * FROM checkouts";
			    $results = mysqli_query($conn_for_checkout_counter,$sql);

			    $resultchecks = mysqli_num_rows($results);

				echo "<label class='counter'>".$resultchecks."</label>";

			?>
			
			<input class="view-cart" type="submit" name="" value="View Cart">
		</div>
	</nav>
	<!-- Start of Category 1 -->
	<div class="Category-Box">
		<h1 class="header">Category 1</h1>
		<div class="products-container">
			<ul class="product-list">
				<?php

					$sql = "SELECT * FROM products";
				    $results = mysqli_query($conn,$sql);

				    $resultchecks = mysqli_num_rows($results);
				    if ($resultchecks>0){
				        while ($roww = mysqli_fetch_array($results)){

				            $path_image = "products-image/". $roww["img_name"] . ".jpg";
				            $description = $roww["description"];
				            $price = $roww["price"];
				            $product_code = $roww["Product_Code"]; // Temporary

							echo		"<li class='li-tag'>";
							echo			"<div class='card-box'>";
							echo				"<div class='img-container'>";
							echo					"<img class='prod-img' src='".$path_image."'>";
							echo				"</div>";		
							echo				"<div class='description'>".$description."</div>";			
							echo				"<div class='price'>";
							echo					"<p class='price-lbl'>P".$price."</p>";
							echo				"</div>";
							echo				"<div class='action-box'>";
							echo					"<input class='add-to-cart' type='submit' name='' value='ADD TO CART'>";
							echo				"</div>";
							echo			"</div>";
							echo		"</li>";
				        }
				    }
				?>

			</ul>
		</div>
	</div>
	<!-- End of Category 1 -->

	<!-- Start of Category 1 -->
	<div class="Category-Box">
		<h1 class="header">Category 2</h1>
		<div class="products-container">
			<ul class="product-list">
				<?php

					$sql = "SELECT * FROM products";
				    $results = mysqli_query($conn,$sql);

				    $resultchecks = mysqli_num_rows($results);
				    if ($resultchecks>0){
				        while ($roww = mysqli_fetch_array($results)){

				            $path_image = "products-image/". $roww["img_name"] . ".jpg";
				            $description = $roww["description"];
				            $price = $roww["price"];
				            $product_code = $roww["Product_Code"]; // Temporary

							echo		"<li class='li-tag'>";
							echo			"<div class='card-box'>";
							echo				"<div class='img-container'>";
							echo					"<img class='prod-img' src='".$path_image."'>";
							echo				"</div>";		
							echo				"<div class='description'>".$description."</div>";			
							echo				"<div class='price'>";
							echo					"<p class='price-lbl'>P".$price."</p>";
							echo				"</div>";
							echo				"<div class='action-box'>";
							echo					"<input class='add-to-cart' type='submit' name='' value='ADD TO CART'>";
							echo				"</div>";
							echo			"</div>";
							echo		"</li>";
				        }
				    }
				?>

			</ul>
		</div>
	</div>
	<!-- End of Category 1 -->
</body>
</html>