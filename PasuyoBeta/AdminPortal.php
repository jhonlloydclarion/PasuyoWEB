<?php


	session_start();

	include("config.php");
	include ("main-functions.php");

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];


		$session_id = FindAccountAdmin($database,$username,$password);

		if($session_id == False){
			$ErrorMessage = "Please Try Again!";
		}
		else{

			$_SESSION['admin'] = $username;
			header("Location: Gateway.php");
		}
		
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
	<title>Admin Portal</title>
</head>
<style type="text/css">
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
		@media screen and (max-width: 599px) {
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
	</style>
<body>
	<form method="post">
		<div class="pasuyoLogo">
			<img src="img/logo.svg" class="logo">
		</div>
		<h3 style="text-align:center; color: red;">
			<?php global $ErrorMessage; echo $ErrorMessage; ?>
		</h3>
		<h4 style="text-align: center; color: black;">Admin Login</h4>
		<div class="container">
			<label for="username"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required>

			<label for="password"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" required>
			<input class="btn" type="submit" name="login" value="Login">
			
		</div>
	</form>

</body>
</html>