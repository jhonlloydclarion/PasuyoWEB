<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<title>Ajax This</title>
</head>
<body>
	<input type="submit" name="" value="1" onclick="Post(this.id);">
	<input id="123" type="submit" name="" value="2" onclick="Post(this.id,this.value);">
	<input id="123" type="submit" name="hey" onclick="Post(this.id,this.name)" value="3">
	<div id="display"></div>

	<script type="text/javascript">

		function Ajax(){
			// Call Ajax
			var ajax = new XMLHttpRequest();
			var method = "GET";
			var url = "data.php";
			var asynchronous = true;

			ajax.open(method, url, asynchronous);
			//sending ajax request
			ajax.send();

			// receiving response from data.php
			ajax.onreadystatechange = function(){
				if (this.readyState == 4 && this.status == 200){
					alert(this.responseText);
				}
			}
		}

		function Post(id,val){

			// var name = $("#bt3").val();
			alert(id);
			alert(val);
			$.post("data.php",{name: id},
				function(data){
					alert(data);
					$("#display").html(data);
			}
			);
		}
		


	</script>
</body>
</html>