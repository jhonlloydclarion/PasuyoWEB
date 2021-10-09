<?php  

	// if(isset($_POST['logout'])){
	// 	session_destroy();
	// 	header("Location: login.php");
	// 

?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" >
<style type="text/css">
		body{
			margin: 0px;
			padding: 0px;
			font-family: Arial;
		}
		.nav-bar{
			display: flex;
			width: 100%;
			height: 70px;
			justify-content: center;
			align-items: center;
			/*background-color: blue;*/
			background-color: #18829C;
			border-bottom: solid;
			border-color: grey;
			border-width: 1px;
			color: white;

		}
		.nav-sub-box-l{
			display: flex;
			width: 40%;
			padding-left: 10%;
			align-items: center;
		}
		.nav-sub-box-r{
			display: flex;
			width: 40%;
			justify-content: flex-end;
			object-fit: cover;
			padding-right: 10%;
		}
		.btn-for-cart{
			display: flex;
			width: 150px;
			height: auto;
			justify-content: center;
			align-items: center;
			border-style: none;
			background-color: rgba(196, 196, 196, 0);
		}
		.cart-btn{
			display: flex;
			width: 80%;
			object-fit: cover;
		}
		.counter-lbl{
			position: absolute;
			color: white;
			font-weight: bold;
			margin-right: 25px;
			margin-bottom: 20px;

			width: 40px;
			height: 10px;
			/*background-color: red;*/
		}
		.username{
			display: flex;
			font-weight: bold;
			font-size: 22px;
			flex-direction: column;
		}
		.user-img-box{
			display: flex;
			width: 50px;
			height: 50px;
			background-color: grey;
			margin-right: 5%;
			border-radius: 100%;
		}
		.logout-btn{
			width: 100px;
			padding: 5px;
			border-style: none;
			font-weight: bold;
			font-size: 12px;
		}

		@media screen and (max-width: 599px) {
			body{
				background-color: red;
			}
		  	.username{
				display: flex;
				font-weight: bold;
				font-size: 14px;
				flex-direction: column;
		  	}
		  	.nav-sub-box-l{
				display: flex;
				width: 40%;
				padding-left: 10%;
				align-items: center;
			}
			.nav-sub-box-r{
				display: flex;
				width: 48%;
				padding-right: 2%;
				justify-content: center;
				align-items: center;
				object-fit: cover;
				
			}
			.user-img-box{
				width: 40px;
				height: 40px;
			}
		}
		

	</style>


<div class="nav-bar">
	<div class="nav-sub-box-l">
		<div class="user-img-box">
			
		</div>
		<label class="username">
			<label> <?php echo $_SESSION['username'];?></label>
		</label>
	</div>
	<form method="post" class="nav-sub-box-r">
	
		<input class="logout-btn" type="submit" name="logout" value="Logout">
	
	</form>

</div>



