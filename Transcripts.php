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
//varaible that contains details fo files
$fileName = basename($_FILES["file"]["name"]);
//locates the file
$fileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
 
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

if (isset($_POST["submit"]))
{
	if ($fileType != "txt")
	{
		echo "Wrong file type, Please ensure the file is a txt file.";
	}
	else
	{
		echo "Your file has been uploaded! (Just believe me it is there, just invisibile)";
	}
}	
?>