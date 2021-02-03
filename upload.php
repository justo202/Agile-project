<?php
//run when submit butten is clicked
if (isset($_POST['submit']))
{
	$test = $_FILES['file'];
	//the file to be uploaded
	$file = $_FILES['file']['name'];
	//file tmp location when uploading
	$fileTmp = $_FILES['file']['tmp_name'];
	$fileType = $_FILES['file']['type'];
	//for any errors when uploading
	$fileError = $_FILES['file']['error'];
	
	//seperate '.' from txt and file name 
	$extension = explode('.', $file);
	//convert the txt to lowercase if needed
	$lowerExt = strtolower(end($extension));
	
	$allowedExts = array('txt', 'text/plain', 'jpg', 'jpeg');
	
	
	//if file is '.txt' and there is not an error then upload file
	if (in_array($lowerExt, $allowedExts))
	{
		if ($fileError === 0)
		{
			//creates a new id 
			$fileNewID = uniqid('', true).".".$lowerExt;
			//the file path that the file will be moved to
			$dir = '/uploads/'.$fileNewID;
			//transfering file
			move_uploaded_file($fileTmp, $dir);
			header("Location: transcript_gen_test.html?uploadsuccess");
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
	
}

?>