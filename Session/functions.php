<?php  


function ConnectionDB($database_name){
	$servername = "localhost";
    $user = "root";
    $password = "";
    $database = $database_name;

    //create connection
    $conn = new mysqli($servername,$user,$password,$database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function FindAccount($database,$username,$password){

	$conn = ConnectionDB($database);

	$sql = "SELECT * FROM customer WHERE cust_username='".$username."' and cust_password='".$password."';";

	$results = mysqli_query($conn,$sql);

    $resultchecks = mysqli_num_rows($results);

    if($resultchecks>0){
    	$roww = mysqli_fetch_array($results);
    	return True;
    }
    else{
    	return False;
    }

}























?>