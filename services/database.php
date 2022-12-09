<?php

/**
 * @throws Exception
 */
function getDbConnection(): mysqli
{
	$dbHost = option('DB_HOST', 'Default');
	$dbUser = option('DB_USER', 'Default');
	$dbPassword = option('DB_PASSWORD', 'Default');
	$dbName = option('DB_NAME', 'Default');

	$connection = mysqli_init();
	$connected = mysqli_real_connect($connection, $dbHost, $dbUser, $dbPassword, $dbName);
	if (!$connected)
	{
		$error = mysqli_connect_errno() . ": " . mysqli_connect_error();
		throw new RuntimeException($error);
	}

	$encodingResult = mysqli_set_charset($connection, 'utf8');
	if (!$encodingResult)
	{
		throw new RuntimeException(mysqli_error($connection));
	}

	return $connection;
}

/**
 * @throws Exception
 */
function getDbResultByQuery($query): mysqli_result
{
	$connection = getDbConnection();

	return mysqli_query($connection, $query);
}

