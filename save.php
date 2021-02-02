<?php
if(isset($_POST["save"]))
{
	//user names the text file
	$save = readline("Enter a file name: ");
	$file = fopen("$save.txt", 'a+') or die("Unable to save, please try again later.");
	//data writes here
	$txt = "";
	fwrite($file, $txt);
	fclose($file);
	header("Location: Transcripts.php?savesuccess");	
}
?>