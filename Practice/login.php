
<?php

    
    //session_destroy();

    // Login Process SQL
    if(isset($_POST["submitt"])){
        session_start();
        //echo "Button Triggered";
        $User = $_POST["username"];
        $Pass = $_POST["password"];

        if(empty($User) || empty($Pass)){
            echo "Username and Password is required";
        }
        else {
            //Check if username and password is in the database
            $sqlquerry = "SELECT * FROM accounts WHERE UserName = '$User' AND PW = '$Pass'";
            $validate = mysqli_query($connect,$sqlquerry);
            //check kung may result
            $check = mysqli_num_rows($validate); // return int number of rows lang


            // Gagamitin para makuha yung variable na gagamitin sa session or i seset na variable for session
            $data_array = mysqli_fetch_assoc($validate); // return ay array na may key =[]
            //echo $data_array["User_type"];

            if ( $check > 0 ){
                
                $_SESSION["Account_Type"] = $data_array["User_type"];

                if (isset($_SESSION["Account_Type"])){
                    echo $_SESSION["Account_Type"] ." Login Sucess";
                    
                }else {
                    echo ("Error");
                    
                }
            }
            else {
                echo "Invalid Credentials";
            }
        }
    }
?>