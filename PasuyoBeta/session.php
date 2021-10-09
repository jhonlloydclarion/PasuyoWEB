<?php 

	session_start();

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$return = FindAccount($database,$username,$password);

		$echo $return[0];
		$echo $return[1];
		if($return[0] == False){
			echo "Please Try Again!";
		}
		else{
			$_SESSION['cust_id'] = $return[1];
			$_SESSION['username'] = $username;
			
			
			header("Location: index.php");
		}
		
	}

?>