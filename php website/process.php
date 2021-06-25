

<?php

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
            echo $pass;
            //Check if username and password is in the database
            $ValidateQuerry = "SELECT * FROM user WHERE UserName = 'user' AND PW = md5('pass')";
            $sqlvalidate = mysqli_query($connect,$ValidateQuerry);
            print_r ($sqlvalidate);
            //check kung may result
            $count = mysqli_num_rows($sqlvalidate); 
            echo $count;
            if ( $count > 0 ){
                echo "success.php";
                $error = "Login Sucess";
            }
            else {
                echo "Invalid Credentials";
            }
        }
    }