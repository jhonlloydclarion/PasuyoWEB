


<?php

    require ("connection.php");
    
    if(isset($_POST["btn_submit"])){
        echo "Button Triggered";
        $user = $_POST["username"];
        $pass = $_POST["password"];

        if(empty($user) || empty($pass)){
            echo "Username and Password is required";
        }
        else {
            echo "Login Success";
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
    <form action="/PasuyoWEB/Practice/login.php" method="post">
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="submit" value="Login" name="btn-submit">
    </form>
</body>
</html>