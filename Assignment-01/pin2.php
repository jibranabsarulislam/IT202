<?php
	session_start();
	
	if (!isset($_SESSION["auth"])) { //if not defined
		echo "<br>Log in...you will be redirected shortly.";
		header("refresh: 2, url=authenticate.html"); //"kick out code"
		exit();
	} 
	
?>
	<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- import the webpage's stylesheet -->
    <link rel="stylesheet" href="resources/style.css">
    
    <!-- import the webpage's javascript file -->
    <script src="resources/script.js" defer></script>
  </head>  
  <body>
    <div class = "logout">
      
    
    <button type = "button" onclick = "logout.php">
      Logout
    </button>
    </div>
  </body>
</html>

<?php
	//TODO:
	/*
		Grab pin from pin1.php since it's not reaching the code here


	*/

	if(!isset($_SESSION["pin"])) {
		echo ("Please retry login...");
		header("refresh: 2, url=authenticate.html"); //"kick out code"
		exit();
	}
	$inPin = $_GET["pinn"];
	// echo $inPin;
	if($inPin != $_SESSION["pin"]) {
		echo ("Please retry...");
		echo ("\npin was: "); echo $_POST["pinn"];
		header("refresh: 2, url=pin1.php"); //"kick out code"
		exit();
	}
	else {
		$_SESSION["pinPassed"] = true;
		echo("Verification complete! Redirecting...");
		header("refresh: 2, url=services1.php");
	}

?>
