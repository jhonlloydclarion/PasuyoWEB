
<?php
    require ("conn.php");
    include "css_productquerry.php";
                $a = "main-box";
                $b = "card-box";
                $c = "image-box";
                $d = "price-box";
                $e = "price";
                $f = "product-image";
                $g = "action-box";
                $h = "prod-name-box";
                $i = "prod-title";
                $j = "cart-box";
                $k = "submit";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "css_productquerry.php";?>

    <title>Document</title>
</head>
<body>
    <div class="main-box">
        <?php
            $sql = "SELECT * FROM products";
            $results = mysqli_query($conn,$sql);

            $resultchecks = mysqli_num_rows($results);
            if ($resultchecks>0){
                while ($roww = mysqli_fetch_array($results)){

                    $path_image = "prodimage/". $roww["image"] . ".jpg";
                    $prod_price = $roww["price"];
                    $prod_title = $roww["title"];

                    //echo "<div class='main-box'>";
                    echo      "<div class='card-box'>";
                    echo        "<div class='image-box'>";
                    echo            "<div class='price-box'>";
                    echo                "<p class='price'>P ".$prod_price."</p>";
                    echo            "</div>";
                    echo            "<img class = 'product-image' src=".$path_image." alt=''>";
                    echo        "</div>";
                    echo        "<div class='action-box'>";
                    echo            "<div class='prod-name-box'>";
                    echo                "<p class='prod-title' >".$prod_title."</p>";
                    echo            "</div>";
                    echo            "<div class='cart-box'>";
                    echo                "<input type='submit' value='+'>";
                    echo            "</div>";
                    echo        "</div>";
                    echo    "</div>";
                    //echo "</div>";
                }
            }
        ?> 
    
    </div>
</body>
</html>