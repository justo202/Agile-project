

<?php
include 'db.php';
$answers = $_POST['answers'];
$name = $_POST['name'];
$number = $_POST['num'];
$i = 0;
foreach($answers as $answer)
{
  $sql = "INSERT INTO `answers` (`Question_Number`, `Questionnaire_Name`, `Answer`) VALUES ('$number[$i]', '$name', '$answer')";

  if ($link->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}
  $i++;
}
mysqli_close($link);
 ?>
