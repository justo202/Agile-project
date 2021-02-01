 <?php
    include 'db.php';
    header( "refresh:3;url=https://agile-project.azurewebsites.net/home.php" );
    $questionnaire_name = $_POST['questionnaire_name'];
    $creator_name = $_POST['creator_name'];
    $num_of_questions = $_POST['num_of_questions'];

    //Getting the questions that the user has created and storing them in an array
    function get_questions($num_of_questions)
    {
        //Create the array
        $questions = array();

        for($x = 1; $x <= $num_of_questions; $x++)
        {
            //Add each question to the the array
            $questions[$x] = $_POST['question'.$x];
        }

        //Return the filled array
        return $questions;
    }


    function does_questionnaire_exist($questionnaire_name, $link)
    {
        $does_exist_sql = $link->prepare("SELECT * FROM questionnaires WHERE Questionnaire_Name = ?");
        $does_exist_sql->bind_param("s", $questionnaire_name);
        $does_exist_sql->execute();

        $results = $does_exist_sql->get_result();

        $does_exist_sql->close();
        if ($results->num_rows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    $questions_array = get_questions($num_of_questions);

    //This function creates new records in the questionnaire table in the database
    //It will add the name of the questionnaire and the name of the user who created it
    function add_questionaire($questionnaire_name, $creator_name, $link)
    {
        //Store the sql statement in variable $add_questionnaire_sql
        $add_questionnaire_sql = $link->prepare("INSERT INTO questionnaires VALUES (?,?)");
        $add_questionnaire_sql->bind_param("ss", $question_array, $creator_name);
        $add_questionnaire_sql->execute();

        if ($add_questionnaire_sql->affected_rows > 0)
        {
            echo "Questionnaire ".$questionnaire_name." created successfully <br>";
        } else {
            echo "Error: " . $add_questionnaire_sql . "<br>" . $link->error;
        }

        $add_questionnaire_sql->close();
    }

    //This function creates new records in the question table in the database
    //It will add the name of the questionnaire and each question in the questionnaire
    function add_questions($questions_array, $questionnaire_name, $num_of_questions, $link)
    {
        //each question in the questions array will need to be added so the next bit of code is
        //iterates through the array.
        for($x = 1; $x <= $num_of_questions; $x++)
        {
            //Store the sql statement in variable $add_question_sql
            $add_question_sql = $link->prepare("INSERT INTO questions VALUES (?, ?, ?)");
            $add_question_sql->bind_param("ssi", $questions_array[$x], $questionnaire_name, $x);
            $add_question_sql->execute();

            if ($add_question_sql->affected_rows > 0)
            {
                echo $question_array[$x]."<br> added to questionnaire <br>";
            } else {
                echo "Error: " . $add_question_sql . "<br>" . $link->error;
            }

            $add_question_sql->close();
        }
    }

    if(does_questionnaire_exist($questionnaire_name, $link))
    {
        echo "Sorry questionnaire already exists, please edit the name";
    }
    else{
        add_questionaire($questionnaire_name, $creator_name, $link);
        add_questions($questions_array, $questionnaire_name, $num_of_questions, $link);
    }


    ?>

    <!doctype html>
    <html lang="en">
      <head>

        <title>Create Questionaire</title>

        <!-- Style Links -->
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">

      </head>

      <body>
        <!-- Display the countdown timer in an element -->
        <p id="demo"></p>

        <script>
          // Set the date we're counting down to
          var countDownDate = new Date().getSeconds() +6;

          // Update the count down every 1 second
          var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getSeconds();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = "You will be redirected in: " + distance + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
              clearInterval(x);
              document.getElementById("demo").innerHTML = "EXPIRED";
            }
          }, 1000);
        </script>

  </body>
</html>
