<?php
if(isset($_POST['load']))
{
	$test = $_FILES['loadfile'];

	$file = $_FILES['loadfile']['name'];
	$fileError = $_FILES['loadfile']['error'];
	$fileType = $_FILES['loadfile']['type'];
	
	//seperate '.' from txt and file name 
	$extension = explode('.', $file);
	//convert the txt to lowercase if needed
	$lowerExt = strtolower(end($extension));
	
	$allowedExts = array('txt', 'text/plain');
	
	if (in_array($lowerExt, $allowedExts))
	{
		if ($fileError === 0)
		{
			$fileRead = fopen($file, "r") or die("Unable to open file, please try again!");
			//read line by line unto end of the file
			while(!feof($fileRead))
			{
				echo fgets($fileRead) . "<br>";
			}		
			fclose($fileRead);
			header("Location: transcript_gen_test.html?loadsuccessful");
		}
		else
		{
			echo "Sorry there was an issue reading from file.";
		}
	}
	else
	{	
		echo "Invalid file type, please ensure its a txt file.";
	}

}

?>
