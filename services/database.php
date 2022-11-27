<?php
	function getDbConnection ()
	{
		$dbHost = option('DB_HOST');
		$dbUser = option('DB_USER');
		$dbPassword = option('DB_PASSWORD');
		$dbName = option('DB_NAME');

		$connection = mysqli_init();

		$connected = mysqli_real_connect($connection, $dbHost, $dbUser, $dbPassword, $dbName);
		if (!$connected)
		{
			$error = mysqli_connect_errno() . ': ' . mysqli_connect_error();
			throw new Exception($error);
		}

		$encodingResult = mysqli_set_charset($connection, 'utf8');
		if (!$encodingResult) {
			throw new Exception(mysqli_error($connection));
		}

		return $connection;
	}
	function getDbResultByQuery($query) {
		$connection = getDbConnection();
		$result = mysqli_query($connection, $query);

		if(!$result)
		{
			throw new Exception(mysqli_error($connection));
		}

		return $result;
	}
