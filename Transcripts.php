<!DOCTYPE html>
<html>
<head>
<title>Transcript Analysis</title>
</head>

<body>
<form action="getmethod.php" method="get"> <input type="text" name="Transcript" placeholder="Enter text here" /> <input type="submit" name="submit" /> </form>

<?php
//check if the form is submitted  
if ( isset( $_GET['submit'] ) )
	{ //retrieve the data in the form
	$txt = $_GET['Transcript'];
	
	//display the results
	echo $txt;
	
	//write to the file
	$transcript = fopen("transcript.txt", "w") or die("Unable to open file!")
	$txt = $_GET['Transcript'];
	fwrite($transcript, $txt);
	fclose($transcript);
	}
?>
	
</body>
</html>