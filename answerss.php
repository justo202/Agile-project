

<?php
include 'db.php';
$answers = $_POST['answers'];
$name = $_POST['name'];
$number = $_POST['num'];
$i = 0;
foreach($answers as $answer)
{
  echo $answer." ".$name." ".$number[$i]."<br>";
  $sql = "INSERT INTO `answers` (`Question_Number`, `Questionnaire_Name`, `Answer`) VALUES ('1', '$name', '$answer')";

  if ($link->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}
  $i++;
}
mysqli_close($link);
 ?>
