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
		$new_qty = DecreaseQty($database,$id);

		if($new_qty == 0){
			AddCart($database,$id);
			echo $new_qty + 1;
		}else{
			echo $new_qty;	
		}

		
	}
	else{
		echo "NO POSTED";
	}




?>