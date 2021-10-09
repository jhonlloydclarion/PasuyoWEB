<?php
	
	include("config.php");
	include("main-functions.php");
	include("check_session.php");

	// Redirect of the order_status = Active in table customer
	// where cust_id == "xxx"

	$customer_order_status = CustomerOrderStatus($database,$_SESSION['cust_id']);
	
	if($customer_order_status == "Active" or $customer_order_status == "Processing"){

		header("Location: process.php");
	}
	if($customer_order_status == "Receiving"){
		header("Location: process.php");
	}
	// if($customer_order_status == "Inactive" || $customer_order_status == ""){
	// 	header("Location: index.php");
		
	
	// }
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title>Welcome</title>
</head>

<style type="text/css">
	.floating-cart-btn{
		display: flex;
		width: 100%;
		height: 40px;
		/*background-color: red;*/
		justify-content: safe flex-end;
		position: sticky;
		bottom: 0;
		padding-bottom: 20px;
	}
		
</style>

<body>
	<script type="text/javascript">
		$.post("get_current_cart.php",{post_id: 1},function(data){
			// alert(data);
			$("#cart-counter").html(data);
		});
	</script>

	<!-- Nav-bar -->
	<?php include("nav-bar.php");?>
	<!-- Content -->
	<?php include("body.php");?>
	<!-- Footer -->
	

</body>
</html>