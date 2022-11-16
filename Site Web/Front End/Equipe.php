<?php

    session_start();

    require("basicFunctions.php");   

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="site.css" type="text/css"/>
<head>
    <title>HOMEotix</title>
    <link rel="shortcut icon" href="HOMEotix_shortlogo.jpg">
</head>
<body>
    
    <?php   require("header.php");   ?>

    <div class="relative">
        <form action="CV.php" method="GET">
                <div id="personnep">
                    <button type="submit" name="name" value="Gaye_DIAWARA">
                        <img src="fantome1.png" width="100" height="100">
                    </button>
                    <a>Gaye Diawara</a>
                </div>
                <div id="personnei">
                    <a>Audrey Garcia</a>
                    <button type="submit" name="name" value="Audrey_GARCIA">
                        <img src="fantome3.png" width="100" height="100">
                    </button>
                </div>
                <div id="personnep">
                    <button type="submit" name="name" value="Mohamed_ABOUAKIL">
                        <img src="fantome4.png" width="100" height="100">
                    </button>
                    <a>Mohamed Abouakil</a>
                </div>
                <div id="personnei">
                    <a>Quentin Lesniak</a>  
                    <button type="submit" name="name" value="Quentin_LESNIAK">
                        <img src="fantome2.png" width="100" height="100">
                    </button>
                </div>
    </div>
    
    <?php   require("footer.html"); ?>

</body>
</html>