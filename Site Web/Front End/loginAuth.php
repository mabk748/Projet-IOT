<?php

	require("basicFunctions.php");

	$dbh = dataBaseConnect();
	// query to get :client's id, username and password
    $q_clientAuthInfo = 'SELECT idClient, nomUtilisateur, motDePasse FROM Clients WHERE (nomUtilisateur=:username)';
    // Prepare query to get :client's username and password
    $stmt = $dbh->prepare($q_clientAuthInfo);
    // Execute query for client with nomUtilisateur = $user
    $stmt->execute(array(":username"=>$_REQUEST['username']));
    $clientAuthInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($client);
    

	session_start();


	if (isset($_REQUEST['username']) && isset($_REQUEST['password']))	{

		if(password_verify($_REQUEST['password'], $clientAuthInfo['motDePasse']))	{

			echo "Login successful, welcome " .$clientAuthInfo['nomUtilisateur'];
			$_SESSION['clientId'] = $clientAuthInfo['idClient'];
			$_SESSION['username'] = $clientAuthInfo['nomUtilisateur'];
			$_SESSION['loggedin'] = true;

			header("Location: Maison.php");
			exit();

		}

		else		
			addSessionError("Wrong password or username...");

	}

	else
			addSessionError("Missing password or username...");
		

	$_SESSION['loggedin'] = false;
	header("Location: login2.php");
    exit();

?>