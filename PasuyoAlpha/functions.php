<?php  

function numcart($table_name){
    //---------- Connection ---------------//
    $servername = "localhost";
    $user = "root";
    $password = "";
    $database = "jhonlloydc";

    //create connection
    $conn = new mysqli($servername,$user,$password,$database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM ".$table_name."";
    $results = mysqli_query($conn,$sql);

    $resultchecks = mysqli_num_rows($results);

    return $resultchecks;

}
function CheckIfExist($id,$table_name){
	//---------- Connection ---------------//
	$servername = "localhost";
    $user = "root";
    $password = "";
    $database = "jhonlloydc";

    //create connection
    $conn = new mysqli($servername,$user,$password,$database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM ".$table_name." WHERE id=".$id."";
    $results = mysqli_query($conn,$sql);

    $resultchecks = mysqli_num_rows($results);

    if ($resultchecks > 0){
        return True;
    }
    else{
        return False;
    }
}
function displayproducts($category_name,$table_name){

	//---------- Connection ---------------//
	$servername = "localhost";
    $user = "root";
    $password = "";
    $database = "products";

    //create connection
    $conn = new mysqli($servername,$user,$password,$database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //---------- Fetch Data ---------------//

    echo "<div class='header-box'>".$category_name."</div>";
	echo "<div class='body-container'>";

    $sql = "SELECT * FROM ".$table_name."";
    $results = mysqli_query($conn,$sql);

    $resultchecks = mysqli_num_rows($results);
    if ($resultchecks>0){
        while ($roww = mysqli_fetch_array($results)){

        	// Temporary Store the value of each in the colum name
        	$id = $roww['id'];
        	$img_path = "img/".$roww['img'];
        	$product_name = $roww['product_name'];
        	$price = $roww['price'];
        	


        	//---------- Display Data ---------------//
			echo "
				<form method='post'>
					<input type='hidden' name='id' value='".$id."'>
					<div class='body-box'>
						<div class='pic-box'>
							<img class='picture' src='".$img_path."'>
						</div>
						<div class='sub-box'>
							<div class='top-box'>
								<label class='title'>
									".$product_name."
								</label>
							</div>
							<div class='bot-box'>
								<div class='p-box'>
									<label>P ".$price."</label>
								</div>
								<div class='s-box'>
									Sale!
								</div>			
							</div>
							<div class='remove-box'>
								<input class='remove-btn' type='submit' name='addcart' value='Add to cart'>
							</div>
						</div>	
					</div>
				</form>";
		}
	}
	echo "</div>";
}

function AddCart($database_name,$table_name,$id){

	//---------- Connection ---------------//
	$servername = "localhost";
    $user = "root";
    $password = "";
    $database = "products"; //Read data from first database
    $database_for_insert = $database_name;

    //create connection
    $conn = new mysqli($servername,$user,$password,$database);
    $conn_for_insert = new mysqli($servername,$user,$password,$database_for_insert);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($conn_for_insert->connect_error) {
        die("Connection failed: " . $conn_for_insert->connect_error);
    }

    //---------- Fetch Data ---------------//

    $sql = "SELECT * FROM sale WHERE id=".$id."";
    $results = mysqli_query($conn,$sql);

    //---------- Get the 1 result Data ---------------//
    // $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);

    // return a true or false if the product is exist in the data
    $prod_exist = CheckIfExist($id,$table_name);


    if ($prod_exist == True){


        $cart_sql = "SELECT * FROM ".$table_name." WHERE id=".$id."";
        $results = mysqli_query($conn_for_insert,$cart_sql);

        $resultchecks = mysqli_num_rows($results);
        $roww = mysqli_fetch_array($results);

        $new_qty = $roww['qty'] + 1;
      
        $sql_update = "UPDATE ".$table_name." SET qty=".$new_qty." WHERE id=".$id."";
        $results = mysqli_query($conn_for_insert,$sql_update);


    }else{

        //---------- Insert the data ---------------//
        $sql_insert = "INSERT INTO ".$table_name." (id, img, product_name, price, qty) VALUES (".$roww['id'].", '".$roww['img']."', '".$roww['product_name']."',".$roww['price'].", ".$roww['qty'].");";

        $conn_for_insert->query($sql_insert);
    }

    

}

function insert(){

	//---------- Connection ---------------//
	$servername = "localhost";
    $user = "root";
    $password = "";
    $database = "jhonlloydc";

    //create connection
    $conn = new mysqli($servername,$user,$password,$database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO cartcontent (id, img, product_name, price, qty) VALUES (1,'pancake.jpg','TANGA',100,1)";
    // $results = mysqli_query($conn,$sql);
    $conn->query($sql);
}








?>