<?php 
	
	session_start();

	include("config.php");
	include("main-functions.php");

	if(isset($_SESSION['rider_id']) != NULL){
		$loginMessage = "Welcome ".$_SESSION['rider_username'];
	}
	else{
		header("Location: RiderLogin.php");
	}

	$rider_status = ReturnARiderStatus($database);
	$cust_id = ReturnACustomerIDFromTableRider($database);
	$_SESSION['cust_id'] = $cust_id;

	// //put the validation if there is a assigned rider in the customer
	// $validation = ReturnIfThereISAssignedRider($database);
	// if($validation == "Not Available"){
	// 	header("Location: Taken.php");
	// }else{
	// 	
	// }

	$rider_name = ReturnNameOftheRider($database);
	SetRiderAssignedInTableCustomer($database,$rider_name,$cust_id);
	

	if(isset($_POST['prod_na'])){
		SetProductNotAvailableFromTableOnProcess($database,$_POST['get_prod_id']);
	}
	if(isset($_POST['prod_a'])){
		SetProductAvailableFromTableOnProcess($database,$_POST['get_prod_id']);
	}
	if(isset($_POST['canceled'])){
		RefreshStatusOfTheRider($database);
		DeleteOrdersOfCustomerInTableOnProcess($database,$cust_id);
		DeleteCartItemsWhenReceived($database);
		SetCustomerAssignedRiderToNull($database,$cust_id);
		header("Location: Rider Homepage.php");
	}
	
	if(isset($_POST['return'])){
		RefreshStatusOfTheRider($database);
		DeleteOrdersOfCustomerInTableOnProcess($database,$cust_id);
		DeleteCartItemsWhenReceived($database);
		Set_Order_Status($database,"Inactive");
		header("Location: Rider Homepage.php");
		// unset($_SESSION['cust_id']);
	}

	$order_id = ProcessOrders($database);
	$order_num = DisplayOrderNum($database);
	$date_stamp = DisplayDateOrdered($database);
	$cust_name = ReturnCustomerName($database);
	$cust_address = ReturnCustomerAddress($database);
	$cust_mobile = ReturnCustomerMobileNumber($database);
	$location = ReturnLocationLink($database);


	if($rider_status == NULL){
		header("Location: Rider Homepage.php");
	}
	
	$customer_order_status = CustomerOrderStatus($database,$cust_id);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title></title>
</head>
<style type="text/css">
	body{
		font-family: Open Sans;
		display: flex;
		justify-content: center;
		/*background-image: url("img/brpasuyo.png");*/
  		background-repeat: repeat;
	}
	.paper{
		display: flex;
		flex-direction: column;
		width: 360px;
		min-height: 150px;
		background-color: rgb(247, 247, 247);
		background-image: url("img/brpasuyo.png");
  		background-repeat: repeat;
	}
	h3{
		text-align: center;
	}
	.heading{
		display: flex;
		justify-content: space-evenly;
		font-size: 13px;
	}
	.line{
		text-align: center;
	}
	.Available{
		display: flex;
		width: 100%;
		font-size: 12px;
		margin-top: 3px;
		margin-bottom: 3px;

	}
	.Not-Available{
		display: flex;
		width: 100%;
		font-size: 12px;
		margin-top: 3px;
		margin-bottom: 3px;
		text-decoration: line-through;
		text-decoration-color: rgb(0, 0, 0, 0.5);
	}
	.header-box{
		display: flex;
		width: 100%;
		font-size: 12px;
		font-weight: bold;
		margin-bottom: 10px;
	}
	.total-box{
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
		font-size: 22px;
		font-weight: bold;
		margin-top: 10px;
		margin-bottom: 5px;
		background-color: rgb(255, 227, 0, 0.8);

	}
	.prod_name{
		display: flex;
		flex-wrap: wrap;
		width: 30%;
		margin-left: 5%;
		margin-right: 5%;
	}
	.prod_price{
		display: flex;
		width: 15%;
	}
	.prod_qty{
		display: flex;
		width: 15%;
	}
	.total{
		display: flex;
		width: 15%;
		margin-right: 5%;
	}
	.lbl-total{
		display: flex;
		width: 25%;
		margin-right: 5%;
	}
	.lbl_name{
		display: flex;
		flex-wrap: wrap;
		width: 40%;
		margin-left: 5%;
		margin-right: 5%;
		justify-content: safe flex-end;
	}
	.lbl_name,.lbl-total{
		font-size: 17px;
	}
	.thanks{
		text-align: center;
		font-size: 15px;
		margin-bottom: 5px;
	}
	.contact{
		text-align: center;
		font-size: 10px;
		margin-bottom: 5px;
		font-style: italic;
	}
	h3{
		margin-bottom: 4px;
	}
	.note-box{
		text-align: center;
		font-size: 13px;
		font-style: italic;
		padding-left: 5px;
		padding-right: 5px;
		margin-bottom: 20px;
	}
	.btn-action{
		padding-top: 8px;
		padding-bottom: 8px;
		margin-top: 5px;
		position: sticky;
		width: 100%;
	}
	@page{
		size: 3.5in auto;;
	}
	@media print{
		body{
			visibility: hidden;
		}
		.paper{
			visibility: visible;
		}
		.btn-action{
			visibility: hidden;
		}
	}
	form{
		display: flex;
		width: 100%;
	}
	.checkbox{
		width: 5%;
		display: flex;
	}
	.prod_na,.prod_a{
		width: 2.5%;
		height: 15px;
		font-size: auto;
		text-align: center;
		color: white;
	}
	.prod_na{
		background-color: red;
	}
	.prod_a{
		background-color: green;
	}
	.processing{
		width: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
		color: white;
		background-color: red;
	}
	.canceled-box{
		display: flex;
		width: 100%;
		flex-direction: column;
	}
</style>
<body>
	<div class="paper">
		<h3><?php echo $cust_name;?></h3>
		<label class="thanks"><?php echo $cust_mobile;?></label>
		<label class="contact"><?php echo $cust_address;
		echo "
					<a href='".$location."'>
						<input type='submit' name='location' value='Locate'>
					</a>
				";
	?></label>
		<label class="line">------------------------------------------------------</label>
		<div class="heading">
			<label><strong>S.C: </strong>N/A</label>
			<label><strong>D&T: </strong><?php echo $date_stamp;?></label>
		</div>
		<label class="line">------------------------------------------------------</label>
		<div class="header-box">
			<div class="checkbox"></div>
			<label class="prod_name">Product Name</label>
			<label class="prod_price">Price</label>
			<label class="prod_qty">Qty</label>
			<label class="total">Total</label>
			
		</div>
		<?php
			if ($customer_order_status == "Delivered"){
				$total = DisplayItemsInReceipt($database);
			}else{
				$total = DisplayItemsReceiptWhereACCEPTED($database,$cust_id);
			}
			
		?>
		<label class="line">------------------------------------------------------</label>
		<div class="total-box">
			Total: <?php echo number_format($total); ?>
		</div>
		<label class="line">------------------------------------------------------</label>
		<div class="note-box">
			<?php  

				global $return;
				if($customer_order_status == "Delivered"){
					echo $return;
				}
				else{
					
					echo "*You can press the red box if the product is not available and green if you want to set the product to available*";
				}

			?>
			
		</div>
		
		<form method="post" style="width:100%; height:auto;">
		<?php

			if(isset($_POST['submit_sc'])){
				$input_serial_code = $_POST['get_sc'];
				$return = VerifySerialCode($database,$input_serial_code,$cust_id);
				header("Location: Accepted.php");
				header("Location: Accepted.php");
				// if($return === "Success"){
				// 	Set_Order_Status($database,"Delivered");
				// }
			}
			if($customer_order_status === "Delivered"){
				echo "
				<input class='btn-action' type='submit' name='return' value='Return'>";
			}
			if($customer_order_status === "Inactive"){
				echo "
				<div class='canceled-box'>
					<div class='processing'>
			 			<h2>CANCELED ORDER</h2>
					</div>
					<input class='btn-action' type='submit' name='canceled' value='Return'>
				</div>
				
				";
			}
			if($customer_order_status === "Processing"){
				echo "
				<input class='btn-action' type='text' name='get_sc' placeholder='Enter Serial Code'>
				<input class='btn-action' type='submit' name='submit_sc' value='Verify Code'>";
			}
			if($customer_order_status === "Receiving"){
				echo "
					<div class='processing'>
			 			<h2>Waiting to receive</h2>
					</div>";
			}
	
		?>
		</form>
		
		
	</div>
</body>
</html>