<?php

include 'db.php';

// $questionnaire_name = $_POST['questionnaire_name'];
$questionnaire_name = 'Test Questionnaire';

function getAnswers($questionnaire_name, $link)
{
    $get_answers_sql = "SELECT Question_Number, Answer FROM answers WHERE Questionnaire_Name = '".$questionnaire_name."'";
    $results = $link->query($get_answers_sql);

    if ($results->num_rows > 0)
    {
        return $results;
        echo "successfully retrieved answers<br>";
    } 
    else 
    {
        echo "Error: <br>" . $link->error;
    }
}


function getQuestions($questionnaire_name, $link)
{
    $get_questions_sql = "SELECT Question_Number, Question FROM questions WHERE Questionnaire_Name = '".$questionnaire_name."'";
    $results = $link->query($get_questions_sql);

    if ($results->num_rows > 0)
    {
        return $results;
        echo "successfully retrieved questions<br>";
    } 
    else 
    {
        echo "Error: <br>" . $link->error;
    }
}

getAnswers($questionnaire_name, $link);
getQuestions($questionnaire_name, $link);

?>