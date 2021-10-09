<style type="text/css">
	.box{
		display: flex;
	}
</style>

<?php
	function addcart($id){

		$servername = "localhost";
	    $user = "root";
	    $password = "";
	    $database = "displayprod";

	    //create connection
	    $conn = new mysqli($servername,$user,$password,$database);

	    // Check connection
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }

	    $sql = "SELECT * FROM pantry WHERE id=".$id."";
	    $results = mysqli_query($conn,$sql);



	    $roww = mysqli_fetch_array($results);

	    $sql_insert = " INSERT INTO cart (title, price) VALUES ('".$roww['title']."',".$roww['price'].");";
		$results = mysqli_query($conn,$sql_insert);

	}

	if (isset($_POST['id'])){

		$val = $_POST['id'];
		echo "$val";
		addcart($val);
	}



	$servername = "localhost";
    $user = "root";
    $password = "";
    $database = "displayprod";

    //create connection
    $conn = new mysqli($servername,$user,$password,$database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    	$sql = "SELECT * FROM pantry";
	    $results = mysqli_query($conn,$sql);

	    $resultchecks = mysqli_num_rows($results);
	    if ($resultchecks>0){
	        while ($roww = mysqli_fetch_array($results)){

	        	echo "
						<form action='addcart.php' method='post'>
							<div class=box'>
								<input type='hidden' name='id' value='".$roww['id']."'>
								<label>".$roww['title']." </label>
								<label>".$roww['price']." </label>
								<input type='submit' name=''>
							</div>
						</form>
						";

	        }
	    }
?>
