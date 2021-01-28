<!DOCTYPE html>
<html>
<head>
<title>Transcript Analysis</title>
<h1>I swear there is more to this</h1>
</head>

<body>
<form method="post"> 
<input type="text" name="Transcript" placeholder="Enter text here"/> 
<input type="submit" name="submit" value="upload"/> 
<input type="file" name="file"/>

</form>

</body>
</html>

<?php
//check if the form is submitted 

$upload=$_POST["upload"];
//
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
if (isset($_POST["Transcript"]))
	{ //retrieve the data in the form
	$txt=$_POST["Transcript"];
	
	$file = "transcript.txt";
	//write to the file
	$transcript = fopen("$file", "w") or die("Unable to open file!");
	fwrite($transcript, $txt);
	fclose($transcript);
	}
	
//Check file type
if($fileType != "txt")
	{
	echo "Wrong file type, please pick a txt file";
	}
else
	{
	echo "File uploaded! (ssshhhhhh, just pretend for now...)"
	}	


	
	
?>