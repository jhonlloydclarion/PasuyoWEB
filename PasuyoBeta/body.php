<?php  

	$InstantCoffee = "Instant Coffee and Creamer";
	$Category_2 = "Condiments";
	$Category_3 = "Canned Goods";
	$Breads = "Breads";
	$BabyCare = "Baby Care";
	if(isset($_SESSION['username']) != NULL){
		$loginMessage = "Welcome ".$_SESSION['username'];
	}
	else{
		header("Location: login.php");
	}
	// if($customer_order_status == "Inactive" or $customer_order_status == "Delivered"){

	// 	DeleteOrdersOfCustomerInTableOnProcess($database,$_SESSION['cust_id']);
	// 	DeleteCartItemsWhenReceived($database);
	// }
	// if($customer_order_status == "Receiving"){
	// 	Set_Order_Status($database,"Delivered");
	// }

	// If button clicks

	// if(isset($_POST['addcart'])){

	// 	$prod_id = $_POST['prod_id'];
	// 	AddCart($database,$prod_id);
	// }

	
?>

<style type="text/css">
	
	.product-box{
		width: 150px;
		height: 250px;
		
		color:  black;
		
		margin: 5px;
		margin-left: 10px;
		display: flex;
		flex-direction: column;
		/*border-width: 1px;
		border-color: rgb(193, 193, 193);
		border-style: solid;*/
		/*background-color: rgb(249, 249, 249);*/
		background: #FFFFFF;
		box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
	}
	.img-container{
		display: flex;
		padding: 2%;
		width: 96%;
		height: 56%;
		margin-bottom: 5%;
	}
	.prod-lbl{
		margin-bottom: 5%;
		width: 95%;
		margin-left: 2.5%;
		margin-right: 2.5%;
		height: 15%;

		font-size: 12px;
	}
	.price-lbl{
		margin-bottom: 5%;
		height: 2.5%;
		width: 95%;
		margin-left: 2.5%;
		margin-right: 2.5%;
		font-weight: bold;
		color: red;

		font-size: 15px;
	}
	.btn-container{
		width: 100%;
		margin-top: 5%;
		height: 10%;

		display: flex;
		justify-content: center;
		align-items: center;
	}
	.btn-submit{
		width: 95%;
		border-style: none;
		padding: 5px;

		font-weight: bold;

	}
	img{
		display: flex;
		width: 100%;
		object-fit: scale-down;
	}
	.Cetegory-Box{

	}
	h1{
		margin-left: 10px;
		margin-right: 5px;
	}
	.products-holder{
		display: flex;
		flex-wrap: wrap;
	}

	@media screen and (max-width: 599px) {

		body{
			background-color: white;
		}
		.products-holder{
			display: flex;
			flex-wrap: nowrap;
			overflow-x: scroll;
		}
		.product-box{
			min-width: 150px;
	
			margin: 5px;
			margin-left: 10px;
			display: flex;
			flex-direction: column;
		}

	}

</style>

<script type="text/javascript">
	function Post(id){
		// var name = $("#bt3").val();
		// alert(id);
		$.post("ajax-add-cart.php",{post_prod: id},
			function(data){
				alert(data);
				$.post("get_current_cart.php",{post_id: id},function(data){
					// alert(data);
					$("#cart-counter").html(data);
				});
			});
		
	}

</script>

<section class="Category-Box">
	<h1><?php echo "Breading Mix";?></h1>
	<?php DisplayProducts($database,"Breading Mix");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Fresh Milk";?></h1>
	<?php DisplayProducts($database,"Fresh Milk");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Frozen Goods";?></h1>
	<?php DisplayProducts($database,"Frozen");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Soy Sauce";?></h1>
	<?php DisplayProducts($database,"Soy Sauce");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Vinegar";?></h1>
	<?php DisplayProducts($database,"Vinegar");?>
</section>

<section class="Category-Box">
	<h1><?php echo "All Purpose Cream";?></h1>
	<?php DisplayProducts($database,"All Purpose Cream");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Instant Coffee and Creamers";?></h1>
	<?php DisplayProducts($database,"Instant Coffee");?>
</section>

<section class="Category-Box">
	<h1><?php echo "3 in 1 and Twin Packs";?></h1>
	<?php DisplayProducts($database,"3 in 1");?>
</section>

<section class="Category-Box">
	<h1><?php echo $Breads;?></h1>
	<?php DisplayProducts($database,"Bread / Bakery");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Bakery";?></h1>
	<?php DisplayProducts($database,"Bakery");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Baking and Cooking Mixes";?></h1>
	<?php DisplayProducts($database,"Baking and Cooking Mixes");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Instant Noodles";?></h1>
	<?php DisplayProducts($database,"Instant Noodles");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Ready To Drink Tea";?></h1>
	<?php DisplayProducts($database,"RTDT");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Tetra Juice";?></h1>
	<?php DisplayProducts($database,"Tetra");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Snacks";?></h1>
	<?php DisplayProducts($database,"Snacks");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Biscuits";?></h1>
	<?php DisplayProducts($database,"Biscuits");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Ready To Drink Chocolate";?></h1>
	<?php DisplayProducts($database,"RTDC");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Canned, Bottled and Preserved Goods";?></h1>
	<?php DisplayProducts($database,"Canned Goods");?>
</section>

<section class="Category-Box">
	<h1><?php echo $BabyCare;?></h1>
	<?php DisplayProducts($database,"Baby Care");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Body Care";?></h1>
	<?php DisplayProducts($database,"Body Care");?>
</section>

<section class="Category-Box">
	<h1><?php echo "Deodorant Male"?></h1>
	<?php DisplayProducts($database,"Deodorant");?>
</section>


<div class="floating-cart-btn">
	<a href="checkout.php">
	<button class="btn-for-cart">
		<div id="cart-counter" class="counter-lbl">
		</div>
		<img class="cart-btn" src="img/cart.svg">
	</button>
	</a>
</div>

