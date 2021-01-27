
<!doctype html>
<html lang="en">
  <head>

    <title>Form</title>

    <!-- Style Links -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">

  </head>

  <body>

    <?php
    include 'db.php';
    ?>
      <!-- Fixed navbar -->
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

    <!-- Begin page content -->
    <main role="main" class="container">
      <h1 class="mt-5">There's some Questions and that</h1>
      <p class="lead">Just write answers into the boxes and im sure you'll be fine</p>

        <form class="" action="answerss.php" method="post">

          <?php
          $name = $_GET['survey'];

          $sql = "SELECT * FROM `questions` WHERE `Questionnaire_Name` = '$name' ORDER BY `Question_Number` ASC";
          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                $val = 1;
                  while($row = mysqli_fetch_array($result)){

                          echo "<div class=\"form-group\">";
                          echo "<label>Question " . $val++ . ": " . $row['Question'] . "</label>";
                          echo "<input type=\"text\" name = \"answers[]\"class = \"answers form-control\" placeholder = \"Answer\">";
                          echo "<input type = \"hidden\" value = \"".$row['Question']."\" name = \"Question[]\"";
                          echo "<input type = \"hidden\" value = \"".strval($row['Question_Number'])."\" name = \"Number[]\"";
                          echo "</div>";

                  }
                  // Free result set
                  mysqli_free_result($result);
              } else{
                  echo "No records matching your query were found.";
              }
          }
          mysqli_close($link);
          ?>
          <input class = "btn btn-info" type="submit" name="button" value = "Submit"></input>
        </form>


    </main>

     <!--<footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer> -->

  </body>
</html>
