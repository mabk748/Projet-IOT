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
    <title>Register</title>
    <link rel="shortcut icon" href="HOMEotix_shortlogo.jpg">
    <link rel="stylesheet" href="site.css" type="text/css"/>
    <style>
        * {
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    
    <?php   

    showSessionErrors(); 
    
    require("header.php");

    ?>

    <div class="register-box">
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <div class="user-box">
                <input type="text" name="firstName" required="">
                <label>First name</label>
            </div>
            <div class="user-box">
                <input type="text" name="lastName" required="">
                <label>Last name</label>
            </div>
               <div class="user-box">
                   <input type="text" name="username" required="">
                   <label>Username</label>
               </div>
               <div class="user-box">
                <input type="text" name="email" required="">
                <label>E-mail</label>
            </div>
               <div class="user-box">
                   <input type="password" name="password" required="">
                   <label>Password</label>
               </div>
               <div class="user-box">
                <input type="password" name="passwordCheck" required="">
                <label>Confirm password</label>
            </div>
            <div class="button-form">
               <input type="submit" value="Submit">
                <div id="login">
                   Do you have an account ?
                   <a href="login2.html">Login</a>
                </div>
            </div>
        </form>
    </div>
    
    <?php   require("footer.html"); ?>

    </body>
</html>