
<?php
    
    require ("SqlConnect.php");    
    include "insert.php";
    include "login.php";
    //include "Session.php";

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
    <form action="index.php" method="post">
        <input type="text" name="username">
        <input type="password" name="password" >
        <input type="submit" value="Login" name="submitt">
        <input type="submit" value="Register" name="register">
    </form>
</body>
</html>