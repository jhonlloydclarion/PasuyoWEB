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
			/*background-color: blue;*/
			border-bottom: solid;
			border-color: grey;
			border-width: 1px;

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
			justify-content: center;
			align-items: center;
		}
		@media screen and (max-width: 599px) {
		  .username{
			display: flex;
			font-weight: bold;
			font-size: 14px;
			justify-content: center;
			align-items: center;
		  }
		}
		.user-img-box{
			display: flex;
			width: 50px;
			height: 50px;
			background-color: grey;
			margin-right: 5%;
			border-radius: 100%;
		}

	</style>


<div class="nav-bar">
	<div class="nav-sub-box-l">
		<div class="user-img-box">
			
		</div>
		<label class="username">
			Jhon Lloyd
		</label>
	</div>
	<div class="nav-sub-box-r">
		<button class="btn-for-cart">
			<div class="counter-lbl">
				<?php echo $cart_value;?>
			</div>
			<img class="cart-btn" src="img/cart.svg">
		</button>
	</div>
</div>


