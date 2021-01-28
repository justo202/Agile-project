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
$fileName = $_FILES["file"]["name"];
//locates the file
$fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

//Check file type

if (isset($_POST["submit"]))
{
	if (preg_match('\.txt$', $fileName))
	{
		echo "Wrong file type, please ensure the file is a txt file.";
	}
	else
	{
		echo "Your file has been uploaded! (Just believe me it is there, just invisibile)";
	}
	
 
if (isset($_POST["Transcript"]))
{ //retrieve the data in the form
	$txt=$_POST["Transcript"];
	
	$file = "transcript.txt";
	//write to the file
	$transcript = fopen("$file", "w") or die("Unable to open file!");
	fwrite($transcript, $txt);
	fclose($transcript);
}
	
?>