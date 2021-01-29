<!doctype html>
<html lang="en">
  <head>

    <title>Home</title>

    <!-- Style Links -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">

  </head>

  <body>
    <?php
    include 'db.php';
    ?>
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
</nav>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Dundee University Questionnaires</h1>
          <p class="lead text-muted">place holder</p>
          <p>
            <a href="CreateForm.html" class="btn btn-primary my-2">Create Survey</a>
            <a href="Answers.html" class="btn btn-secondary my-2">Questionnaire Insights</a>
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">


          <div class="card-deck mb-3 text-center">

            <?php


            $sql = "SELECT * FROM `questionnaires`";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                      echo "<div class = \"col-6\">";
                      echo "<div class=\"card mb-4 box-shadow\">";
                      echo "<div class=\"card-header\"><h4 class=\"my-0 font-weight-normal\">".$row['Questionnaire_Name']."</h4> </div>";
                      echo "<div class=\"card-body\">";
                      echo "<p class=\"card-text\">Questionaire by ".$row['Creator_Name']."</p>";
                      echo "<button onclick = \"window.location.href = 'form.php?survey=". $row['Questionnaire_Name'] ."'\" type=\"button\" class=\"btn btn-lg btn-block btn-outline-primary\">Take Questionaire</button>";
                      echo "<button onclick = \"window.location.href = 'download.php?name=". $row['Questionnaire_Name'] ."'\" type=\"button\" class=\"btn btn-lg btn-block btn-outline-primary\">Download answer data</button>";
                      echo "</div></div></div>";

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
</div>
    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>place holder</p>
      </div>
    </footer>


  </body>
</html>
