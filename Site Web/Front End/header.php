<?php

    showSessionErrors();

    // choix du mode nuit
    //if($mode_nuit == TRUE):
        //echo "<link rel='stylesheet' href='site_nuit.css' type='text/css'/>";
    //else:
        echo "<link rel='stylesheet' href='site.css' type='text/css'/>";
    //endif
?>

<div id="header">
    <div id="container">
        <div id="logo">
		  <a href="index.php" style="inline-size: 80px;"><img src="HOMEotix_log.png" style="width:300px;height:auto;"><a>
        </div>
        <div id="containerBis">
        <?php 
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)  {
                echo "\t<li><a href='logout.php'>Log Out</a></li>\n";
                echo "\t\t\t<a href='client_page.php' style='inline-size: 100px;'>\n";
                if ($_SESSION['image'] != NULL)
                    echo "\t\t\t\t<img src='data:image/jpeg;base64," .base64_encode($_SESSION['image']) ."' style='width:70px;height:70px;'>\n";
                else
                    echo "\t\t\t\t<img src='Icone_Personne.png' style='width:70px;height:70px;'>\n";
                echo "\t\t\t<a>\n";

            }
            else
                echo "\t<li><a href='login.php'>Log In</a></li>";
        ?>
        </div>
    </div>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="Equipe.php">Notre Equipe</a></li>
            <li><a href="Maison.php">Ma Maison</a></li>
            <li><a href="Apropos.php">A Propos</a></li>
        </ul>
</div>