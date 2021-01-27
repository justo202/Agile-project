<!DOCTYPE html>
<html>
<head>
<title>Transcript Analysis</title>
<h1>I swear there is more to this</h1>
</head>

<body>
<form method="post"> 
<input type="text" name="Transcript" placeholder="Enter text here"/> 
<input type="submit" name="submit"/> 

</form>

</body>
</html>

<?php
//check if the form is submitted  
if (isset($_POST['Transcript']))
	{ //retrieve the data in the form
	$txt = $_POST['Transcript'];
	
	//write to the file
	$transcript = fopen('/Downloads/transcript.txt', 'a+'); //or die("Unable to open file!");
	fwrite($transcript, $txt);
	fclose($transcript);
	}
?>