<?php
	session_start();

	if (!isset($_SESSION["auth"])) { //if not defined
		echo "<br>Log in...you will be redirected shortly.";
		header("refresh: 2, url=authenticate.html"); //"kick out code"
		exit();
	} 
	
	$sidvalue = session_id();
	echo "<br>Your session id: $sidvalue<br>";
	$_SESSION = array();         //Make $_SESSION  empty
	session_destroy();                //Terminate session on server
	setcookie("PHPSESSID", "", time()-3600);

	echo "Your session is terminated.";

	echo "<br>You will be redirected...";
	header("refresh: 3, url=authenticate.html");
?>