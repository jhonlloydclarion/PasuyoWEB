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

	if(isset($_POST['post_prod'])){

		$id = $_POST['post_prod'];
		$current_qty = QtyCounter($database,$id);

		echo $current_qty;
	}

?>