<?php
	
	session_start();

	if (!isset($_SESSION["auth"]){ //if not defined
		echo "<br>Log in...you will be redirected shortly.";
		header("refresh: 5, url=z3.html"); //"kick out code"
		exit();
	} 
	mysqli_select_db($db,$project);
	echo "success";
	
	$ucid=$_SESSION["ucid"];
	
	function listTrans($db, $ucid) {
		$s = "select * from transactions where ucid='$ucid'";
		echo "<br>SQL select statement is: $s<br>";
		($t = mysqli_query($db, $s)) or (die(mysqli_error($db)));
		$num = mysqli_num_rows ($t);
		echo "<br> $num rows retrieved from DB table.<br><br>";
		if($num==0) {
			exit("No rows retrieved");
		}
		
		while ($r=mysqli_fetch_array($t, MYSQLI_ASSOC)){
			$amount = $r["amount" ];
		}
		
		
	}
	listTrans($db, $ucid);
?>