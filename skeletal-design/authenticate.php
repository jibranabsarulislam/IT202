<?php
session_start;


/// unset  the signature variable -for the page  here that's $_SESSION["authennticated"] ;


/*
 CODE TO AUTHENTICATE ucid and pass  
 includes myfunctions.php file
 connect to $db
 needs account.php in same directory
 
 includes error-report-connect-db.php 
 
 Redirects/exit back to authenticate.html if wrong creds
 
 
 if correct  creds
  defines necessary session array variables like $_SESSION["authennticated"]
  Redirects to KB1.php 
 

*/



?>