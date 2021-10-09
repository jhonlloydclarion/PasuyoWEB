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
	$rider_name = ReturnNameOftheRider($database);
	$rider_stat = ReturnARiderStatus($database);
	

	if($rider_stat == "Booked"){
		header("Location: Accepted.php");
	}

	// Display onprocess table using cust_id  in table customer
	
	if(isset($_POST['vieworder'])){

		$cust_id = $_POST['getid'];
		SetRiderViewingStatus($database,$cust_id);
		header("Location: PreviewOrders.php");		
	}
	if(isset($_POST['accepted'])){
		$cust_id = $_POST['getid'];

		$validation = CheckIfAlreadyAcceptedByOtherRider($database,$cust_id);
		if($validation == "Exist"){
			header("Location: Rider Homepage.php");
		}
		else{
			SetRiderStatustoBOOKED($database,$cust_id);
			SetCustomerOrderStatusProcessing($database,$cust_id);
		
			header("Location: Accepted.php");
		}
		
	}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title>Rider Homepage</title>
</head>
<style type="text/css">
	body{
		display: flex;
		justify-content: center;
		align-items: center;
		font-family: Arial;
		padding-top: 30px;
		padding-bottom: 60px;
	}
	.list-holder{
		display: flex;
		flex-direction: column;
		width: 350px;
		justify-content: center;
		align-items: center;
	}
	.box-holder{
		display: flex;
		flex-direction: column;
		width: 300px;
		height: 200px;
		background-color: #202020;
		padding: 5%;
		margin-top: 5px;
		margin-bottom: 5px;
		border-radius: 10px;
	}
	.lbl-name,.lbl-address,.amount-details{
		margin-bottom: 5%;
		color: white;
	}
	.action-box{
		display: flex;
	}
	.amount-details{
		display: flex;
	}
	.btn-accept,.btn-view-orders{
		width: 50%;
		padding-top: 5px;
		padding-bottom: 5px;
	}
	.lbl-amount,.lbl-shipping{
		width: 50%;
		color: white;
	}
	.btn-locate{
		padding-top: 5px;
		padding-bottom: 5px;
	}
	.info-bot-box{
		display: flex;
		width: 100%;
		justify-content: space-evenly;
		position: fixed;
		bottom: 0;
		padding-top: 10px;
		padding-bottom: 10px;
		background-color: #202020;
		color: white;
	}
	.info-bot-top{
		display: flex;
		width: 100%;
		justify-content: space-evenly;
		position: fixed;
		top: 0;
		padding-top: 10px;
		padding-bottom: 10px;
		background-color: #202020;
		color: white;
	}
	.onque,.refresh{
		margin-left: 10px;
		margin-right: 10px;
	}
	.refresh{
		width: 250px;
		padding-left: 15px;
		padding-right: 15px;
		padding-top: 5px;
		padding-bottom: 5px;
	}

</style>
<script type="text/javascript">

	$(document).ready(function(){
		setInternval(function(){
			$("#list").load("ajax-display-available-customer.php");
			refresh();
		}, 10000)
	});
	
</script>

<body>
	<div id="list" class="list-holder">
		<!-- <div class="box-holder">
			<label class="lbl-name">Name: Jhon Lloyd Clarion</label>
			<label class="lbl-address">Address: B1 L24 Multiland IV San Isidro Cabuyao Laguna</label>
			<div class="amount-details">
				<label class="lbl-amount">Amount: 5,403</label>
				<label class="lbl-shipping">Shipping: 50</label>
			</div>
			
			<div class="action-box">
				<input class="btn-accept" type="submit" name="" value="Accept">
				<input class="btn-view-orders" type="submit" name="" value="View Orders">
			</div>
			<input class="btn-locate" type="submit" name="" value="Locate">
		</div> -->
		<?php
			global $database;
			//get rider city
			$rider_city = GetRiderCity($database);
			$num_waiting = DisplayCustomerStatusActive($database,$rider_city);
			if($num_waiting == 0){
				echo "
					<div class='info-bot-top'>
						<label class='onque'>Waiting.. Just Refresh ".$rider_name."</label>
					</div>
				";
			}
			else{
				echo "
					<div class='info-bot-top'>
						<label class='onque'>ON QUE: ".$num_waiting."</label>
					</div>
				";
			}
		?>
		
		<div class="info-bot-box">
			<a href="Rider Homepage.php">
				<input class="refresh" type="submit" name="" value="Refresh">
			</a>
		</div>
	</div>
</body>


</html>