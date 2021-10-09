
<?php  

	session_start();

	include("Config.php");

	include ("functions.php");

	if(isset($_POST['cust-reg'])){
		$username = $_POST['username'];
		$password = $_POST['password'];


		$session_id = FindAccountAdmin($database,$username,$password);

		if($session_id == False){
			$ErrorMessage = "Please Try Again!";
		}
		else{

			$_SESSION['username'] = $username;
			header("Location: CustReg.php");
		}
		
	}

	if(isset($_POST['prod-reg'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$session_id = FindAccountAdmin($database,$username,$password);

		if($session_id == False){
			$ErrorMessage = "Please Try Again!";
		}
		else{

			$_SESSION['username'] = $username;
			header("Location: ProductReg.php");
		}
		
	}


?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
	<title>Login Page</title>
</head>
<body>

	<style type="text/css">
		
		form{
			display: flex;
			flex-direction: column;
			width: 40%;
		}
		body{
			display: flex;
			justify-content: center;
			font-family: Arial,Helvetica;
		}
		input{
			margin-top: 20px;
			margin-bottom: 10px;
			padding: 5px;
		}
		h2{
			text-align: center;
		}
	</style>

	<form method="post">
		<h2><?php global $ErrorMessage; echo $ErrorMessage; ?></h2>
		<label>Username</label>
		<input type="" name="username">
		<label>Password</label>
		<input type="password" name="password">
		<input type="submit" name="cust-reg" value="Login Register Customer">
		<input type="submit" name="prod-reg" value="Login Register Product">
	</form>

</body>
</html>