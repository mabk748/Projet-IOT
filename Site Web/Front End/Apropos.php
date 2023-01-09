<?php

    session_start();

    require("basicFunctions.php");   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOMEotix</title>
    <link rel="shortcut icon" href="HOMEotix_shortlogo.jpg">
</head>
<body>
    
    <?php   require("header.php"); ?>

    <div class="relative">
        <div id = "middle">
            <div class="notre_histoire">
                <h2>Notre histoire</h2>
                <div>
                Nous sommes un groupe d'élèves de 5 ème année en GSI (Génie des systèmes industriels) à l'INSA Centre Val de Loire, travaillant sur un projet de IOT (Internet of Things), nos compétences techniques dans les domaines de l'informatique, électronique et réseaux nous ont permis de dépasser les attentes scolaires pour élaborer un projet de startup pouvant rivaliser dans le marché des objets connectés.
                </div>
                <img src="histoire.png" width="100" height="100">
            </div>
            <div class="notre_mission">
                <h2>Notre mission</h2>
                <div>
                Notre projet consiste à installer des objets connectés dans le domicile de nos clients qui pourraient, à l'aide du traitement de données, s'adapter au rythme de vie du propriétaire, ce qui aurait un effet positif sur la gestion du temps et l'énergie jusqu'ici perdue à cause de la manipulation manuelle des objets, donc notre but est d'économiser en moyenne 00 min et 00 kwh par mois.
                </div>
                <img src="mission.png" width="100" height="100">
            </div>
            <div class="rejoignez_nous">
                <h2>Regoignez nous</h2>
                <div>
                    Nous sommes une équipe jeune, motivée et en recherche de nouvelles idées innovantes. Si vous souhaitez rejoindre cette aventure, postulez en envoyant votre CV et lettre de motivation <a href="join.php"> en cliquant ici.</a>
                </div>
                <img src="rejoindre.png" width="100" height="100">
            </div>
        </div>
        
    </div>
    
    <?php   require("footer.html"); ?>

    </body>
</html>