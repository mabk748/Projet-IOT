<?php
    
    session_start();
    // Redirecting to login page if client not logged in
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {

        header("Location: login.php");
        exit();

    }

    require("basicFunctions.php")

?>

    <!DOCTYPE html>
    <html lang="en">
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
        $q_clientProdsList = 'SELECT * FROM ProduitsEnService WHERE (refClient=:client)';
        $stmt = $dbh->prepare($q_clientProdsList);
        // Execute query clientProdsList for client with clientId = $_SESSION['clientId']
        $stmt->execute(array(":client"=>$_SESSION['clientId']));
        $clientProdsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Get all products possessed by the client form table Produits
        $str_clientProdsId = implode(',', array_column($clientProdsList, 'idProduit'));
        $q_prods = "SELECT * FROM Produits WHERE idProduit IN (" .$str_clientProdsId .")";
        $stmt = $dbh->query($q_prods);
        $prods = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Preparing (sorting) $prods for sorting $clientProdsList by $rooms
        $rooms = array_column($prods, 'piece');
        array_multisort($rooms, $prods); // Sorting $prods by $rooms
        $prodsId = array_column($prods, 'idProduit');
        // Sorting $clientProds by $rooms (through $prods)
        array_multisort($prodsId, $clientProdsList);

        //print_r($clientProdsList);

        echo "<p>Client : " .$_SESSION['username'] ."</p>";

        ?>


        <div id="productList">

            <ul id="productSectionList">
            <?php

                $prevSec = '';  // previous section

                for ($i = 0, $size = count($clientProdsList); $i < $size; $i++)  {

                    if ($rooms[$i] != $prevSec)    {    // If section ($room) changed

                        echo "\r";
                        echo <<<EOT
                        <li class='productSection'>
                            <h4>{$rooms[$i]}</h4>
                            <ul>\n
        EOT;

                    }

                    echo "<li>";
                    echo $prods[$i]["nom"];
                    echo "<img src='data:image/jpeg;base64," .base64_encode($prods[$i]['image']) ."' width=300px height=180px/>";
                    echo "Référence produit : " .$clientProdsList[$i]["refProduit"];
                    echo "</li>";

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