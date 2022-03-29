<?php 

	class DatabaseConnection 
	{
		private static $localhost;
		private static $database = "jrms";
		private static $username = "root";
		private static $password = "";
		private static $statement;
		private static $connection;

		protected function __construct()
		{
			if(self::$connection == null)
			{
				self::establishConnection();
			}
		}

		protected function establishConnection()
		{
			$dbh = new PDO('mysql:host='.self::$localhost.';dbname='.self::$database, self::$username, self::$password);
			$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$connection = $dbh;
		}

		/**
		* String $stmt Statement to be prepared.
		*/
		protected function prepareStatement(string $stmt)
		{
			self::$statement = self::$connection->prepare($stmt);
		}

		protected function executeStatement(...$var)
		{
			return self::$statement->execute($var);
		}

		protected function getResults()
		{
			return self::$statement->fetchAll();
		}
	}