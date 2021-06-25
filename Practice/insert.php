<?php

    // Insert Data Process SQL
    if(isset($_POST["register"])){
        //echo "Button Triggered";
        $User = $_POST["username"];
        $Pass = $_POST["password"];

        if(empty($User) || empty($Pass)){
            echo "Username and Password is required";
        }
        else {
            //Insert Data into database
            $sqlquerry = "INSERT INTO accounts (UserName, PW) VALUES ('$User','$Pass')";
            $validate = mysqli_query($connect,$sqlquerry);
        }

    }

?>