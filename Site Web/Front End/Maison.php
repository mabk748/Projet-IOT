<?php
    
    session_start();
    // Redirecting to login page if client not logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {

        header("Location: login2.php");
        exit();

    }

    require("basicFunctions.php")

?>

    <!DOCTYPE html>
    <html lang="en">
    <link rel="stylesheet" href="site.css" type="text/css"/>
    <head>
        <title>HOMEotix</title>
        <link rel="shortcut icon" href="HOMEotix_shortlogo.jpg">
    </head>
    <body>

    <!---------------- HEADER ------------------->

    <?php   require("header.php"); ?>


    <!---------------- CONTENT ------------------->
    
<!-- Nota : Fonctions PHP qui créent les blocs produits, la liste de blocs et de sections produit -->
<!-- Nota : Classes pour chaque produit pour autotmatiser l'affichage (surcharge des méthodes) -->

    <div class="relative">

    <?php

        // Connecting to database
        $dbh = dataBaseConnect();
        // Prepare query to select all products belonging to a :client
        $q_clientProds = 'SELECT * FROM Produits WHERE (refClient=:client)';
        $stmt = $dbh->prepare($q_clientProds);
        // Execute query for client with clientId = 4
        $stmt->execute(array(":client"=>$_SESSION['clientId']));
        $prods = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Sort obtained table by piece
        $pieces = array_column($prods, 'piece');
        array_multisort($pieces, $prods);

        //print_r($prods);

        echo "<p>Client : " .$_SESSION['username'] ."</p>";

        ?>


        <div id="productList">

            <ul id="productSectionList">
            <?php

                $prevSec = '';

                for ($i = 0, $size = count($prods); $i < $size; $i++)  {

                    if ($prods[$i]['piece'] != $prevSec)    {

                        echo "\r";
                        echo <<<EOT
                        <li class='productSection'>
                            <h4>{$prods[$i]['piece']}</h4>
                            <ul>\n
        EOT;

                    }

                    echo <<<EOT
                                <li>{$prods[$i]["nom"]}</li>\n
        EOT;

                    $prevSec = $prods[$i]['piece'];

                    if ( ($i == $size-1) || ($i < ($size-1) && $prods[$i+1]['piece'] != $prevSec))
                        echo <<<EOT
                            </ul>
                        </li>\n
        EOT;

                }

            ?>

            </ul>

        </div>

    </div>

<!---------------- FOOTER ------------------->

    <?php   require("footer.html"); ?>


</body>
</html>