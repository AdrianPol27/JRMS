<?php 
	
	require_once "autoloader.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$user_cl = new User();
	try 
	{
		$response = $user_cl->verifyUser($username, $password)[0];
		if(!$response)
			throw new Exception("Unable to verify user.");
		echo json_encode($response);
	}
	catch(Exception $ex)
	{
		echo json_encode(array("error"=>true,"message"=>$ex->getMessage()));
	}