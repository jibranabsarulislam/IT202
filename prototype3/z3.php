<?php

//error
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);

//connect to db
include (  "../account.php" ) ;
$db = mysqli_connect($hostname,$username,$password, $project );
if (mysqli_connect_errno())
	{     echo "Failed to connect to MySQL: " . mysqli_connect_error();  
	exit();
	}
print "You have successfully connected to MySQL database.<br>";
mysqli_select_db( $db, $project );

//retrieve and print ucid
$ucid = $_GET["ucid"]; 
$ucid = mysqli_real_escape_string($db, $ucid);
echo "<br>ucid is: $ucid <br>";	

//retrieve and print pass
$pass = $_GET["pass"]; 
$pass = mysqli_real_escape_string($db, $pass);
echo "<br>pass is: $pass <br>";	

//return false otherwise
p//return true if credentials are right
function authenticate ($db, $ucid, $pass) {
		select * from users where ucid='$ucid' and pass='$pass';
	
	;}


?>