<?php

    include "login.php";


    echo $_SESSION["Account_Type"];

    if ( $_SESSION["Account_Type"] == "User"){
        echo "Hello User";
    }else {
        header('Location: AdminPage.php');
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
    <H1>THIS IS A USER PAGE WELCOME</H1>
</body>
</html>