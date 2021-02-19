<?php
session_start;

/*
code to redirect  back to KB1.php
if $_SESSION["randomAI"]  not defined
*/


// unset  signature session variable  for "KBpassed"


//you only get here if u were admitted

//must do standard functions file setup, etc

/*
Compares submitted answer from  Form  to true answer stored in session array

If they don't match then redirect back to KB1.php

If they do match then:
	sets session "KBpassed" to true  
	then redirects to pin1.php   
	exit
 
*/
?>
