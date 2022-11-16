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
            <ul>
                <li>
                    <a>Gaye Diawara</a>
                    <button type="submit" name="name" value="Gaye_DIAWARA">
                        <img src="Icone_Personne.png" width="100" height="100">
                    </button>
                </li>
                <li>
                    <a>Audrey Garcia</a>
                    <button type="submit" name="name" value="Audrey_GARCIA">
                        <img src="Icone_Personne.png" width="100" height="100">
                    </button>
                </li>
                <li>
                    <a>Mohamed Abouakil</a>
                    <button type="submit" name="name" value="Mohamed_ABOUAKIL">
                        <img src="Icone_Personne.png" width="100" height="100">
                    </button>
                </li>
                <li>
                    <a>Quentin Lesniak</a>  
                    <button type="submit" name="name" value="Quentin_LESNIAK">
                        <img src="Icone_Personne.png" width="100" height="100">
                    </button>
                </li>
            </ul>
    </div>
    
    <?php   require("footer.html"); ?>

</body>
</html>