<?php  


	$servername = "localhost";
	$user = "root";
	$password = "";
	$database = "method_1";

	//Create Connection
	$conn = new mysqli($servername,$user,$password,$database);

	// Check connection
	if ($conn->connect_error){
		die("Connection Failed: ". $conn->connect_error);
	}



?>