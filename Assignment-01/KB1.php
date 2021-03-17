<?php

	session_start();
?>
<html lang="en">
	<head>
	    <meta charset="utf-8"/>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	    <meta name="viewport" content="width=device-width, initial-scale=1"/>
		    
	    <!-- import the webpage's stylesheet -->
	    <link rel="stylesheet" href="resources/style.css" />
		    
	    <!-- import the webpage's javascript file -->
	    <script src="resources/script.js" defer> </script>
	</head>  

	<body>

   		<div class = "logout">
   			<form action = "./logout.php" id ="logoutForm">
			
			</form>
			<button type = "Submit" form = "logoutForm" value = "Logout">Logout</button>
		</div>
  	</body>
</html>

<?php
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	ini_set('display_errors', 1);
	
	setcookie("doneBy", "absarulislam", time() + (86400*30),"/");
	setcookie("doneAt", date('l jS \of F Y h:i:s A'), time() + (86400*30), "/");

	if (!isset($_SESSION["auth"])) { //if not defined
		echo "<br>Log in...you will be redirected shortly.";
		header("refresh: 2, url=authenticate.html"); //"kick out code"
		exit();
	} 

	include ("account.php");
	$db = mysqli_connect($hostname,$username,$password, $project);
	if (mysqli_connect_errno()) {     
		echo "Failed to connect to MySQL: " . mysqli_connect_error();  
		exit();
	}
	echo "Connected...<br>";

	global $t;
	$ucid=$_SESSION["ucid"];
	$pass=$_SESSION["pass"];
	$s = "SELECT MIN(AI) AS smallest, MAX(AI) AS biggest FROM `security-questions` WHERE ucid = '$ucid'"; //Grab min
	echo "<br>SQL select statement is $s<br>";

	($t = mysqli_query($db, $s)) or (die(mysqli_error($db)));
	$num = mysqli_num_rows ($t);
	$r = mysqli_fetch_array ($t, MYSQLI_ASSOC);

	$AI_Low = $r["smallest"];
	$AI_High = $r["biggest"];
	$randomAI = mt_rand ($AI_Low, $AI_High);


	$s = "SELECT * FROM `security-questions` WHERE AI ='$randomAI'";
	// echo "<br>SQL select statement is $s<br>";

	($t = mysqli_query($db, $s)) or (die(mysqli_error($db)));
	$num = mysqli_num_rows ($t);
	$r = mysqli_fetch_array ($t, MYSQLI_ASSOC);
	$question	 =	 $r ["question"];
	$answer 	 = 	 $r ["answer"];
	$_SESSION ["question"] 	=	 $question;
	$_SESSION ["answer"]	= 	 $answer;
	// echo "$question";

	include("myfunctions.php");

	if (!authenticate ($db, $ucid, $pass)) { //fail
		echo "<br>Authentication failed, please log back in...<br>";
		header("refresh: 3, url=authenticate.html"); //"kick out code"
		exit("<br>bad");
	} 
	
	else { //success
	
		$_SESSION ["randomAI"] 	= 	 $randomAI;
		$_SESSION ["question"] 	=	 $question;
		$_SESSION ["answer"]	= 	 strtolower($answer);
		//header("refresh: 3, url= z3KB.php "); 
		// header("refresh: 0, url= KBaskQuestion.php"); 
		// exit("<br>good");
	}
?>
<html>
		<form method="POST" action = "KB2.php">
	    <p>
	    	Question: 
	    	<?php 
	    	$outputQuestion = $_SESSION["question"];
	    	echo $outputQuestion; 
	    	?>
	    	<br>
	      Answer: 
	      (Enter: <?php $outputAnswer = $_SESSION["answer"]; echo $outputAnswer; ?>)
	      <input type="text" id="answer" name="answer" class="absolute" />
	    </p>
	    <input type="submit" id="submit" value="SUBMIT" />
	  </form>
</html>


