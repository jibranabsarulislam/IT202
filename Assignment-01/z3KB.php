<?php

	session_start();

	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	ini_set('display_errors', 1);
	
	setcookie("doneBy", "absarulislam", time() + (86400*30),"/");
	setcookie("doneAt", date('l jS \of F Y h:i:s A'), time() + (86400*30), "/");

	if (!isset($_SESSION["auth"])) { //if not defined
		echo "<br>Log in...you will be redirected shortly.";
		header("refresh: 2, url=authenticate.html"); //"kick out code"
		exit();
	} 
	echo "success<br>";

	include ("account.php");
	$db = mysqli_connect($hostname,$username,$password, $project);
	if (mysqli_connect_errno()) {     
		echo "Failed to connect to MySQL: " . mysqli_connect_error();  
		exit();
	}
	print "You have successfully connected to MySQL database.<br>";
	mysqli_select_db( $db, $project );
	include("z3myfunctions.php");
	$ucid=$_SESSION["ucid"];
	listTrans($db, $ucid);
?>