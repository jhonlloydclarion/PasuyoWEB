<?php
	$servername = "localhost";
	$user = "root";
	$password = "";
	$database = "displayprod";

	//create connection
	$conn = new mysqli($servername,$user,$password,$database);
?>


<style type="text/css">
	table{
		text-align: left;

	}


</style>

<table width="100%" border="2">
		<tr style='margin-bottom: 50px;'>
			<th>Title</th>
			<th>Price</th>
			<th>Qty</th>
			<th>Total</th>
		</tr>
<?php  
	
	function add($id){
		global $conn;

		$first_sql = "SELECT * FROM bread WHERE id=".$id."";
	    $results = mysqli_query($conn,$first_sql);

	    $roww = mysqli_fetch_array($results);

	    $new_qty = $roww['qty'] + 1;

	    // update portion
		$sql_update = "UPDATE bread SET qty=".$new_qty." WHERE id=".$id."";
		$results = mysqli_query($conn,$sql_update);

		echo "$new_qty";
	}

	function minus($id){
		global $conn;

		$first_sql = "SELECT * FROM bread WHERE id=".$id."";
	    $results = mysqli_query($conn,$first_sql);

	    $roww = mysqli_fetch_array($results);

	    $new_qty = $roww['qty'] - 1;

	    // update portion
		$sql_update = "UPDATE bread SET qty=".$new_qty." WHERE id=".$id."";
		$results = mysqli_query($conn,$sql_update);
	}
	
	if (isset($_POST['add'])){
		$id = $_POST['id'];
		echo "$id";
		add($id);
	}

	if (isset($_POST['minus'])){
		$id = $_POST['id'];
		echo "$id";
		minus($id);
	}

	

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    	$sql = "SELECT * FROM bread";
	    $results = mysqli_query($conn,$sql);

	    $resultchecks = mysqli_num_rows($results);
	    if ($resultchecks>0){
	        while ($roww = mysqli_fetch_array($results)){

	        	$total = $roww['qty'] * $roww['price'];
	        	echo "				
								<tr>
									<form class='form' method='post'>
										<td>".$roww['title']."</td>
										<td>P ".$roww['price']."</td>
										<td>
											<input type='hidden' name='id' value='".$roww['id']."'>
											<input type='submit' name='add' value='+'>
											<label>".$roww['qty']."</label>
											<input type='submit' name='minus' value='-'>
										</td>
										<td>".$total."</td>
									</form>
								</tr>					
						";

	        }
	    }


?>
</table>

