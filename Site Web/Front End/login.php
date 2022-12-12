<?php

    session_start();

    require("basicFunctions.php");   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="HOMEotix_shortlogo.jpg">
    <style>
        * {
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <?php   

        require("header.php");

    ?>
    
    <div class="login-box">
          <h2>Login</h2>
           <form action="loginAuth.php" method="POST">
               <div class="user-box">
                   <input type="text" name="username" required="">
                   <label>Usename</label>
               </div>
               <div class="user-box">
                   <input type="password" name="password" required="">
                   <label>Password</label>
               </div>
                <div class="button-form">
                   <input type="submit" value="Submit">
                    <div id="register">
                       Don't have an account ?
                       <a href="registerForm.php">Register</a>
                    </div>
                </div>
            </form>
        </div>

    <?php   require("footer.html"); ?>

</body>
</html>