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

    function view_answer($i)
    {
        echo $this->answers_arr[$i];
    }
}

function getAnswers($questionnaire_name, $link)
{
    $get_answers_sql = "SELECT Question_Number, Answer FROM answers WHERE Questionnaire_Name = '".$questionnaire_name."'";
    $results = $link->query($get_answers_sql);

    if ($results->num_rows > 0)
    {
        return $results;
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
    }
    else
    {
        echo "Error: <br>" . $link->error;
    }
}

$answer_rows = getAnswers($questionnaire_name, $link);
$question_rows = getQuestions($questionnaire_name, $link);

while($row = $question_rows->fetch_assoc())
{
    $x = 0;

    $results_arr[] = new results();
    $results_arr[$x]->set_question_num($row["Question_Number"]);
    $results_arr[$x]->set_question($row["Question"]);

    $x++;
}


while($row = $answer_rows->fetch_assoc())
{
    $x = $row["Question_Number"]-1;
    $results_arr[$x]->add_answer($row["Answer"]);
}

print_r($results_arr);

?>

<!doctype html>
<html lang="en">
  <head>

    <title>Anwers</title>

    <!-- Style Links -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">

  </head>

  <body>

    <header>
      <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="Index.html">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="Login.html">Login</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="Form.html">Form</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="CreateForm.html">Create Form</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
        <h1 class="mt-5">View Answers</h1>
        <p class="lead">Below you can choose the results you want to see</p>

        <form action="/view_answers.php" method="post">
          <label>Enter Name of Questionnaire:</label>
          <input type="text" id="questionnaire_name" name="questionnaire_name">
          <input type="submit" value="Get Results" class="btn btn-primary"> 
        </form>
      
      <form class="form-group">
        <div class="border border-primary rounded">

            <?php

            for($x=0; $x < sizeof($results_arr); $x++)
            {
                ?>  <label>Question <?php $results_arr[$x]->view_question_num() ?>:</label><br>
                    <small id="Question"><?php $results_arr[$x]->view_question() ?></small>
                    <br><br>

                    <?php 
                        for($i=0; $i < sizeof($results_arr[$answers_arr]); $i++)
                        {
                            ?>
                            <label>Answer <?php echo $i+1 ?>:</label><br>
                            <small id="Answer"><?php $results_arr[$x]->view_answer($i) ?></small>
                            <?php
                        }
            }
            ?>
            
            <label>Question 1:</label><br>
            <small id="Question">Eample Question?</small>
            <br><br>
            <label>Answer 1:</label><br>
            <small id="Answer">Eample Answer.</small>

        </div>

        <br>
        <input type="submit" value="Export" class="btn btn-primary btn-outline-primary">

      </form>

    </main>

     <!--<footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer> -->

  </body>
</html>
