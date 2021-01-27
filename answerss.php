<?php
$answers = $_POST['answers'];
$question = $_POST['Question'];
$number = $_POST['num'];
$i = 0;
foreach($answers as $answer)
{
echo $answer." ".$question[$i]." ".$number[$i]."<br>";
$i++;
}
 ?>
