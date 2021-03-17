<?php
//return false otherwise
//return true if credentials are right
function authenticate ($db, $ucid, $pass) {
	global $t;
	$s = "select * from users where ucid='$ucid' and pass='$pass'";
	echo "<br>SQL select statement is $s<br>";
	//$t: "result set"
	($t = mysqli_query($db, $s)) or (die(mysqli_error($db)));
	$num = mysqli_num_rows ($t);
	
	if ($num == 0) { 
		return false;
	} else {
		return true;
	}
	
	}
	
function listTrans($db, $ucid) {
	global $t;
	$s = "select * from transactions where ucid='$ucid'";
	echo "<br>SQL select statement is: $s<br>";
	($t = mysqli_query($db, $s)) or (die(mysqli_error($db)));
	$num = mysqli_num_rows ($t);
	echo "<br> $num rows retrieved from DB table.<br><br>";
	if($num==0) {
		exit("No rows retrieved");
		return;
	}
	echo "<table border=2 width=30%>";
	echo"<tr><th>ucid</th><th>amount</th><th>timestamp</th></tr>";
	while ($r=mysqli_fetch_array($t, MYSQLI_ASSOC)){
		$ucid = $r["ucid"];
		$amount = $r["amount"];
		$timestamp=$r["timestamp"];
		
		# echo "<br>ucid $ucid || amount $amount || timestamp $timestamp";
		echo "<td>$ucid</td>";
		echo "<td>$amount</td>";
		echo "<td>$timestamp</td>";
		echo "</tr>";
	}	
	echo "</table>";
	
}

function resetAccount($db, $ucid, $accNum) {
	global $t;
	$s = "delete from accounts where ucid='$ucid' and account='$accNum'";
	echo "<br>SQL select statement is: $s<br>";
	($t = mysqli_query($db, $s)) or (die(mysqli_error($db)));
	echo "Successfully deleted entries.";

}

function listNumTrans($db, $ucid, $accNum, $num) {
	global $t;
	$s = "select * from transactions where ucid='$ucid' and account='$accNum' limit $num";
	echo "<br>SQL select statement is: $s<br>";
	($t = mysqli_query($db, $s)) or (die(mysqli_error($db)));
	$numm = mysqli_num_rows ($t);
	echo "<br> $numm rows retrieved from DB table.<br><br>";
	if($numm==0) {
		exit("No rows retrieved");
		return;
	}
	echo "<table border=2 width=30%>";
	echo"<tr><th>ucid</th><th>amount</th><th>timestamp</th></tr>";
	while ($r=mysqli_fetch_array($t, MYSQLI_ASSOC)){
		$ucid = $r["ucid"];
		$amount = $r["amount"];
		$account = $r["account"];
		$timestamp=$r["timestamp"];
		
		# echo "<br>ucid $ucid || amount $amount || timestamp $timestamp";
		echo "<td>$ucid</td>";
		echo "<td>$amount</td>";
		echo "<td>$timestamp</td>";
		echo "</tr>";
	}	
	echo "</table>";

}	
	
?>