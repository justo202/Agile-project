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
$dir = "Uploads/";
$file = $dir . basename($_FILES["file"]["name"]);
$upload = 1;
$isTxt = strtolower(pathinfo($dir,PATHINFO_EXTENSION));


$allowedExts = array("txt");
$extension = end(explode(".", $_FILES["file"]["name"]));


//Check file type

if (isset($_POST["submit"]))
{
	if ($isTxt != "txt")
	{
		echo "Invaild file type, please upload a .txt file";
	}
	else
	{
		echo "Wohoo it finally works! I mean... file uploaded successfully!";
		//$upload = 0;
	}
}

if ($upload == 0)
{
	echo "Something went wrong, please try again.";
}
else
{
	if (move_uploaded_file($_FILES["file"]["tmp_name"], $file))
	{
		echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). "has been uploaded.";
	}
	else 
	{
		echo "Sorry, there was an error uploading your file.";
	}
}

		
	
	
	//$file = fopen($_FILES["file"]["tmp_name"], "rb");
	//while ( ($line = fgets($fp)) !== false) 
	//{
		//echo "$line<br>";
	//}
?>