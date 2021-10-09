<?php  
	

	session_start();

	if(isset($_SESSION['username']) == NULL){
		header("Location: login.php");
	}

	include("Config.php");
	include("functions.php");
	

	if (isset($_POST['reg-cust'])){
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$return = AddCustomer($database,$name,$mobile,$username,$password);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title></title>
</head>
<body>

	<style type="text/css">
		
		.form-box{
			display: flex;
			width: auto;
			height: auto;
			background: blue;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding-left: 40px;
			padding-right: 40px;
			padding-bottom: 40px;

			border-radius: 20px;
		}
		body{
			color: white;
			font-family: Arial,Helvetica,Calibri;
		}
		.box{
			display: flex;
			flex-direction: column;
		}
		input{
			padding: 5px;
			border-style: none;
			margin-top: 3px;
			margin-bottom: 7px;
		}

		@media screen and (max-width: 360px) {
		  	.form-box{
				display: flex;
				width: 100%;
				height: 100%;
				align-items: center;
				justify-content: center;
				flex-direction: column;
				padding-left: 40px;
				padding-right: 40px;
				padding-bottom: 40px;

				background-color:red ;
				border-radius: 20px;
			}
			form{
				width: 100%;
				height: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				align-content: center;

			}
			h1{
				font-size: 22px;
				text-align: center;
			}
		}
		form{
			width: 100%;
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
			align-content: center;

		}
	</style>

	<form method="post">
		<div class="form-box">
			<h1>Register Customer</h1>
			<h3><?php echo $loginMessage;?></h3>

			<div class="box">

				<label>Name</label>
				<input type="" name="name">

				<label>Mobile</label>
				<input type="" name="mobile">

				<label>Username</label>
				<input type="" name="username">

				<label>Password</label>
				<input type="" name="password">

				<input type="submit" name="reg-cust" value="Register" style="margin-top: 20px;margin-bottom: 10px; padding-top: 10px;padding-bottom: 10px; font-weight: bold;">

				<label>
					<?php global $return; echo $return; ?>
				</label>
				<input type="submit" name="logout" value="logout">

			</div>
		</div>
	</form>

</body>
</html>