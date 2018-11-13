<?php
	// MySQL Connection
	$mysqli = new mysqli("localhost", "root", "", "apstm");
	if ($mysqli->connect_errno) 
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	
	// Start Session
	session_start();

	// Function 1: isLoggedIn() to check whether the user is logged in or not or redirect to login page
	function isLoggedIn()
	{
		if(isset($_SESSION['uid']))
			return true;
		else
			return false;
	}
	
	// Function 2: Security function secure() to prevent SQL Injection and Cross Site Scripting (XSS)
	function secure($strToSecure)
    {
		global $mysqli;
		$strToSecure = mysqli_real_escape_string($mysqli, $strToSecure);
		$strToSecure = strip_tags($strToSecure);
		$strToSecure = htmlentities($strToSecure);
		return $strToSecure;
    }
	
	// Function 3: Security function Encrypt() to encrypt a data using Triple DES Algorithm
	function Encrypt($data)
	{
	   $cipher = md5(md5("dell") . secure($data) . md5("intex"));
	   return $cipher;
	}
?>

