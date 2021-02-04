<?php
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

?>

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
        <a class="navbar-brand" href="EthicsForm.html">Ethics Form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="logout.php">Log out</a>
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
          <img class="mb-4" src="logo.png" alt="" width="100" height="100"><br>
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
                      echo "<div class = \"col-4\">";
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
    <footer>
        <div class="row justify-content-center mb-0 pt-5 pb-0 row-2 px-3">
            <div class="col-12">
                <div class="row row-2">
                    <div class="col-sm-3 text-md-center">
                        <h5><span> <i class="fa fa-firefox text-light" aria-hidden="true"></i></span><b> Dundee University</b></h5>
                    </div>
                    <div class="col-sm-3 my-sm-0 mt-5">
                        <ul class="list-unstyled">
                            <li class="mt-0">Info</li>
                        </ul>
                    </div>
                    <div class="col-sm-3 my-sm-0 mt-5">
                        <ul class="list-unstyled">
                            <li class="mt-0">Info</li>
                        </ul>
                    </div>
                    <div class="col-sm-3 my-sm-0 mt-5">
                        <ul class="list-unstyled">
                            <li class="mt-0">Info</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-0 pt-0 row-1 mb-0 px-sm-3 px-2">
            <div class="col-12">
                <div class="row my-4 row-1 no-gutters">
                    <div class="col-sm-3 col-auto text-center"><small>&#9400; Our Company</small></div>
                    <div class="col-md-3 col-auto "></div>
                    <div class="col-md-3 col-auto"></div>
                    <div class="col my-auto text-md-left text-right "> <small> mail@mail.com <span><img src="https://i.imgur.com/TtB6MDc.png" class="img-fluid " width="25"></span> <span></small></div>
                </div>
            </div>
        </div>
    </footer>


  </body>
</html>
