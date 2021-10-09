<?php  

$servername = "localhost";
$user = "root";
$password = "";
$database = "checkouts";

//create connection
$conn = new mysqli($servername,$user,$password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function qty(){
	global $conn;

	$sql = "SELECT * FROM userabc";
    $results = mysqli_query($conn,$sql);

    $resultchecks = mysqli_num_rows($results);
    if ($resultchecks>0){
        while ($roww = mysqli_fetch_array($results)){
            $qty = $roww["qty"];
            $Item = $roww["Item"];

            $add = "add";
            $minus = "minus";

            echo "<div>";
            echo "<input type='hidden' name='item' value='".$Item."'>";
            echo "	<input type='submit' name='".$minus."' value='-' onclick='<?php update(".$Item.");?>'>";
            echo "		<input type='number' id='quantity' name='quantity' min='".$qty."' max='5'>";
            echo "	<input type='submit' name='".$Item."' value='+' onclick='<?php update(".$Item.");?>'>";
           	echo "</div>";
        }
	}
}

function update($Item){
	global $conn;
	//get the value first
	$first_sql = "SELECT * FROM userabc WHERE Item='".$Item."'";
    $results = mysqli_query($conn,$first_sql);

    $resultchecks = mysqli_num_rows($results);
    $roww = mysqli_fetch_array($results);
    //store the currenty quantity
    $qty = $roww["qty"];
    $new_qty = (int)$qty + 5;

	// update portion
	$sql_update = "UPDATE userabc SET qty=".$new_qty." WHERE Item='".$Item."'";
	$results = mysqli_query($conn,$sql_update);

	echo "$qty";

}


?>

<div>
		
			
			<div style="display: flex; flex-direction: column;">
			<?php qty();?>
			</div>
			
	
		
		
</div>