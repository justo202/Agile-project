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
$allowedExts = array("txt");
$extension = end(explode(".", $_FILES["file"]["name"]));
//varaible that contains details fo files
$fileName = $_FILES["file"]["name"];
//locates the file
$fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

//Check file type

if (isset($_POST["submit"]))
{
	if ($_FILES["file"]["type"] != "text/plain" || !in_array($extension, $allowedExts))
	{
		echo "Invaild file type, please upload a txt file";
	}
	else
	{
		echo "Wohoo it finally works! I mean... file uploaded successfully!";
	}
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