<?php
  include 'db.php';
  $name = $_GET['name'];
  $myfile = fopen("data.txt", "w") or die("Unable to open file!");
  header('Content-Type: application/download');
  header('Content-Disposition: attachment; filename="data.txt"');
  header("Content-Length: " . filesize("data.txt"));
  fpassthru($myfile);

  $sql = "SELECT * FROM `answers` WHERE `Questionnaire_Name` = '$name' ORDER BY `Question_Number` ASC";
  if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0){
        echo "$name\n";
        $num = " ";
          while($row = mysqli_fetch_array($result)){
            if($num != $row['Question_Number'])
              {
              echo "\nQuestion ".$row['Question_Number'].".\n";
              $num = $row['Question_Number'];
              }
            echo "- ".$row['Answer']."\n";
          }
          // Free result set
          mysqli_free_result($result);
      } else{
        echo "Failed to find data for the survey";
      }

//$fp = fopen("data.txt", "r");

echo "hello, this is a test";

  }
  fclose($myfile);
  mysqli_close($link);
 ?>
