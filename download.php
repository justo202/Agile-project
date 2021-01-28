<?php
  include 'db.php';
  $name = $_GET['name'];
  $myfile = fopen("data.txt", "w") or die("Unable to open file!");
  $sql = "SELECT * FROM `answers` WHERE `Questionnaire_Name` = '$name' ORDER BY `Question_Number` ASC";
  if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0){
        fwrite($myfile, "'$name'\n");
          while($row = mysqli_fetch_array($result)){
            $txt = "Answers to question 1";
            fwrite($myfile, $txt);
          }
          // Free result set
          mysqli_free_result($result);
      } else{
          $txt = "No data found for this survey";
          fwrite($myfile, $txt);
      }
header('Content-Type: application/download');
header('Content-Disposition: attachment; filename="data.txt"');
header("Content-Length: " . filesize("data.txt"));
//$fp = fopen("data.txt", "r");
fpassthru($myfile);
echo "hello, this is a test";
fclose($myfile);
  }
  mysqli_close($link);
 ?>
