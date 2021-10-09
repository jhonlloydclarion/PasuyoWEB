<?php  
	session_start();

	if(isset($_SESSION['username']) != NULL){
		$loginMessage = "Welcome ".$_SESSION['username'];
	}
	else{
		header("Location: login.php");
	}

	include("config.php");
	include("main-functions.php");

	if(isset($_POST['post_id'])){

		// $id = $_POST['post_id'];
		// AddCart($database,$id)

		$num_cart = CartCounter($database);
		echo $num_cart;
		// echo $name;d
	}

?>