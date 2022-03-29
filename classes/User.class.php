<?php 

	class User extends DatabaseConnection
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function verifyUser(string $username, string $password)
		{
			$sql = "SELECT COUNT(*) AS does_exist FROM users WHERE username = ? AND password = ?";
			parent::prepareStatement($sql);
			parent::executeStatement($username, $password);
			return parent::getResults();
		}
	}