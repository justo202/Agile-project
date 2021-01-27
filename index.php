<!doctype html>
<html lang="en">
  <head>

    <title>Question</title>

    <!-- Style Links -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">

  </head>

  <body>
    <?php
    include 'db.php';
    ?>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="Index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="Login.php">Login</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="Form.php">Form</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Big 'ol Question Webpage</h1>
          <p class="lead text-muted">This project should definatly be software based...</p>
          <p>
            <a href="#" class="btn btn-primary my-2">Create Survey</a>
            <a href="#" class="btn btn-secondary my-2">Don't Create Survey</a>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">

            <?php


            $sql = "SELECT * FROM `questionnaires`";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                      echo "<div class=\"col-md-4\">";
                      echo "<div class=\"card mb-4 box-shadow\">";
                      echo "<div class=\"card-body\">";
                      echo "<p class=\"card-text\">" . $row['Questionnaire_Name'] ."</p>";
                      echo "<p class=\"card-text\">" . $row['Creator_Name'] ."</p>";
                      echo "<div class=\"d-flex justify-content-between align-items-center\">";
                      echo "<div class=\"btn-group\">";
                      echo "<button href = \"form.php?survey=" . $row['Questionnaire_Name'] . " \" type=\"button\" class=\"btn btn-sm btn-outline-secondary\">Take Questionaire</button>";
                      echo "</div></div></div></div></div>";

                    }
                    // Free result set
                    mysqli_free_result($result);
                } else{
                    echo "No records matching your query were found.";
                }
            }
            mysqli_close($link);
            ?>
          </div>
        </div>
      </div>

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>This is the bottom of the page</p>
      </div>
    </footer>


  </body>
</html>
