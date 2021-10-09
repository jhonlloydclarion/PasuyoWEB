<?php  

function ConnectionDB($database_name){
	$servername = "localhost";
    $user = "pasuyos1_jhonlloydc";
    $password = "Jhon12!@Jhon12!@";

    // $user = "root";
    // $password = "";
    $database = $database_name;

    //create connection
    $conn = new mysqli($servername,$user,$password,$database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function FindAccountAdmin($database,$username,$password){

	$conn = ConnectionDB($database);

	$sql = "SELECT * FROM admins WHERE admin_username='".$username."' AND admin_password='".$password."';";

	$results = mysqli_query($conn,$sql);

    $resultchecks = mysqli_num_rows($results);

    if($resultchecks>0){
    	$roww = mysqli_fetch_array($results);

    	if(($roww['active_status']) == "active"){
    		return True;
    	}
    	else{
    		return False;	
    	}
    }
    else{
    	return False;
    }

}


function AddCustomer($database,$fullname,$mobile,$username,$password,$address,$housenum,$brgy,$city,$province,$location){

		$conn = ConnectionDB($database);
        
		$sql = "INSERT INTO customer (reg_status, cust_name, cust_address, cust_housenum, cust_brgy, cust_city, cust_province, cust_mobile, cust_username, cust_password, loc_link) VALUES ('Not Activated', '".$fullname."', '".$address."', '".$housenum."', '".$brgy."', '".$city."', '".$province."', ".$mobile.", '".$username."', '".$password."', '".$location."');";
		$conn->query($sql);
		return $fullname." added";
}

function AddProduct($database,$name,$prod_price,$prod_img,$prod_category){

		$conn = ConnectionDB($database);
		$sql = "INSERT INTO product(prod_name, prod_price, prod_img, prod_category, prod_qty) VALUES ('".$name."',".$prod_price.",'".$prod_img."','".$prod_category."',0);";
		$conn->query($sql);

        if($name == ""){
            return "No Item Added";
        }else{
            return $name." added";    
        }
		
}
function AddRider($database,$fullname,$username,$password,$address,$mobile,$vehicle,$province,$city,$barangay,$rider_loc){

        $conn = ConnectionDB($database);
        $sql = "INSERT INTO rider (reg_status,rider_username, rider_password, rider_name, rider_mobile, rider_vehicle, rider_address, rider_province, rider_city, rider_barangay, rider_loc) VALUES ('Not Activated','".$username."','".$password."','".$fullname."',".$mobile.", '".$vehicle."', '".$address."','".$province."','".$city."','".$barangay."','".$rider_loc."');";
        $conn->query($sql);


}

?>