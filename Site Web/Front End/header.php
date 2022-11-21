<div id="header">
    <div id="container">
		<a href="index.php" style="inline-size: 80px;"><img src="HOMEotix_log.png" style="width:300px;height:auto;"><a>
        <div id="containerBis">
            <div <?php if ( isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) echo " class='hide';"; else echo " class='log';";?> >
                <a href="login.php">Log In</a>
            </div>
            <div <?php if ( !isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] == false)) echo " class='hide';"; else echo " class='log';"; ?> >
                <a href="logout.php">Log Out</a>
            </div>
            <div style="width:10%;"></div>
            <div <?php if ( !isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] == false)) echo " class='hide';"; else echo " class='log';"; ?> >
            <a href="client_page.php" style="inline-size: 100px;"><img src="Icone_Personne.png" style="width:70px;height:70px;"><a> <!-- Amene a parametre client -->
            </div>
        </div>
    </div>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="Equipe.php">Notre Equipe</a></li>
            <li><a href="Maison.php">Ma Maison</a></li>
            <li><a href="Apropos.php">A Propos</a></li>
        </ul>
</div>