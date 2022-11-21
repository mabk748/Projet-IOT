<?php

    session_start();

    require("basicFunctions.php");   

?>

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
                        <td align="center" colspan="3"><img src="Icone_Personne.png" style="width:70px;height:70px;"></td>
                    </tr>
                    <tr>
                        <td><b>User name</b></td>
                        <td>nom du client</td>
                        <td><button>modifier</button></td>
                    </tr>
                    <tr>
                        <td><b>Nom</b></td>
                        <td>nom du client</td>
                        <td><button>modifier</button></td>
                    </tr>
                    <tr>
                        <td><b>Prenom</b></td>
                        <td>prenom du client</td>
                        <td><button>modifier</button></td>
                    </tr>
                    <tr>
                        <td><b>Adresse e-mail</b></td>
                        <td>email</td>
                        <td><button>modifier</button></td>
                    </tr>
                    <tr>
                        <td><b>Mot de passe</b></td>
                        <td>*******</td>
                        <td><button>modifier</button></td>
                    </tr>
                    <tr>
                        <td><b>Produits</b></td>
                        <td align="center" colspan="2"><a href="Maison.php">cliquez ici</a></td>
                    </tr>
                </tbody>
            </table>
    </div>

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
    
    <?php   require("footer.html"); ?>

</body>
</html>