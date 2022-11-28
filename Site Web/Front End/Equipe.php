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
    
    <?php   require("header.php");   ?>

    <div class="relative">
        <form action="CV.php" method="GET">
                <table id="personnep">
                    <tr>
                        <td rowspan="2">
                            <button type="submit" name="name" value="Gaye_DIAWARA">
                                <img src="fantome1.png" width="100" height="100">
                            </button>
                        </td>
                        <td colspan="3">
                            <a>Gaye Diawara</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">Chef de projet et fondateur de l'initiative HOMEotix</td>
                    </tr>
                </table>
                <table id="personnei">
                    <tr>
                        <td colspan="3">
                            <a>Audrey Garcia</a>
                        </td>
                        <td rowspan="2">
                            <button type="submit" name="name" value="Audrey_GARCIA">
                                <img src="fantome3.png" width="100" height="100">
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                    </tr>
                </table>
                <table id="personnep">
                    <tr>
                        <td rowspan="2">
                            <button type="submit" name="name" value="Mohamed_ABOUAKI">
                                <img src="fantome4.png" width="100" height="100">
                            </button>
                        </td>
                        <td colspan="3">
                            <a>Mohamed Abouakil</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"> Developpeur Front End</td>
                    </tr>
                </table>
                <table id="personnei">
                    <tr>
                        <td colspan="3">
                            <a>Quentin Lesniak</a>
                        </td>
                        <td rowspan="2">
                            <button type="submit" name="name" value="Quentin_LESNIAK">
                                <img src="fantome2.png" width="100" height="100">
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">Developpeur Back End</td>
                    </tr>
                </table>
    </div>
    
    <?php   require("footer.html"); ?>

</body>
</html>