
<?php  

	session_start();

	$database = "pasuyoalpha";
	include ("functions.php");

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$session_id = FindAccount($database,$username,$password);

		if($session_id == False){
			echo "Please Try Again!";
		}
		else{

			$_SESSION['username'] = $username;
			header("Location: homepage.php");
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

	<form method="post">
		<label>Username</label>
		<input type="" name="username">
		<label>Password</label>
		<input type="password" name="password">
		<input type="submit" name="login" value="Login">
	</form>

</body>
</html>