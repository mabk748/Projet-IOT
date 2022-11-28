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
    <title>Nous rejoindre</title>
    <link rel="shortcut icon" href="HOMEotix_shortlogo.jpg">
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
    
    <div class="login-box">
          <h2>Nous rejoindre</h2>
           <form action="loginAuth.php" method="POST">
               <div class="user-box">
                   <input type="text" name="nom" required="">
                   <label>Nom</label>
               </div>
               <div class="user-box">
                   <input type="text" name="prenom" required="">
                   <label>Prenom</label>
               </div>
               <div class="user-box">
                   <input type="file" name="CV" required="">
                   <label>CV</label>
               </div>
               <div class="user-box">
                   <input type="file" name="motivation" required="">
                   <label>Lettre de motivation</label>
               </div>
                <div class="button-form">
                   <input type="submit" value="Envoyer">
                </div>
            </form>
        </div>

    <?php   require("footer.html"); ?>

</body>
</html>