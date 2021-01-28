<?php

include 'db.php';

// $questionnaire_name = $_POST['questionnaire_name'];
$questionnaire_name = 'Test Questionnaire';
$results_arr = array();

class results {

    public $question_num;
    public $question;
    public $answers_arr = array();

    function set_question_num($question_num)
    {
        $this->question_num = $question_num;
    }

    function set_question($question)
    {
        $this->question = $question;
    }

    function add_answer($answer)
    {
        $this->answers_arr[] = $answer;
    }

    function view_question_num()
    {
        echo $this->question_num;
    }

    function view_question()
    {
        echo $this->question;
    }
}

function getAnswers($questionnaire_name, $link)
{
    $get_answers_sql = "SELECT Question_Number, Answer FROM answers WHERE Questionnaire_Name = '".$questionnaire_name."'";
    $results = $link->query($get_answers_sql);

    if ($results->num_rows > 0)
    {
        echo "successfully retrieved answers<br>";
        return $results->fetch_assoc();
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
        echo "successfully retrieved questions<br>";
        return $results->fetch_assoc();
    } 
    else 
    {
        echo "Error: <br>" . $link->error;
    }
}

$answer_rows = getAnswers($questionnaire_name, $link);
$question_rows = getQuestions($questionnaire_name, $link);

while($row = $question_rows)
{
    $x = 0;

    $results_arr[$x] = new results();
    $results_arr[$x]->set_question_num($row["Question_Number"]);
    $results_arr[$x]->set_question($row["Question"]);

    $results_arr[$x]->view_question_num();
    $results_arr[$x]->view_question();
    echo 'im working here';

    $x++;
}

?>