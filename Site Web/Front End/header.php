<div id="header">
    <div id="container">
		<a href="index.php" style="inline-size: 100px;"><img src="HOMEotix_logo.jpg" style="width:300px;height:100px;"><a>
            <div id="containerBis">
                <a href="Maison.php" style="inline-size: 100px;"><img src="Icone_Personne.png" style="width:80px;height:80px;"><a> <!-- Amene a parametre client -->
                <div <?php if ( isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) echo " class='hide';"; ?> >
                    <a href="login.php">Log In</a>
                </div>
                <div <?php if ( !isset($_SESSION['loggedin']) || ($_SESSION['loggedin'] == false)) echo " class='hide';"; ?> >
                    <a href="login.php">Log Out</a>
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