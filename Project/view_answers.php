<?php

include 'db.php';

// $questionnaire_name = $_POST['questionnaire_name'];
$questionnaire_name = 'Maths Test Quiz';
echo 'im working';

function getAnswers($questionnaire_name, $link)
{
    $get_answers_sql = "SELECT Question_Number, Answer FROM answers WHERE Questionnaire_Name = '".$questionnaire_name."'";
    if ($link->query($get_answers_sql) === TRUE)
    {
        echo "successfully retrieved answers<br>";
    } else {
        echo "Error: <br>" . $link->error;
    }
}

getAnswers($questionnaire_name, $link);

?>