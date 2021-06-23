
<?php
   
    $config = "front-dev-design/css/index.css";
    $a = "fuck you!";
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo $config?>">
        <title>FAK</title>
    </head>

<body>

    <div class="mainbox">
        <div class="loginbox">
            <div class="log-box">
                <img class="logo" src="/img/logo.svg" alt="none.jpeg">
            </div>
            <div class="input-box">
                <input class="input" type="text" placeholder="Username">
                <input class="input" type="password" placeholder="Password">
                
            </div>
            <div class="action-box">
                <input class="btn-submit" type="submit" value="Login">
                
            </div>
            <div class="error-box">
                <p style="color: red;"> <?php echo $a?>Username and Password is required</p>
            </div>
        </div>
    </div>
 
</body>

</html>