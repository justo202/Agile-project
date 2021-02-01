
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
      <h1 class="mt-5">Questionnaire Name</h1>
      <p class="lead">Please fill out all answers</p>

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


                  if($row['Question_type'] == "open")
                  {
                    echo "<input type=\"text\" name = \"answers[]\"class = \"answers form-control\" placeholder = \"Answer\">";
                    echo "<input type = \"hidden\" value = \"".$row['Question_Number']."\" name = \"num[]\">";
                    echo "</div>";
                  }
                  else if($row['Question_type'] == "multiple_choice")
                  {
                    $answ = explode("||", $row['Options']);
                    foreach($answ as $a)
                    {
                      echo " <div class=\"form-check\">";
                      echo " <input class=\"form-check-input\" type=\"radio\" id = \"".$a."\"name=\"answers[]\" value=\"".$a."\" checked>";
                      echo "<label class=\"form-check-label\" for=\"".$a."\">".$a."</label>";
                      echo "</div>";
                    }
                  }

                  }
                  echo "<input type = \"hidden\" value = \"".$name."\" name = \"name\">";
                  // Free result set
                  mysqli_free_result($result);
              } else{
                  echo "No records matching your query were found.";
              }
          }
          mysqli_close($link);
          ?>
          <input style = "visibility:hidden; "class = "btn btn-info" type="submit" name="button" id = "submitbtn" value = "Submit"></input>
        </form>

    </main>

     <!--<footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer> -->

  </body>
</html>
<script>
var fields = document.getElementsByClassName("answers");
for (var i = 0; i < fields.length; i++) {
  fields[i].addEventListener('input', checkAll);
}
function checkAll()
{
  var empty = "done";
  for (var i = 0; i < fields.length; i++) {
    if(fields[i].value == "")
      empty = "empty";
  }
  if(empty == "done")
    {
      document.getElementById("submitbtn").style = "visibility:visible"
    }
  else {

    document.getElementById("submitbtn").style = "visibility:hidden"
  }
}
</script>
