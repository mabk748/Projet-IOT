<?php 

	session_start();

	require("basicFunctions.php");

	$dbh = dataBaseConnect();

	if (isset($_POST['addProdId']) && isset($_POST['addProdRef']))	{

		$q_addProdToClient = 'INSERT INTO ProduitsEnService VALUES(' .$_POST['addProdRef'] .', ' .$_POST['addProdId'] .', ' .$_SESSION['clientId'] .')';
		$stmt = $dbh->exec($q_addProdToClient);

	}
	if (isset($_POST['rmProd']))	{

		$prod = explode('/', $_POST['rmProd']);
		
		$q_prodMeasures = 'SELECT mesures FROM Produits WHERE idProduit="'.$prod[1] .'"';
		$stmt = $dbh->query($q_prodMeasures);
		$prodMeasures = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['mesures'];
		$measures = explode(',', $prodMeasures);
		//print_r($measures);

		// Remove measurements associated to product
		foreach($measures as $measure)	{

			switch($measure)    {

	            case 'temperature':
	                $q_rmMeasurment = 'DELETE FROM MesuresTemperature WHERE refProduit=' .$prod[0];
	                break;

	            case 'detection':
   	                $q_rmMeasurment = 'DELETE FROM Detection WHERE refProduit=' .$prod[0];

	                break;
	         
	            case 'air':
	                $q_rmMeasurment = 'DELETE FROM MesuresAir WHERE refProduit=' .$prod[0];
	                break;
	               
        	}
        	if (isset($q_rmMeasurment))
				$dbh->exec($q_rmMeasurment);

		}
		// Then remove product
		$q_rmProdFromCilent = 'DELETE FROM ProduitsEnService WHERE (refProduit=' .$prod[0] .')';
		print_r($q_rmProdFromCilent);
		$dbh->exec($q_rmProdFromCilent);

	}
	
	header("Location: Maison.php");


?>