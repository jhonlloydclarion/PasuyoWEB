
<?php
    
    require ("connection.php");

    $config = "front-dev-design/css/index.css";


    include "images.php";
    include "connection.php";

    $error = "";



    // If the button submit has been clicked
    if(isset($_POST["btn-submit"])){
        
        //Codition Here!
        $user = $_POST["username"];
        $pass = $_POST["password"];

        
        if( empty($user) || empty($pass) ){

            $error = "Username and Password is required";
            //$error_empty = echo "Username and Password is Empty";
        }
        else {
            echo $user;
            //Check if username and password is in the database
            $ValidateQuerry = "SELECT * FROM user WHERE username = '$user' AND password = md5('$pass')";
            $sqlvalidate = mysqli_query($connect,$ValidateQuerry);

            //check kung may result

            if (mysqli_num_rows($sqlvalidate) > 0){
                echo "success.php";
                $error = "Login Sucess";
            }
            else {
                echo "Invalid Credentials";
            }
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
        <title>Pasuyo</title>
    </head>
    <style>
    
    
    </style>
<body>
    <form action="/PASUYOWEB/php website/login.php" method="post">
        
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