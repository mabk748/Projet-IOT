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

function tableColumnSort(array &$table, string $column, array $order)	{
/*
	Function to sort lines of a $table using one of its $column, by custom $order
*/
	// Creating an array for each class of $order
	$calsses = array();
	for ($i = 0; $i < sizeof($order); $i++)
		$classes[$i] = array();

	// Filling the classes if they equal one of $order's values
	foreach($table as $row)	{
		for ($i = 0; $i < sizeof($order); $i++)	{
			if ($row[$column] == $order[$i])
				array_push($classes[$i], $row);

		}
	}

	$table = array();
	// Updating $table
	for ($i = 0; $i < sizeof($classes); $i++)
		for ($j = 0; $j < sizeof($classes[$i]); $j++)
			array_push($table, $classes[$i][$j]);

}

?>