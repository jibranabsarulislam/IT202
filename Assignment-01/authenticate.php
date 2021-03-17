<?php

session_start();
unset ($_SESSION["auth"]);

//error
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);

//connect to db
include ( "account.php" );
$db = mysqli_connect($hostname,$username,$password, $project );
if (mysqli_connect_errno())
	{     echo "Failed to connect to MySQL: " . mysqli_connect_error();  
	exit();
	}
print "You have successfully connected to MySQL database.<br>";
mysqli_select_db( $db, $project );

//retrieve and print ucid
// $ucid = $_POST["ucid"]; 
$ucid = $_GET["ucid"]; 
$ucid = mysqli_real_escape_string($db, $ucid);
echo "<br>ucid is: $ucid <br>";	


// //retrieve and print pass
// $pass = $_POST["pass"]; 
$pass = $_GET["pass"]; 
$pass = mysqli_real_escape_string($db, $pass);
echo "<br>pass is: $pass <br>";	

include("myfunctions.php");

if (!authenticate ($db, $ucid, $pass)) { //fail
	echo "<br>failed...<br>";
	//redirect vthp
	header("refresh: 3, url=authenticate.html"); //"kick out code"
	exit("<br>bad");
	} 
	
else { //success
	$_SESSION["auth"] = true;
	$_SESSION["ucid"] = $ucid;
	$_SESSION["pass"] = $pass;
	
	//header("refresh: 3, url= z3KB.php "); 
	header("refresh: 3, url= KB1.php"); 
	exit("<br>success, please wait for redirect...");
}
	
?>
<html>
	<div class = "logout">
	    <button type = "button" onclick = "logout.php">
	      Logout
	    </button>
    </div>
</html>