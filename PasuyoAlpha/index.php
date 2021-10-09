<?php

	include("functions.php");

	if(isset($_POST['addcart'])){
		$id = $_POST['id'];
		AddCart("jhonlloydc","cartcontent",$id);
		// insert();
	}

	$cart_value = numcart("cartcontent");


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<title></title>
</head>
<body>
	<!-- Nav-bar -->
	<?php include("nav-bar.php");?>
	<!-- Nav-bar -->

	<!-- Body-Content -->
	<?php include("homepage.php"); ?>
	<!-- Body-Content -->
</body>
</html>

<section>
	

</section>