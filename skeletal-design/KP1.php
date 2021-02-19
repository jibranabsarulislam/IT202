<?php
session_start;
/*
make some personal cookies as illustrated in notes
*/

/*
code to redirect  back to authenticate.php
if session authenticated not defined
*/

/// unset  the signature variable -for the page  here that's $_SESSION["randomAI"] ;

//you only get here if u were authenticated

//must do standard $db and functions file setup, etc

/*
 Give the PHP algorithm to  confirm personal knowledge:
 
 Generates random personal question.
 Must have HTML form  AFTER  PHP section 
 where user submits answer  to personal knowledge question.
 
 Remember correct "answer" in session array 
 and  
 defines signature value of  $randomAI session array "randomAI"
  
 
 For instructor's grading convenience must also echo answer here too !!!!

*/
?>
<br><br><br>
HTML form to submit answer to the random personal question.
Submits to KB2.php
name="answer"

