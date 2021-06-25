


<?php

    require ("SqlConnect.php");    
    include "insert.php";

    // Login Process SQL
    if(isset($_POST["submitt"])){
        //echo "Button Triggered";
        $User = $_POST["username"];
        $Pass = $_POST["password"];

        if(empty($User) || empty($Pass)){
            echo "Username and Password is required";
        }
        else {
            //Check if username and password is in the database
            $sqlquerry = "SELECT UserName, PW FROM accounts WHERE UserName = '$User' AND PW = '$Pass'";
            $validate = mysqli_query($connect,$sqlquerry);

            //check kung may result
            $check = mysqli_num_rows($validate);
            //var_dump($check);
            if ( $check > 0 ){
                echo "Login Sucess";
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
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="text" name="username">
        <input type="password" name="password" >
        <input type="submit" value="Login" name="submitt">
        <input type="submit" value="Register" name="register">
    </form>
</body>
</html>