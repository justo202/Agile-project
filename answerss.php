

<?php
include 'db.php';
$answers = $_POST['answers'];
$name = $_POST['name'];
$number = $_POST['num'];
$i = 0;
foreach($answers as $answer)
{
  echo $answer." ".$name." ".$number[$i]."<br>";
  $sql = "INSERT INTO `answers` (`Question_Number`, `Questionnaire_Name`, `Answer`) VALUES ('$number[$i]', '$name', '$answer');";
  if(!$result = mysqli_query($link, $sql))
  {
    echo "something went wrong";
  }
  $i++;
}
mysqli_close($link);
 ?>
