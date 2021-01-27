<!DOCTYPE html>
<html>
<head>
<title>Transcript Analysis</title>
</head>

<body>
<form method="post"> <input type="text" name="Transcript" placeholder="Enter text here" /> <input type="submit" name="submit" /> </form>

</body>
</html>

<?php
//check if the form is submitted  
if (isset($_POST['submit'] ) )
	{ //retrieve the data in the form
	$txt = $_POST['Transcript'];
	
	//display the results
	echo $txt;
	
	//write to the file
	$transcript = fopen("transcript.txt", "a") or die("Unable to open file!");
	fwrite($transcript, $txt);
	fclose($transcript);
	}
?>