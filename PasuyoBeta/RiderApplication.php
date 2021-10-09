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

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];


		$session_id = FindAccountAdmin($database,$username,$password);

		if($session_id == False){
			$ErrorMessage = "Please Try Again!";
		}
		else{

			$_SESSION['admin'] = $username;
			header("Location: CustomerApplication.php");
		}
		
	}

	//Activate Customer
	if(isset($_POST['activate'])){
		$id = $_POST['custid'];
		ActivateRider($database,$id);
	}
	if(isset($_POST['deactivate'])){
		$id = $_POST['custid'];
		DeactivateRider($database,$id);
	}
	if(isset($_POST['update'])){
		$id = $_POST['custid'];
		$name = $_POST['name'];
		$city = $_POST['city'];
		$contact = $_POST['number'];
		UpdateRiderInfo($database,$id,$name,$city,$contact);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title>Customer Application</title>
</head>
<style type="text/css">
	body{
		font-family: Arial;
		display: flex;
		overflow-x: scroll;
	}
			table, td, th {
	  border: 1px solid black;
	}

	table {
	  width: 100%;
	  border-collapse: collapse;
	  text-align: left;
	}
	td{

	}


</style>
<body>

	<table>
		<tr>
			<th>Name</th>
			<th>Reg Status</th>
			<th>City</th>
			<th>Contact Number</th>
			<th>Action Box</th>
		</tr>
			<!-- <form method="post">
				<td>
					<input type="text" name="" value="Jhon Lloyd Clarion">
				</td>
				<td>Not Activate</td>
				<td><input type="text" name="" value="Jhon Lloyd Clarion"></td>
				<td><input type="text" name="" value="Jhon Lloyd Clarion"></td>
				<td>
					<input type="submit" name="" value="Activate">
					<input type="submit" name="" value="Deactivate">
					<input type="submit" name="" value="Update">
				</td>
			</form> -->
			<?php
				DisplayRidersINCustomerApplication($database);
			?>
			
	</table>


</body>
</html>