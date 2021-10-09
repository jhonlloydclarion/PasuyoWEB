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
		}
		
	}

?>