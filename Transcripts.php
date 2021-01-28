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


//Check file type

//if (isset($_POST["submit"]))
//{
	if ($_FILES["file"]["type"] != "text/plain" || !in_array($extension, $allowedExts))
	{
		echo "Invaild file type, please upload a txt file";
	}
	else
	{
		echo "Wohoo it finally works! I mean... file uploaded successfully!";
	}
//}	
 	
	$file = fopen($_FILES["file"]["tmp_name"], "rb");
	while ( ($line = fgets($fp)) !== false) 
	{
		echo "$line<br>";
	}

}
	
?>