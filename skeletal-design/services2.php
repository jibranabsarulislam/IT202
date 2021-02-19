CSS rules go here

<?php
session_start;

//REMEMBER THIS IS PSEUDO CODE I AM WRITING, NOT COMLETE PHP 

/*
code to redirect  back to pin2.php 
if $_SESSION["pinpassed"]  not defined
*/

/*
make some personal cookies as illustrated in notes
*/
Connect to $db etc

Use $_session array to access ucid value

Use $_GET with mysqli_real_escape_string and  echo to get inputs from services1.php Form

Use if-else logic or case-statement to execute requested service functions

		list_transactions ($db  ...
		ist_transactions_wrapper  ($db, 
		perform_transaction ( $db , $user, $account, $amount
		reset function   TBD
		list a given numer of functions TBD 

*/
?>

		HTML hyperlink logout link tto a script that terminates the seeion  ?
