<?php

	if(isset($_POST['btn'])){
		$id = $_POST['id'];

		echo $id;
	}
?>

<!DOCTYPE html>
<html>

<head>
	<title>
		How to Define jQuery function ?
	</title>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>



<body style="text-align:center">

	<h1 style="color:green;">
		GeeksforGeeks
	</h1>
	<h3>
		Defining function in jQuery
	</h3>
	
	<p id="geeks"> asdasdas dsa</p>
	<p id="9090"> HIDE THIS</p>

		<input type="" name="id" value="111">
		<input id="aaa" type="submit" name="btn" onclick="GETID(this.id)">


		<input id="123123" type="hidden" name="" value="123123123">
		<input type="" name="id" value="222">
		<input id="bbb" type="submit" name="btn">

<script>


		function GETID(id){
			alert(id);
		}
		$(document).ready(function(){
			var setid = "#" + id;
		  	$(setid).click(function(){
		  		var test = document.getElementById('123123').val();
		    	$("#geeks").hide();
		    	$("#9090").text(id);
		  	});
		
</script>

</body>

</html>		
