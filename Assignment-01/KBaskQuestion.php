<?php
	session_start();
?>
	<form action="KB2.php">
	    <!--output question, and take the submission box as an answer-->

	    <p>
	    	Question: 
	    	<?php 
	    	$outputQuestion = $_SESSION["question"];
	    	echo $outputQuestion; 
	    	?>
	    	<br>
	      Answer: 
	      <br> (Enter: <?php $outputAnswer = $_SESSION["answer"]; echo $outputAnswer; ?>)
	      <input type="text" id="answer" name="answer" class="absolute" />
	    </p>
	    <input type="submit" id="submit" value="SUBMIT" />
	  </form>

