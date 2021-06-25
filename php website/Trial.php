<?php

    require ("connection.php");

    // imports
    include "process.php";
    include "images.php";

    // Display all the data in the database
    $sql = "SELECT * FROM user";
    $result = mysqli_query($connect,$sql);

    $resultcheck = mysqli_num_rows($result);
    if ($resultcheck>0){
        while ($row = mysqli_fetch_array($result)){
            echo $row["UserName"]. $row["PW"] . "<br>";

            $a = $row["UserName"];
            echo "  <div>

                        $a
                    </div>";
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

    <form action="/PASUYOWEB/php website/Trial.php" method="post">
        <input type="text" name="username">
        <input type="text" name="password">
        <input type="submit" name="btn-submit" value="login">
    </form>
</body>
</html>