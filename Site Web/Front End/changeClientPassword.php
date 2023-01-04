<?php

	session_start();
	
	require("basicFunctions.php");

	$dbh = dataBaseConnect();
	$q_changePassword = 'UPDATE Clients SET motDePasse=:newPassword';
	$stmt = $dbh->prepare($q_changePassword);

	if ( ($_POST['pwd'] == $_POST['pwdConf']) && $_SESSION['loggedin'] )
		$stmt->execute(array(":newPassword"=>crypt($_POST['pwd'])));
	
	header("Location: client_page.php");

?>