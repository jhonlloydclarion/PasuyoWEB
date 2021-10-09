<?php

	$servername = "localhost";
    $user = "root";
    $password = "";
    $database = "checkouts";

    //create connection
    $conn = new mysqli($servername,$user,$password,$database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function add_qty($prod_code) {

    	$servername = "localhost";
	    $user = "root";
	    $password = "";
	    $database = "checkouts";

	    //create connection
	    $conn = new mysqli($servername,$user,$password,$database);

	    // Check connection
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }

	  	$sql = "SELECT * FROM aaa WHERE product_id ='".$prod_code."'";
		$results = mysqli_query($conn,$sql);
		$resultchecks = mysqli_num_rows($results);
		$roww = mysqli_fetch_array($results);

		$quantity = $roww["qty"];
		$updated_qty = $quantity + 1;

		$sql_update = "UPDATE aaa SET qty =".$updated_qty." WHERE product_id ='".$prod_code."'";
		$results = mysqli_query($conn,$sql_update);

	}

	if (isset($_POST['add'])){
		add_qty("ABC");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<style type="text/css">
	body{
		margin: 0px;
		padding: 0px;
		font-family: Arial;
	}
	.list{
		display: flex;
		list-style: none;
		width: 100%;
		height: 100px;
		background: #FFFFFF;
		box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);

		margin-bottom: 5px;

	}
	.master-ul,.labels-container{
		padding: 0px;
		margin: 10px;
	
	}
	.lbl-h{
		font-weight: bold;
		font-size: 17px;
		margin-bottom: 5px;
	}
	.lbl{
		font-size: 10px;
	}
	.img-container{
		display: flex;
		flex-direction: column;
		width: 20%;
		margin-right: 5%;
	}
	.item-name-container{
		display: flex;
		flex-direction: column;
		width: 30%;
		justify-content: center;
	}
	.price-container{
		display: flex;
		flex-direction: column;
		width: 10%;
		justify-content: center;
	}
	.quantity-container{
		display: flex;
		flex-direction: column;
		width: 10%;
		justify-content: center;
	}
	.button-container{
		display: flex;
		width: 5%;
		align-items: center;
		margin-left: 5%;
	}
	.btn{
		
		margin: 5px;
		border-style: none;
		border-radius: 20%;
		font-weight: bold;
		font-size: 18px;
	}
	.p-image{
		width: 100%;
		height: 100%;
		object-fit: cover;
	}
	.labels-container{
		display: flex;
	}
	.left{
		width: 40%;
	}
	.right{
		width: 60%;
	}
</style>
<body>
	<div class="action-buttons-container">
		
	</div>
	<div class="labels-container">
		<h1 class="left">Check Out #0384023840</h1>
		<?php

			$sql = "SELECT * FROM aaa";
			$results = mysqli_query($conn,$sql);

			$resultchecks = mysqli_num_rows($results);
			$total = 0;
		
			if ($resultchecks>0){
				while ($roww = mysqli_fetch_array($results)){

					$quantity = $roww["qty"];
					$price = $roww["price"];
					$total = ($price*$quantity)+ $total ;
				
		    }
			    }

			echo "<h1 class='right'>Total P".$total."</h1>";
	
		?>
		
	</div>
	<div class="check-out-container">
		<ul class="master-ul">
		
			<form action="" method="post">
			<?php
					$sql = "SELECT * FROM aaa";
				    $results = mysqli_query($conn,$sql);

				    $resultchecks = mysqli_num_rows($results);
				    if ($resultchecks>0){
				        while ($roww = mysqli_fetch_array($results)){


				            $path_image = "products-image/". $roww["img"] . ".jpg";
				            $description = $roww["description"];
				            $price = $roww["price"];
				            $qty = $roww["qty"];
				            $prod_id = $roww["product_id"];
				      		
				      		// echo  	"<form action='' method='post'>";
					        echo    "<li class='list'>";
							echo		"<div class='img-container'>";
							echo			"<img class='p-image' src='".$path_image."'>";
							echo		"</div>";
							echo		"<div class='item-name-container'>";
							echo			"<label class='lbl-h'>Product Name</label>";
							echo			"<label class='lbl'>".$description."</label>";
							echo		"</div>";
							echo		"<div class='price-container'>";
							echo			"<label class='lbl-h'>Price</label>";
							echo			"<label class='lbl'>P".$price."</label>";
							echo		"</div>";
							echo		"<div class='quantity-container'>";
							echo			"<label class='lbl-h'>Quantity</label>";
							echo			"<label class='lbl'>".$qty."</label>";
							echo		"</div>";
							echo		"<div class='button-container'>";
							echo			"<input class='btn' type='submit' name='add' value='+'>";
							echo			"<input class='btn' type='submit' name='remove' value='-'>";
							echo 			"<input style='display:none;' type='submit' name=''";
							echo		"</div>";
							echo	"</li>";
							// echo 	"</form>";
				        }
				    }
				    else{
				    	echo "No Data in the Database";
				    }
			?>
			</form>
		
		</ul>
	
	</div>
</body>
</html>