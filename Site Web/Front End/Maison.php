    <!DOCTYPE html>
    <html lang="en">
    <link rel="stylesheet" href="site.css" type="text/css"/>
    <head>
        <title>HOMEotix</title>
        <link rel="shortcut icon" href="HOMEotix_shortlogo.jpg">
    </head>
    <body>

    <!---------------- HEADER ------------------->

        <div id="header">
            <div id="logo" >
    			<a href="Accueil.html"><img src="HOMEotix_logo.jpg" style="width:300px;height:100px;"></a>
    		</div>
            <ul>
                <li><a href="Accueil.html">Accueil</a></li>
                <li><a href="Equipe.html">Notre Equipe</a></li>
                <li><a href="Maison.php">Ma Maison</a></li>
                <li><a href="Apropos.html">A Propos</a></li>
                <li><a href="login2.php">Espace Client</a></li>
            </ul>
        </div>

    <!---------------- CONTENT ------------------->
    
<!-- Nota : Fonctions PHP qui créent les blocs produits, la liste de blocs et de sections produit -->
<!-- Nota : Classes pour chaque produit pour autotmatiser l'affichage (surcharge des méthodes) -->

    <div class="relative">

    <?php

        $user = 'root';
        $psw = 'rot';
        $dsn = 'mysql:host=localhost;dbname=homeotics';

        try {

            $dbh = new PDO($dsn, $user, $psw);

        } catch(PDOException $e)    {

            echo "<br> Erreur! : " .$e->getMessage() ."</br>";
            echo "Quentin : Make sure you imported the database.";
            die();

        }

        // Prepare query to select all products belonging to a :client
        $q_clientProds = 'SELECT * FROM Produits WHERE (refClient=:client)';
        $stmt = $dbh->prepare($q_clientProds);
        // Execute query for client with clientId = 4
        $stmt->execute(array(":client"=>4));
        $prods = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // Sort obtained table by piece
        $pieces = array_column($prods, 'piece');
        array_multisort($pieces, $prods);

        //print_r($prods);

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

    <div id="bottom">
        copyright ©HOMEotix
    </div>

</body>
</html>