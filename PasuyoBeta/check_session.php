<?php  

	session_start();

	if(isset($_SESSION['username']) != NULL){
		$loginMessage = "Welcome ".$_SESSION['username'];
	}
	else{
		header("Location: login.php");
	}

	if(isset($_POST['logout'])){
		session_destroy();

		header("Location: login.php");
	}


?>