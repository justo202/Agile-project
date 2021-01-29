


    <?php
    include 'db.php';
    header( "refresh:3;url=https://agile-project.azurewebsites.net/home.php" );
    $questionnaire_name = $_POST['questionnaire_name'];
    $creator_name = $_POST['creator_name'];
    $num_of_questions = $_POST['num_of_questions'];


    function get_questions($num_of_questions)
    {
        $questions = array();

        for($x = 1; $x <= $num_of_questions; $x++)
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
        for($x = 1; $x <= $num_of_questions; $x++)
        {
            $add_question_sql = "INSERT INTO questions VALUES ('".$questions_array[$x]."', '".$questionnaire_name."', '".$x."')";
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
          var countDownDate = new Date().getSeconds() +3;

          // Update the count down every 1 second
          var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getSeconds();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
              clearInterval(x);
              document.getElementById("demo").innerHTML = "EXPIRED";
            }
          }, 1000);
        </script>

  </body>
</html>
