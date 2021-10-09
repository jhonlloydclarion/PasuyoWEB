
<?php  
	
	session_start();

	include("config.php");
	include ("main-functions.php");
	

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$return = FindRiderInDB($database,$username,$password);
		echo $return;
		if($return == False){
			$ErrorMessage = "Please Try Again!";

		}
		else{
			$_SESSION['rider_id'] = $return;
			$_SESSION['rider_username'] = $username;
			
			$check_activated = Rider_CheckIfActivatedAccount($database);

			if($check_activated == True){
				header("Location: Rider Homepage.php");
			}
			else{
				session_destroy();
				header("Location: NotActivatedPortal.php");
							}
			
		}
		
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<meta charset="utf-8">
	<title>Rider Login</title>
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
	</style>
<body>
	<form method="post">
		<div class="pasuyoLogo">
			<img src="img/logo.svg" class="logo">
		</div>
		<h2 style="text-align: center;">Rider Login</h2>
		<h3 style="text-align:center; color: red;">
			<?php global $ErrorMessage; echo $ErrorMessage; ?>
		</h3>
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