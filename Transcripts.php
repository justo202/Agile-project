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
//run when submit butten is clicked
if (isset($_POST["submit"]))
{
	$test = $_FILES["file"];
	print_r($test);
	//the file to be uploaded
	$file = $_FILES["file"]["name"];
	//file tmp name when uploading
	$fileTmp = $_FILES["file"]["tmp_name"];
	$fileType = $_FILES["file"]["type"];
	//for any errors when uploading
	$fileError = $_FILES["file"]["error"];
	
	//seperate '.' from txt and file name 
	$extension = explode(".", $file);
	//convert the txt to lowercase if needed
	$lowerExt = strtolower(end($extension));
	$allowedExts = array("txt");
	
	/*
	//if file is '.txt' and there is not an error then upload file
	if (in_array($lowerExt, $allowedExts))
	{
		if ($fileError === 0)
		{
			//creates a new id 
			$fileNewID = uniqid("", true).".".$lowerExt;
			//the file path that the file will be moved to
			$dir = "Uploads/".$fileNewID;
			//transfering file
			move_uploaded_file($fileTmp, $dir);
			header("Location: Transcripts.php?uploadsuccess");
		}
		else 
		{
			echo "Something went wrong uploading your file, please try again.";
		}
	}
	else
	{
		echo "Please ensure the file is a txt file.";
	}
	
	*/
}

?>