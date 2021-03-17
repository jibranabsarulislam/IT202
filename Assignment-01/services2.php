<?php
	session_start();
	echo "services2.php";
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	ini_set('display_errors', 1);
	
	setcookie("doneBy", "absarulislam", time() + (86400*30),"/");
	setcookie("doneAt", date('l jS \of F Y h:i:s A'), time() + (86400*30), "/");

	if (!isset($_SESSION["auth"])) { //if not defined
		echo "<br>Log in...you will be redirected shortly.";
		header("refresh: 2, url=authenticate.html"); //"kick out code"
		exit();
	} 
	?>
	<body>

   		<div class = "logout">
   			<form action = "./logout.php" id ="logoutForm">
			
			</form>
			<button type = "Submit" form = "logoutForm" value = "Logout">Logout</button>


			<form action = "./services1.php" id ="backButton">
			
			</form>
			<button type = "Submit" form = "backButton" value = "backButton">Go Back</button>
			
		</div>
  	</body>
 <?php
	include ("account.php");
	$db = mysqli_connect($hostname,$username,$password, $project);
	if (mysqli_connect_errno()) {     
		echo "Failed to connect to MySQL: " . mysqli_connect_error();  
		exit();
	}
	echo "Connected...<br>";

	include("myfunctions.php");
	$ucid=$_SESSION["ucid"];
	$accNum = $_REQUEST["accNum"];
	$clearAccNum = $_REQUEST["clearAccNum"];
	$numTran = $_REQUEST["numTran"];
	echo "acc Num is: $accNum";
	echo "num is: $numTran";
	//if choice == listAll trans:
	if(isset($_POST['submitChoice'])) {
		try {
			$radioChoice = $_POST["choice"];
			}
		catch (exception $e) {
				echo "$e";
				echo "<br>Please select a valid choice.<br>";
				header("refresh: 3, url=services1.php"); //"kick out code"
				exit("<br>bad");
		}
		finally {
			if ($radioChoice == "default") {
				echo "<br>Please select a valid choice.<br>";
				header("refresh: 3, url=services1.php"); //"kick out code"
				exit("<br>bad");
			}
			elseif ($radioChoice == "list") {
				echo "Here is your information: <br>";
				listTrans($db, $ucid);
			}
			//else if choice == reset:
			elseif ($radioChoice == "clear") {
				resetAccount($db, $ucid, $clearAccNum);
				echo "redirecting you back to the services1.php page...";
				header("refresh: 3, url=services1.php"); //"kick out code"
			}
			elseif ($radioChoice == "listTran") {
				listNumTrans($db, $ucid, $accNum, $numTran);
			}
		}

	}
?>