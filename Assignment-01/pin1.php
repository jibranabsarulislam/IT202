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
	// echo "pin1.php";
	unset($_SESSION["pin"]);

	$rand =mt_rand(10000,99999);
	$pin = $rand; //set random 5 digit pin
	// echo "pin: $pin, rand = $rand";
	$_SESSION ["pin"] = $pin;
	//sending to hard coded email for demonstration
	$to = "jga26@njit.edu";
	$subject = "Your PIN is...";

	$message = "$pin. You may use this code to login!";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	echo " <br> pin is $pin";
	mail($to, $subject, $message, $headers);
	echo " <br> pin sent to $to";

?>

<html>
	<form action = "pin2.php" >
			
		<input type = "text" name ="pinn" id="pinn" > Enter pin here. <br>
		<input type = submit >
	</form>
		
	
</html>
