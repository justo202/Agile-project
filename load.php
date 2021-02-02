<?php
if(isset($_POST["load"]))
{
	$file = $_FILES["load"]["name"];
	$fileError = $_FILES["load"]["error"];
	$fileType = $_FILES["load"]["type"];
	
	//seperate '.' from txt and file name 
	$extension = explode(".", $file);
	//convert the txt to lowercase if needed
	$lowerExt = strtolower(end($extension));
	$allowedExts = array("txt", "text/plain");
	
	if (in_array($lowerExt, $allowedExts));
	{
		$fileRead = fopen($file, "r") or die("Unable to open file, please try again!");
		//read line by line unto end of the file
		while(!feof($fileRead))
		{
			if ($fileError === 0)
			{
				echo fgets($fileRead) . "<br>";
			}
			else
			{
				echo "Sorry there was an issue reading from file.";
			}
		}
		fclose($fileRead);
		header("Location: transcript_gen_test.html?loadsuccessful");
	}
}

?>
