<?php

    require("basicFunctions.php");
	
	session_start();


	$dbh = dataBaseConnect();

	$q_updateClient = 'UPDATE Clients SET ';
	$nbUpdates = 0;

    if( !empty($_POST['clientUsername']) )	{

    	$q_updateClient .= ('nomUtilisateur="' .$_POST['clientUsername'] .'"');
    	$nbUpdates++;

    }
    if( !empty($_POST['clientLastName']) )	{

    	if ($nbUpdates > 0)
    		$q_updateClient .= ', ';
    	$q_updateClient .= ('nom="' .$_POST['clientLastName'] .'"');
    	$nbUpdates++;

    }
    if( !empty($_POST['clientName']) )	{

    	if ($nbUpdates > 0)
    		$q_updateClient .= ', ';
    	$q_updateClient .= ('prenom="' .$_POST['clientName'] .'"');
    	$nbUpdates++;

    }
    if( !empty($_POST['clientEmail']) )	{

  		if ($nbUpdates > 0)
    		$q_updateClient .= ', ';
    	$q_updateClient .= ('email="' .$_POST['clientEmail'] .'"');
    	$nbUpdates++;

    }
    $q_updateClient .= ' WHERE idClient=' .$_SESSION['clientId'];

    if ($nbUpdates!=0)
        $dbh->exec($q_updateClient);

    header("Location: client_page.php");

?>