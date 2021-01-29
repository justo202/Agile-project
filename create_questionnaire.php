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
          <a class="navbar-brand" href="home.php">Home</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <a class="navbar-brand" href="index.php">Log out</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <?php
         include 'db.php';
         //header( "refresh:6;url=https://agile-project.azurewebsites.net/home.php" );
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

         $questions_array = get_questions($num_of_questions);

         //This function creates new records in the questionnaire table in the database
         //It will add the name of the questionnaire and the name of the user who created it
         function add_questionaire($questionnaire_name, $creator_name, $link)
         {
             //Store the sql statement in variable $add_questionnaire_sql
             $add_questionnaire_sql = "INSERT INTO questionnaires VALUES ('".$questionnaire_name."', '".$creator_name."')";

             if ($link->query($add_questionnaire_sql) === TRUE)
             {
                 echo "Questionnaire ".$questionnaire_name." created successfully <br>";
             } else {
                 echo "Error: " . $add_questionnaire_sql . "<br>" . $link->error;
             }
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
    </main>

     <!--<footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer> -->

  </body>
</html>
