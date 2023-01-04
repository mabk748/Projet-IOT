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

    <?php /*---------- Client's Info ----------*/

        echo "<p id='Client'>Client : " .$_SESSION['username'] ."<span STYLE='padding:0 0 0 40px;'>N° client : " .$_SESSION['clientId'] ."</span></p>";

     ?>

    <?php /*------------------- Adding products section -----------------------*/

        // Connecting to database
        $dbh = dataBaseConnect();
    
        // Query all products' id, name and room in Produits for adding product scroll bar
        $q_availableProds = 'SELECT idProduit, nom, piece FROM Produits ORDER BY piece';
        $stmt = $dbh->query($q_availableProds);
        $availableProds = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <div id = "containerHome">
        <form action='editClientProducts.php' method='POST'>

            <p>+ Ajouter un équipement</p>

            <select name='addProdId'>
            <?php foreach($availableProds as $prod)   {

                echo "<option value='" .$prod['idProduit'] ."'>" .$prod['nom'] ." -- " .$prod['piece'] ."</option>";

            } ?>
            </select>
            <input type="text" name="addProdRef" placeholder="Référence produit" required="">
            <input type='submit' value='Ajouter'>
                
        </form>



    <?php /*----------- Showing client's produtcs -----------*/

        // Query to select all products belonging to the client
        $q_clientProdsList = 'SELECT refProduit, idProduit FROM ProduitsEnService WHERE refClient=' .$_SESSION['clientId'] .' ORDER BY idProduit';
        $stmt = $dbh->query($q_clientProdsList);
        $clientProdsList = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($clientProdsList))    {
        
            // Query all products possessed by the client form table Produits sorted by rooms
            $str_clientProdsId = implode(',', array_column($clientProdsList, 'idProduit'));
            $q_clientProdTypes = "SELECT * FROM Produits WHERE idProduit IN (" .$str_clientProdsId .") ORDER BY idProduit";
            $stmt = $dbh->query($q_clientProdTypes);
            $clientProdTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }
        
        // Gathering $clientProdsList & $clientProdTypes in $clientProdsList
        $prodTypeIndex = 0; // Equivalent for $i but in $clientProdTypes (idProduit must match between the 2 tables)
        for ($i = 0; $i < sizeof($clientProdsList); $i++)  {

            while ($clientProdsList[$i]['idProduit'] != $clientProdTypes[$prodTypeIndex]['idProduit'])
                $prodTypeIndex++;   // Increment until idProduit matches between the 2 tables

            foreach ($clientProdTypes[$prodTypeIndex] as $key => $value)
                $clientProdsList[$i][$key] = $clientProdTypes[$prodTypeIndex][$key];

        }

        // Query to select values of enum 'piece' in table Produits
        $q_roomValues = 'SHOW COLUMNS FROM Produits WHERE Field = "piece"';
        $stmt = $dbh->query($q_roomValues);
        $roomValues = explode("','", trim($stmt->fetch()['Type'], "enum('')"));
        //print_r($roomValues);

        // Sort $clientProdsList by $rooms
        tableColumnSort($clientProdsList, 'piece', $roomValues);

    ?>

        <form action='editClientProducts.php' method='POST'>

            <p>- Supprimer un équipement :</p>

            <select name='rmProdRef'>
            <?php foreach($clientProdsList as $prod)   {

                echo "<option value='" .$prod['refProduit'] ."'>" .$prod['nom'] ." -- " .$prod['piece'] . " - Ref: " .$prod['refProduit']."</option>";

            } ?>
            </select>
            <input type='submit' value='Supprimer'>
                
        </form>
    </div>

        <div id="productList">
        <form action='cockpit.php' method='GET'>
            <ul id="productSectionList">

        <?php
        
                $prevSec = '';  // previous section

                for ($i = 0, $size = count($clientProdsList); $i < $size; $i++)  {

                    if ($clientProdsList[$i]['piece'] != $prevSec)    {    // If section ($room) changed

                        echo "\r";
                        echo <<<EOT
                        <li class='productSection'>
                            <button type='submit' name='Piece' value='{$clientProdsList[$i]['piece']}'>
                                <h4> {$clientProdsList[$i]['piece']} </h4>
                            </button>
                            
                            <ul>\n
        EOT;

                    }

                    echo "<li>";
                    echo $clientProdsList[$i]["nom"];
                    echo "<img src='" .$clientProdsList[$i]['cheminImage'] ."'width=300px height=180px/>";
                    echo "Référence produit : " .$clientProdsList[$i]["refProduit"];
                    echo "</li>";

                    $prevSec = $clientProdsList[$i]['piece'];

                    if ( ($i == $size-1) || ($i < ($size-1) && $clientProdsList[$i+1]['piece'] != $prevSec))
                        echo <<<EOT
                            </ul>
                        </li>\n
        EOT;

                }
        
        ?>

            </ul>
            </form>
        </div>

    </div>

<!---------------- FOOTER ------------------->

    <?php   require("footer.html"); ?>


</body>
</html>