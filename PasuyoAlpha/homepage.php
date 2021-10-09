
<meta name="viewport" content="width=device-width, initial-scale=1.0" >
<style type="text/css">
	body{
		font-family: Arial;
		margin: 0px;
		padding: 0px;
	}
	.body-box{
		display: flex;
		width: 350px;
		height: 150px;
		/*background-color: red;*/
		padding: 5px;
		border-radius: 5px;
		margin: 5px;

		/*box-shadow: 10px 10px 10px 1px rgba(132, 132, 132, 0.2);*/
		border: 1px solid #DADADA;
	}
	.pic-box{
		display: flex;
		width: 40%;
		
		border-radius: 10px;
	}
	.picture{
		display: flex;
		width: 100%;
		object-fit: cover;
		border-radius: 10px;	
	}
	.sub-box{
		display: flex;
		width: 60%;
		height: 100%;
		/*background-color: yellow;*/
		flex-direction: column;
	}
	.remove-box{
		display: flex;
		width: 100%;
		height: 15%;
		padding-top:5% ;
		/*background-color: red;*/
		justify-content: center;
		align-items: center;
		align-content: center;
	}
	.remove-btn{
		width: 90%;
		background-color: #D9D9D9;
		border-style: none;
		padding-top: 3px;
		padding-bottom: 3px;
	}
	.top-box{
		width: 90%;
		height: 55%;
		padding-left: 5%;
		padding-top: 5%;
		padding-right: 5%;
	}
	.bot-box{
		display: flex;
		width: 100%;
		height: 20%;
		/*background-color: blue;*/
	}
	.p-box{
		display: flex;
		width: 55%;
		align-items: center;
		padding-left: 5%;
		font-weight: bold;
		
	}
	.s-box{
		display: flex;
		width: 30%;
		height: 100%;
		align-items: center;
		justify-content: center;

		color: white;
		background-color: red;
		border-radius: 20px;
	}
	.lbl{
		margin-left: 2.5px;
		margin-right: 2.5px;
	}
	.title{
		
	}
	.body-container{
		display: flex;
		width: 98%;
		height: auto;
		padding-left: 2%;
		padding-top: 20px;
		padding-bottom: 20px;
		flex-wrap: wrap;

	}
	@media screen and (max-width: 599px) {
	  .body-container{
	  	display: inline-flex;
	  	width: 98%;
		padding-left: 2%;
		padding-right: 10px;
		padding-top: 20px;
		padding-bottom: 20px;

	    justify-content: center;
		/*flex-direction: column;*/
		align-items: center;
	  }
	  .header-box{
		display: flex;
		color: white;
		background-color: #18829C;
		text-align: center;
		align-content: center;
		
		justify-content: center;
		align-items: center;
		width: 100%;
		
		font-size: 32px;
		font-weight: bold;
	  }
	  .body-box{
	  	display: flex;
	  	flex-direction: column;
		width: 150px;
		height: 250px;
		/*background-color: red;*/
		padding: 5px;
		border-radius: 5px;
		margin: 5px;

		/*box-shadow: 10px 10px 10px 1px rgba(132, 132, 132, 0.2);*/
		border: 1px solid #DADADA;
	  }
	  .pic-box{
	  	display: flex;
		width: 100%;
		height: 50%;
		
		border-radius: 10px;
	  }
	  .sub-box{
	  	display: flex;
		width: 100%;
		height: 50%;
		/*background-color: yellow;*/
		flex-direction: column;
	  }
	  .title{
	  	font-size: 14px;
	  }





	}
	.sticky-bot{
		display: flex;
		justify-content: safe flex-end;
		align-items: center;
		width: 100%;
		background-color: #18829C;
		margin-top: 20px;
		position: sticky;
		bottom: 0;
		padding-top: 10px;
		padding-bottom: 10px;
	}
	.sticky-top{
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
		position: sticky;
		top: 0;
		padding-top: 10px;
		padding-bottom: 10px;
		background-color: #18829C;
		margin-bottom: 10px;
	}
	.btn-checkout{
		margin-left: 10px;
		margin-right: 30px;
		padding: 10px;
		padding-left: 20px;
		padding-right: 20px;
		border-style: none;
	}
	.total-lbl{
		margin-right: 50px;
		font-weight: bold;
		font-size: 32px;
		color: white;
	}
	.lbl-top{
		font-weight: bold;
		font-size: 32px;
		color: white;
	}
	.btn-qty{
		color: white;
		width: 25px;
		height: 25px;
		padding: 2px;
		border-radius: 100%;
		border-style: none;
		background-color: #18829C;
	}
	.master-main{
		display: flex;
		width: 100%;
		flex-direction: column;
	}
	.header-box{
		display: flex;
		padding-left: 4%;
		padding-top: 20px;

		width: 96%;
		
		font-size: 32px;
		font-weight: bold;
	}

</style>
<body>
	
	<div class="master-main">
		<?php displayproducts("On Sale","sale"); ?>
	</div>

</body>