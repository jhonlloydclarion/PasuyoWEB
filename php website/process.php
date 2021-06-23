

<?php


    
    // If the button submit has been clicked
    if(isset($_POST["btn-submit"])){
        
        //Codition Here!

        if(empty($_POST["username"]) || empty($_POST["password"])){

            $error = "BOBO KA"
            //$error_empty = echo "Username and Password is Empty";
        }
        else {
            echo "Goods ka";
        }
    }
?>