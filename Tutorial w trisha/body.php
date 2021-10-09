<?php include("variables.php"); ?>
<?php  


	require ("conn.php");

	if(isset($_POST['submit'])){

		$f_name = $_POST['fname'];
		$l_name = $_POST['lname'];
		$age = $_POST['age'];

		$sql = "INSERT INTO customer (f_name, l_name, age) VALUES ('".$f_name."','".$l_name."',".$age.")";

		$conn->query($sql);
	}



?>
<style type="text/css">
	.box,form{
		width: 350px;
		height: 350px;
		background-color: blue;

		display: flex;
		flex-direction: column;

		justify-content: center;
		
	}
</style>

<div class="box">
	
	<form method="post">
	<label><?php echo $first_Name;?></label>
	<input type="" name="fname">
	<label><?php echo $last_Name;?></label>
	<input type="" name="lname">
	<label><?php echo $Age;?></label>
	<input type="" name="age">
	<input type="submit" name="submit" value="submit">
	</form>
</div>