<?php

	// session_start();

	// if(isset($_SESSION['username']) == NULL){
	// 	header("Location: login.php");
	// }

	include("Config.php");
	include("functions.php");

	if(isset($_POST['register'])){
		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$address = $_POST['address'];
		$province = $_POST['province'];
		$city = $_POST['city'];
		$barangay = $_POST['barangay'];
		$rider_loc = $_POST['rider_loc'];
		$mobile = $_POST['mobile'];
		$vehicle = $_POST['veh-type'];

		AddRider($database,$fullname,$username,$password,$address,$mobile,$vehicle,$province,$city,$barangay,$rider_loc);
		// input validations

		$ErrorMessage = "Register Success";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
	<title>Rider Registration</title>
</head>
<style type="text/css">
		.lbl-what{
			text-align: center;
			color: black;
		}
		h3{
			text-align:center; 
			color: red;
		}
		body {font-family: "Helvetica";display: flex;flex-direction: column;align-items: center ;padding-top: 30px;}
		form {border: 3px solid #f1f1f1;width: 40%; justify-content: center;}
		input[type=text], input[type=password] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
		}
		
		.pasuyoLogo {
			text-align: center;
			margin: 24px 0 12px 0;
		}
		img.logo {
			width: 90%;
		}
	
		.btn {
			width: 100%;
			background-color: #18829C;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			cursor: pointer;
		}
		.cancel {
			width: auto;
			padding: 10px 18px;
			background-color: #c03a3a;
		}
		.container {
			padding: 16px;
		}
		span.forgotPassword {
			float: right;
			padding-top: 16px;
		}
		@media screen and (max-width: 500px) {
			span.forgotPassword {
				display: block;
				float: none;
			}
			.cancel {
				width: 100%;
			}
			body {font-family: "Helvetica";padding-top: 70px;}
			form {border: 3px solid #f1f1f1; width: 100%;}
			}
		}
		
	</style>
<body>
	<form method="post">
		<div class="pasuyoLogo">
			<img src="img/logo.svg" class="logo">
		</div>
		<h3 class="lbl-what">Rider Registration</h3>
		<h3>
			
			<?php global $ErrorMessage; echo $ErrorMessage; ?>
		</h3>
		<div class="container">
			<label for="username"><b>Full Name</b></label>
			<input type="text" placeholder="First Name Last Name" name="fullname" required>

			<label for="username"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required>

			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required>

			<label for="password"><b>Address</b></label>
			<input type="text" placeholder="Street / House No. / Brgy. / City" name="address" required>
			
			<label for="password"><b>Province</b></label>
			<input type="text" placeholder="Province" name="province" required>
			
			<label for="password"><b>City</b></label>
			<input type="text" placeholder="City" name="city" required>
			
			<label for="password"><b>Barangay</b></label>
			<input type="text" placeholder="Barangay" name="barangay" required>

			<label for="password"><b>Mobile Number</b></label>
			<input type="text" placeholder="11-Digit" name="mobile" required>

			<label for="password"><b>Vehicle Type</b></label>
			<input type="text" placeholder="Bike/Single Motor/Tricyle" name="veh-type" required>
			
			<label for="password"><b>Location Link</b></label>
			<input type="text" placeholder="Google Map Link Paste Here" name="rider_loc" required>
			
			<input class="btn" type="submit" name="register" value="Register">
			<input class="btn" type="submit" onclick="window.location.href='https://www.pasuyo.store/PasuyoBeta/RiderLogin.php';" value="Login">
		</div>
	</form>

</body>
</html>