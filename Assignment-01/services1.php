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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- import the webpage's stylesheet -->
    <link rel="stylesheet" href="resources/style.css" />

    <!-- import the webpage's javascript file -->
    <script src="resources/script.js" defer></script>
  </head>

  <body>
    <div class="logout">
      <form action="./logout.php" id="logoutForm"></form>
      <button type="Submit" form="logoutForm" value="Logout">Logout</button>
    </div>
  </body>
  <div class="container">
    <form method="POST" action="services2.php">
      <input
        type="radio"
        id="default"
        name="choice"
        value="default"
        checked
        disabled
      />
      <label for="default">Choose</label><br />
      <input
        type="radio"
        id="list"
        name="choice"
        value="list"
        onclick="toggleClear();toggleTran();enableButton();clearLT();clearClear();"
      />
      <label for="list">List All</label><br />
      <input
        type="radio"
        id="clear"
        name="choice"
        value="clear"
        onclick="toggleClear();toggleTran();enableButton();clearLT();"
      />
      <label for="clear">Clear</label><br />
      <div id="clearAcc" style="display:none">
        <input type="text" id="clearAccNum" name="clearAccNum" /> Enter Account#
        <br />
      </div>
      <input
        type="radio"
        id="listTransactions"
        name="choice"
        value="listTran"
        onclick="toggleClear();toggleTran();enableButton();clearClear();"
      />
      <label for="listTransactions">List Transactions</label><br />

      <div id="listTran" style="display:none">
        <input type="text" id="accNum" name="accNum" /> Enter Account# <br />
        <input type="number" id="numTran" name="numTran" /> Number Transactions
      </div>

      <input
        type="submit"
        id="submitChoice"
        name="submitChoice"
        value="SUBMIT"
        disabled
      />
    </form>
  </div>
</html>
