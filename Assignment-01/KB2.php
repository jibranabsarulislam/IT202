<?php
	session_start();

	if (!isset($_SESSION["auth"])) { //if not defined
		echo "<br>Log in...you will be redirected shortly.";
		header("refresh: 2, url=authenticate.html"); //"kick out code"
		exit();
	} 
	
	if (!isset($_SESSION ["randomAI"])) {
		echo "<br>Incorrect, please try again.";
		header("refresh: 1, url=KB1.php"); //"kick out code"
		exit();
	}

	$answer = strtolower($_REQUEST["answer"]); //grab answer from previous form
	$question = $_SESSION["question"];

	if ($answer == $_SESSION["answer"]) {
		echo "Correct.<br>Question was $question<br>Answer was $answer.<br>";

		echo "Now redirecting to pin1.php...";
		header("refresh: 3, url=pin1.php");
	}
	else {
		echo "<br>Try again...";
		header("refresh: 2, url=KB1.php"); //"kick out code"
		exit();
	}



?>
