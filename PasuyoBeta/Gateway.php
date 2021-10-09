<?php
	
	session_start();

	include("config.php");
	include ("main-functions.php");

	if(isset($_SESSION['admin']) != NULL){
		$loginMessage = "Welcome ".$_SESSION['admin'];
	}
	else{
		header("Location: AdminPortal.php");
	}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title>Ops!</title>
</head>
<style type="text/css">
	body{
		margin: 0px;
		font-family: Arial;
		display: flex;
		flex-direction: column;
		width: 100%;
		height: 100%;
		/*align-items: center;*/
		/*align-content: center;
		justify-content: center;*/
	}
	.header{
		display: flex;
		width: 100%;
		padding-top: 20px;
		padding-bottom: 20px;
		background-color: #202020;
		color: white;
		justify-content: center;
	}
	.body{
		display: flex;
		width: 100%;
		height: 80%;
		margin-top: 200px;
		
		justify-content: center;
		text-align: bottom;
		font-size: 32px;
	}
	.footer{	
		display: flex;
		width: 100%;
		padding-top: 20px;
		padding-bottom: 20px;
		background-color: #202020;
		color: white;
		justify-content: center;
		position: fixed;
		bottom: 0;
	}
	.h-lbl{
		font-size: 22px;
		margin: 0px;
	}
	.goback{
		width: 90%;
		padding-top: 10px;
		padding-bottom: 10px;
	}
</style>
<body>
	<div class="header">
		<label class="h-lbl">OPS!</label>
	</div>
	<div class="body">
		<a href="https://www.pasuyo.store/PasuyoBeta/CustomerApplication.php">
			<input  type="submit" name="" value="Customer Application">
		</a>
		<a href="https://www.pasuyo.store/PasuyoBeta/RiderApplication.php">
			<input  type="submit" name="" value="Rider Application">
		</a>
	</div>
	<form method="post" class="footer" href="Rider Homepage.php">
		<input class="goback" type="submit" name="back" value="Go Back">
	</form>
		

</body>
</html>