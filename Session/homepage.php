<?php  

	session_start();

	if(isset($_SESSION['username']) != NULL){
		echo "Session Set";
	}
	else{
		header("Location: index.php");
	}

	if(isset($_POST['logout'])){
		session_destroy();

		header("Location: index.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h1>WELCOME</h1>

	<form method="post">
		<input type="submit" name="logout" value="logout">
	</form>
</body>
</html>