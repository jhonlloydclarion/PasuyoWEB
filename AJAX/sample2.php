<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title>Sample 2</title>
</head>
<!-- 	
$(document).ready(function(){
	  	$('#sub-box input').click(function(){
	  		
	  	});
	}); -->
<script type="text/javascript">


	$(function) GETID(id){
	
	    alert(id);
	}
</script>
<body>
	<p id="o">asdadsa</p>

	<input id="p" type="submit" name="p">
	<div id="box">
		<div id="sub-box">
			<input id="btn" type="submit" name="" value="111" onclick="GETID(this.id)">
		</div>

		<div id="sub-box">
			<input id="btn" type="submit" name="" value="222" onclick="GETID(this.id)">
		</div>

		<div id="sub-box">
			
		</div>
	</div>
</body>
</html>