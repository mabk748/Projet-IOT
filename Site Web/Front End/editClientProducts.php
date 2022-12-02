<?php 

	session_start();

	require("basicFunctions.php");


	$dbh = dataBaseConnect();
	if (isset($_POST['addProdId']) && isset($_POST['addProdRef']))	{

		$q_addProdToClient = 'INSERT INTO ProduitsEnService VALUES(' .$_POST['addProdRef'] .', ' .$_POST['addProdId'] .', ' .$_SESSION['clientId'] .')';
		$stmt = $dbh->exec($q_addProdToClient);

	}
	if (isset($_POST['rmProdRef']))	{

		$q_rmProdFromCilent = 'DELETE FROM ProduitsEnService WHERE (refProduit=' .$_POST['rmProdRef'] .')';
		print_r($q_rmProdFromCilent);
		$stmt = $dbh->exec($q_rmProdFromCilent);

	}
	
	header("Location: Maison.php");


?>