


<?php

    require ("connection.php");



    function display($connect){
        $sql = "SELECT * FROM user";
        $result = mysqli_query($connect,$sql);

        $resultcheck = mysqli_num_rows($result);
        if ($resultcheck>0){
            while ($row = mysqli_fetch_array($result)){
                echo $row["UserName"]. $row["PW"] . "<br>";
            }

        }

    }

    



?>