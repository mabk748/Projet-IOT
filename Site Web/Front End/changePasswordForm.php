<?php

	session_start();

	include("basicFunctions.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOMEotix</title>
    <link rel="shortcut icon" href="HOMEotix_shortlogo.jpg">
</head>
<body>

	<?php if($_SESSION['loggedin'])	{

		echo '<form method="POST" action="changeClientPassword.php">';
			echo '<label>Nouveau mot de passe : </label>';
			echo '<input type="text" name="pwd" placeholder="Mot de passe">';
			echo '<label>Confirmation du mot de passe : </label>';
			echo '<input type="text" name="pwdConf" placeholder="Mot de passe">';
			echo '<input type="submit" name="Modifier">';
		echo '</form>';

	}
	else 	{

		echo "<p>Please log in.</p>";

	}	?>

</body>