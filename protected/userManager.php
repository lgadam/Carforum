<?php 

function IsUserLoggedIn()
{
	return $_SESSION != NULL && array_key_exists('uid', $_SESSION) && is_numeric($_SESSION['uid']);
}
function UserLogout()
{
	session_unset();
	session_destroy(); //munkafolyamat megszüntetés

	header('Location: index.php');
}
function UserLogin($email, $password) 
{
	$query = "SELECT id, first_name, last_name, email FROM users WHERE email = :email AND password = :password";
	$params = 
	[
		':email' => $email,
		':password' => sha1($password) //szükséges a jelszó kódolása
	]; 

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(!empty($record)) 
	{
		$_SESSION['uid'] = $record['id'];
		$_SESSION['f_name'] = $record['first_name'];
		$_SESSION['l_name'] = $record['last_name'];
		$_SESSION['email'] = $record['email'];

		header('Location: index.php');
	}
	return false;
}
function UserRegister($email, $password, $fname, $lname)
{
	$query = "SELECT id FROM users WHERE email = :email";
	$params = [ ':email' => $email ];

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(empty($record)) 
	{
		$query = "INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)";
		$params = 
		[
			':first_name' => $fname,
			':last_name' => $lname,
			':email' => $email,
			':password' => sha1($password)
		];
		if(executeDML($query, $params)) header('Location: index.php?G=user&P=login');
	} 
	return false;
}

?>