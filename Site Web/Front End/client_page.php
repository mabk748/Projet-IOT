<?php

    require("basicFunctions.php");   

    session_start();

    $dbh = dataBaseConnect();
    // query to get :client's info
    $q_clientInfo = 'SELECT * FROM Clients WHERE idClient=:clientId';
    // Prepare query to get :client's info
    $stmt = $dbh->prepare($q_clientInfo);
    // Execute query for client with idClient = $_SESSION['idClient']
    $stmt->execute(array(":clientId"=>$_SESSION['clientId']));
    $clientInfo = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!-- TEST POPUP JS

<script>
//https://www.w3schools.com/Css/css_positioning.asp
//https://www.w3schools.com/howto/howto_js_popup.asp
// When the user clicks on <div>, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>

-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Espace client</title>
    <link rel="shortcut icon" href="HOMEotix_shortlogo.jpg">
</head>
<body>
    
    <?php   require("header.php");   ?>

    <div class="login-box">
            <table align="center">
                <thead>
                    <tr>
                        <th colspan="3">Informations personnelles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center" colspan="3">
                        <?php
                            if ($_SESSION['image'] != NULL)
                                echo "\t\t\t\t<img src='data:image/jpeg;base64," .base64_encode($_SESSION['image']) ."' style='width:70px;height:70px;'>\n";
                            else
                                echo "\t\t\t\t<img src='Icone_Personne.png' style='width:70px;height:70px;'>\n";
                        ?>
                        </td>
                    </tr>
                        <form method="POST" action="changeClientInfo.php">
                            <tr>
                                    <td><b>Username</b></td>
                                    <td><input type="text" name="clientUsername" placeholder="<?php echo $clientInfo['nomUtilisateur'] ?>" ></td>
                                    <!-- TEST POPUP JS
                                    <button onclick="myFunction()">Modifier</button>
                                    <div class="popup" id="myPopup">
                                        <span class="">Popup text...</span>
                                    </div>
                                    -->
                                
                            </tr>
                            <tr>
                                <td><b>Nom</b></td>
                                <td><input type="text" name="clientLastName" placeholder="<?php echo $clientInfo['nom'] ?>" ></td> 
                            </tr>
                            <tr>
                                <td><b>Prénom</b></td>
                                <td><input type="text" name="clientName" placeholder="<?php echo $clientInfo['prenom'] ?>" ></td>    
                            </tr>
                            <tr>
                                <td><b>Adresse email</b></td>
                                <td><input type="text" name="clientEmail" placeholder="<?php echo $clientInfo['email'] ?>" ></td>    
                            </tr>
                            <tr>
                                <td align="center" colspan="3"><button>Valider les changements</button></td>
                            </tr>
                        </form>
                        <form action="changePasswordForm.php" method="POST">
                            <tr>
                                <td><b>Mot de passe</b></td>
                                <td><input type="submit" value="Modifier"></td>    
                            </tr>
                        </form>
                        <tr>
                            <td><b>Ma maison</b></td>
                            <td align="center" colspan="2"><a href="Maison.php">cliquez ici</a></td>
                        </tr>
                </tbody>
            </table>
    </div>
<!--
    <div class="login-box">
            <table align="center">
                <thead>
                    <tr>
                        <th colspan="3">Paramètres</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>Sécurité</b></td>
                        <td align="center" colspan="2"><button>accéder à sécurité</button></td>
                    </tr>
                    <tr>
                        <td><b>Mode nuit</b></td>
                        <td><button action="<?php $_SESSION['mode_nuit'] = TRUE; ?>">Activer</button></td>
                        <td><button action="<?php $_SESSION['mode_nuit'] = FALSE; ?>">Désactiver</button></td>
                    </tr>
                </tbody>
            </table>
    </div>
-->
    
    <?php   require("footer.html"); ?>

</body>
</html>