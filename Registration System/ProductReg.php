<?php  
	


	session_start();

	if(isset($_SESSION['username']) == NULL){
		header("Location: login.php");
	}
	
	include("Config.php");

	include("functions.php");
	

	if (isset($_POST['reg-prod'])){
		$name = $_POST['name'];
		$price = $_POST['price'];
		$img = $_POST['img'];
		$category = $_POST['category'];
		global $database;
		$return = AddProduct($database,$name,$price,$img,$category);


	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title></title>
</head>
<body>

	<style type="text/css">
		
		.form-box{
			display: flex;
			width: auto;
			height: auto;
			background: yellow;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding-left: 40px;
			padding-right: 40px;
			padding-bottom: 40px;

			border-radius: 20px;
		}
		body{
			color: black;
			display: flex;
			justify-content: center;
			align-items: center;
			align-content: center;

			font-family: Arial,Helvetica,Calibri;
		}
		.box{
			display: flex;
			flex-direction: column;
		}
		input{
			padding: 5px;
			border-style: none;
			margin-top: 3px;
			margin-bottom: 7px;
		}
	</style>

	<div class="form-box">
		<h1>Register Product</h1>
		<h2><?php echo $loginMessage;?></h2>
		
		<form method="post">
		<div class="box">

			<label>Product Name</label>
			<input type="" name="name">

			<label>Price</label>
			<input type="" name="price">

			<label>img</label>
			<input type="" name="img" value=".jpg">

			<label>Category</label>
			<input type="" name="category">

			<input type="submit" name="reg-prod" value="Register" style="margin-top: 20px;margin-bottom: 10px; padding-top: 10px;padding-bottom: 10px; font-weight: bold;">

			<label style="text-align:center;">
				<?php global $return; echo $return; ?>
			</label>
			<input type="submit" name="logout" value="logout">

		</div>
		</form>



	
	

	</div>

</body>
</html>