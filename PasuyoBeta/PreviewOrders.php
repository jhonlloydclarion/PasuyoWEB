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

	$cust_id = ReturnAViewingIDFromTableRider($database);

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
		width: 300px;
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
		width: 40%;
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
</style>
<body>
	<div class="paper">
		<h3>PREVIEW OF ORDER</h3>
		<label class="thanks">xxxxxxxxxxxxxxxxx</label>
		<label class="contact">09090350890 / helppasuyo@gmail</label>
		<label class="line">------------------------------------------------------</label>
		<div class="heading">
			<label><strong>xxxxxxx</strong>xxxxxxx</label>
			<label><strong>xxxxxxxx</strong>xxxxxxx</label>
		</div>
		<label class="line">------------------------------------------------------</label>
		<div class="header-box">
			<label class="prod_name">Product Name</label>
			<label class="prod_price">Price</label>
			<label class="prod_qty">Qty</label>
			<label class="total">Total</label>
		</div>
		<?php

			$total = OrderPreviewRequestedBYRider($database,$cust_id);
		?>
		<label class="line">------------------------------------------------------</label>
		<div class="total-box">
			Total: <?php echo number_format($total); ?>
		</div>
		<label class="line">------------------------------------------------------</label>
		<div class="note-box">
			*This is the pre view of the customer order*
		</div>
		
		<form method="post" style="width:100%; height:auto;">

		</form>
		<a href="Rider Homepage.php">
			<input style="width:100%; padding-top:10px;padding-bottom: 10px;" type="submit" name="" value="Back">
		</a>
		
	</div>
</body>
</html>