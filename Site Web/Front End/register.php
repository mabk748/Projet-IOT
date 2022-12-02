<?php

    session_start();

    require("basicFunctions.php");

    if ($_REQUEST['password'] == $_REQUEST['passwordCheck'])    {

        $dbh = dataBaseConnect();
    	// Prepare query to insert a new client in Clients table
        $q_clientInsert = 'INSERT INTO Clients (nom, prenom, nomUtilisateur, motDePasse, email) VALUES (:lastName, :firstName, :username, :password, :email)';
        $stmt = $dbh->prepare($q_clientInsert);
        // Fill an array with client data form register form
        $clientData = array(":firstName"=>$_REQUEST['firstName'], ":lastName"=>$_REQUEST['lastName'], "username"=>$_REQUEST['username'], ":email"=>$_REQUEST['email'], ":password"=>crypt($_REQUEST['password']));
        // Perform query
        $return = $stmt->execute($clientData);

    }
    else {

        addSessionError("Passwords don't match...");
        header("Location: registerForm.php");
        exit();

    }

    header("Location: login.php");
    exit();

?>