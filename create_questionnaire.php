<?php
include 'db.php';

$questionnaire_name = $_POST['questionnaire_name'];
$creator_name = $_POST['creator_name'];
$num_of_questions = $_POST['num_of_questions'];


function get_questions($num_of_questions)
{
    $questions = array();

    for($x = 0; $x < $num_of_questions; $x++)
    {
        $questions[$x] = $_POST['question'.$x];
    }

    return $questions;
}

$questions_array = get_questions($num_of_questions);

function add_questionaire($questionnaire_name, $creator_name, $link)
{
    $add_questionnaire_sql = "INSERT INTO questionnaires VALUES ('".$questionnaire_name."', '".$creator_name."')";
    if ($link->query($add_questionnaire_sql) === TRUE)
    {
        echo "Questionnaire ".$questionnaire_name." created successfully <br>";
    } else {
        echo "Error: " . $add_questionnaire_sql . "<br>" . $link->error;
    }
}

function add_questions($questions_array, $questionnaire_name, $num_of_questions, $link)
{
    for($x = 0; $x < $num_of_questions; $x++)
    {
        $add_question_sql = "INSERT INTO questions VALUES ('".$questions_array[$x]."', '".$questionnaire_name."')";
        if ($link->query($add_question_sql) === TRUE)
        {
            echo $question_array[$x]."<br> added to questionnaire <br>";
        } else {
            echo "Error: " . $add_question_sql . "<br>" . $link->error;
        }
    }
}

add_questionaire($questionnaire_name, $creator_name, $link);
add_questions($questions_array, $questionnaire_name, $num_of_questions, $link);


?>