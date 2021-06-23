<?php
    $servername = "localhost";
    $user = "root";
    $password = "";
    $database = "mydb";

    //create connection
    $connect = new mysqli($servername,$user,$password,$database);

    // Check connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

?>