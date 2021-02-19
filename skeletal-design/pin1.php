<?php
session_start;
/*
code to redirect  back to KB1.php
if $_SESSION["pin"]  not defined
*/

// unset  signature session variable  for "pinpassed"

/*
make some personal cookies as illustrated in notes
*/

//you only get here if u passed personal knowledge inquiry  

//must do standard functions file setup, etc

/*
 Generates random 4 digit pin and mails to yourself
 
 For instructor's grading convenience must also echo pin  here too.
 
 Sets session "pin"  to true pin value
 
 You  submit pin from your  njit mail in form below.
 */
?>
<br><br><br>
HTML form to submit pin seen in your njit gmail  .
Submits to pin2.php
name = "pin"