<?php
	session_start();

	if(isset($_SESSION['username']) != NULL){
		$loginMessage = "Welcome ".$_SESSION['username'];

	}
	else{
		header("Location: login.php");
	}

	if($_SESSION['variable']){

	}

	// Redirect of the order_status = Active in table customer
	// where cust_id == "xxx"

	


	include("config.php");
	include("main-functions.php");

	if(isset($_POST['process'])){
		SetCustomerStatusToACTIVE($database);
		header("Location: process.php");
	}
	

	$customer_order_status = CustomerOrderStatus($database,$_SESSION['cust_id']);

	if($customer_order_status == "Active" or $customer_order_status == "Processing"){

		header("Location: process.php");
	}
	if($customer_order_status == "Receiving"){
		header("Location: process.php");
	}

	

	$total = DisplayCheckOutTotal($database);

	if(isset($_POST['remove'])){
		$prod_id = $_POST['get_id'];

		DeleteItemInCart($database,$prod_id);

	}
	
	
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title>Check Out</title>
</head>
<style type="text/css">
	body{
		font-family: Arial;
		margin: 0px;
		padding: 0px;
	}
	.m-box{
		display: flex;
		width: 320px;
		height: 160px;
		/*background-color: red;*/
		padding: 2px;
		border-radius: 5px;
		margin: 2px;

		/*box-shadow: 10px 10px 10px 1px rgba(132, 132, 132, 0.2);*/
		border: 1px solid #DADADA;
	}
	.pic-box{
		display: flex;
		width: 40%;
		border-radius: 10px;
	}
	.picture{
		display: flex;
		width: 100%;
		object-fit: scale-down;
		border-radius: 10px;	
	}
	.sub-box{
		display: flex;
		width: 60%;
		height: 100%;
		/*background-color: yellow;*/
		flex-direction: column;
	}
	.remove-box{
		display: flex;
		width: 100%;
		height: 15%;
		padding-top:5% ;
		/*background-color: red;*/
		justify-content: center;
		align-items: center;
		align-content: center;
	}
	.remove-btn{
		width: 90%;
		background-color: #D9D9D9;
		border-style: none;
		padding-top: 3px;
		padding-bottom: 3px;
	}
	.top-box{
		width: 90%;
		height: 55%;
		padding-left: 5%;
		padding-top: 5%;
		padding-right: 5%;
	}
	.bot-box{
		display: flex;
		width: 100%;
		height: 20%;
		/*background-color: blue;*/
	}
	.p-box{
		display: flex;
		width: 55%;
		align-items: center;
		padding-left: 5%;
		font-weight: bold;
		
	}
	.a-box{
		display: flex;
		width: 40%;
		height: 100%;
		align-items: center;
		justify-content: center;
	}
	.lbl{
		margin-left: 2.5px;
		margin-right: 2.5px;
	}
	.title{
		
	}
	.container{
		display: flex;
		justify-content: center;
		flex-direction: column;
		align-items: center;
		padding-top: 70px;
		padding-bottom: 70px;
	}
	.sticky-bot{
		display: flex;
		justify-content: safe flex-end;
		align-items: center;
		width: 100%;
		background-color: #18829C;
		margin-top: 20px;
		position: fixed;
		bottom: 0;
		padding-top: 10px;
		padding-bottom: 10px;
	}
	.sticky-top{
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
		position: fixed;
		top: 0;
		padding-top: 10px;
		padding-bottom: 10px;
		background-color: #18829C;
		margin-bottom: 10px;
	}
	.btn-checkout{
		margin-left: 5px;
		margin-right: 5px;
		padding: 10px;
		padding-left: 20px;
		padding-right: 20px;
		border-style: none;
	}
	.total-lbl{
		margin-right: 50px;
		font-weight: bold;
		font-size: 22px;
		color: white;
	}
	.lbl-top{
		font-weight: bold;
		font-size: 32px;
		color: white;
	}
	.btn-qty{
		color: white;
		width: 25px;
		height: 25px;
		padding: 2px;
		border-radius: 100%;
		border-style: none;
		background-color: #18829C;
	}
</style>

<script type="text/javascript">
	
	function AddQty(id,val){
		if(val == "+"){
			// Add to the cart first
			// alert(id);
			$.post("ajax-additional-qty.php",{post_prod: id},
				function(data){
					// Count the number of qty where product_id = x

					$.post("ajax-qty-counter.php",{post_prod: id},function(data){
						// alert(data);
						// val = '+' or val = '-'
						let x = id;
						var s_id = "#display-" + x.toString();
						$(s_id).html(data);
						$.post("ajax-checkout-total.php",{post_prod: id},function(data){
							$("#checkout-total").html(data);
						});
					});

					$.post("ajax-item-total.php",{post_prod: id},function(data){
						// alert(data);
						// val = '+' or val = '-'
						let x = id;
						var s_id = "#price-" + x.toString();
						$(s_id).html(data);
						$.post("ajax-checkout-total.php",{post_prod: id},function(data){
							$("#checkout-total").html(data);
						});
					});
			});
			
		
		}else{

			$.post("ajax-decr-qty.php",{post_prod: id},function(data){
			// alert(data);
			// val = '+' or val = '-'
				let x = id;
				var s_id = "#display-" + x.toString();
				$(s_id).html(data);

				if(data == 1){

					$.post("ajax-item-total.php",{post_prod: id},function(data){
						let x = id;
						var s_id = "#price-" + x.toString();
						$(s_id).html(data);
						$.post("ajax-checkout-total.php",{post_prod: id},function(data){
							$("#checkout-total").html(data);
						});
					});
				}else{
					$.post("ajax-item-total.php",{post_prod: id},function(data){
						// alert(data);
						// val = '+' or val = '-'
						let x = id;
						var s_id = "#price-" + x.toString();
						$(s_id).html(data);
						$.post("ajax-checkout-total.php",{post_prod: id},function(data){
							$("#checkout-total").html(data);
						});
					});


					
				}
			});	
		}
	}

</script>

<body>
	<?php  

		

	?>
	<div class="sticky-top">
		<label class="lbl-top">Check Out</label>
	</div>
	<div id="reload" class="container">
		
		<?php

			$total = DisplayCheckOutTotal($database);

			if($total == 0){
				echo "<div> NO ITEM </div>";
			}
			else{
				CheckoutDisplay($database,$_SESSION['cust_id']);
			}
			
		?>
		
	</div>
	<div class="sticky-bot">
		<label id="checkout-total"class="total-lbl">Total: <?php global $total; echo number_format($total);?> </label>
		<form method="post">
			<input class="btn-checkout" type="submit" name="process" value="Proceed">
		</form>
		<a href="index.php">
			<input class="btn-checkout" type="submit" name="" value="Back">
		</a>
	</div>
</body>
</html>
