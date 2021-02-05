<?php
	
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
ini_set('display_errors', 1);

include (  "account.php" ) ;
$db = mysqli_connect($hostname,$username,$password, $project );
if (mysqli_connect_errno())
	{     echo "Failed to connect to MySQL: " . mysqli_connect_error();  
	exit();
	}
print "You have successfully connected to MySQL database.<br>";
mysqli_select_db( $db, $project );

	$ucid = $_GET["ucid"]; $ucid = mysqli_real_escape_string($db, $ucid);
	echo "ucid is: $ucid <br>";	

	$account = $_GET["account"]; $account = mysqli_real_escape_string($db, $account);
	echo "account is: $account <br>";	

	$amount = $_GET["amount"]; $amount = mysqli_real_escape_string($db, $amount);
	echo "amount is: $amount <br>";	

	// IS TRANS OKAY? select

	$s = "select * from accounts where ucid='$ucid' and account='$account' and balance + '$amount' >= 0.00 ";
	echo "select: $s <br>";
	($t = mysqli_query($db, $s)) or (die(mysqli_error($db)));
	$num = mysqli_num_rows ($t);
	if ($num == 0) { 
		exit ("Something's off.");
	} ;

	// insert to transactions
	$s = "insert into transactions values ('$ucid', '$amount', '$account', NOW())";
	echo "insert: $s <br>";
	($t = mysqli_query($db, $s)) or (die(mysqli_error($db)));

	// update accounts
	$s = "update accounts 
			set balance = balance + '$amount', mostRecentTrans = NOW() 
			where ucid='$ucid' and account='$account' 
			and balance+'$amount'>=0.00
		"; 
	($t = mysqli_query($db, $s)) or (die(mysqli_error($db)));
	echo "update: $s <br>";

	
?>
