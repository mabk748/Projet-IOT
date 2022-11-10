<?php

/************ Session functions **************/

function showSessionErrors()	{

	if (isset($_SESSION) && isset($_SESSION['errorList']))	{

		foreach ($_SESSION['errorList'] as $errorMessage)	{

			echo 
			<<<EOT
			<div class="errorBox">
					<p>{$errorMessage}</p>
				</div>
				
			EOT;

			array_pop($_SESSION['errorList']);

		}

	}

}

function addSessionError($errorMessage)	{

	if (!isset($_SESSION['errorList']))
		$_SESSION['errorList'] = array();

    array_push($_SESSION['errorList'], $errorMessage);


}

/************ Data base functions **************/

function dataBaseConnect()	{

	// Authentification info
	$dbUser = 'root';
    $psw = 'root';
    $dsn = 'mysql:host=localhost;dbname=homeotics';

    // Try loging into database
    try {

        $dbh = new PDO($dsn, $dbUser, $psw);

    } catch(PDOException $e)    {

        echo "<br> Erreur! : " .$e->getMessage() ."</br>";
        echo "Quentin : Make sure you imported the database.";
        die();

    }

    // Enable error messages
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbh;

}


?>