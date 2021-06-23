
<?php
   
    $config = "front-dev-design/css/index.css";
    $a = "fuck you!";

    include "images.php";
    include "connection.php";

    $error = "";
    // If the button submit has been clicked
    if(isset($_POST["btn-submit"])){
        
        //Codition Here!

        if(empty($_POST["username"]) || empty($_POST["password"])){

            $error = "BOBO KA";
            //$error_empty = echo "Username and Password is Empty";
        }
        else {
            echo "Goods ka";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include "css.php";?>
        <title>FAK</title>
    </head>
    <style>
    
    
    </style>
<body>
    <form action="login.php" method="post">
        
        <div class="mainbox">
            <div class="loginbox">
                <div class="log-box">
                    <img class="logo" src="logo.svg" alt="none.jpeg">
                </div>
                <div class="input-box">
                    <input class="input" type="text" placeholder="Username" name="username">
                    <input class="input" type="password" placeholder="Password" name="password">
                    
                </div>
                <div class="action-box">
                    <input class="btn-submit" type="submit" value="Login" name="btn-submit">
                    
                </div>
                <div class="error-box">
                
                    <p style="color: red;"><?php echo $error;?></p>
                </div>
            </div>
        </div>

    </form>
    
 
</body>

</html>