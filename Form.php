
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
            <a class="navbar-brand" href="logout.php">Log out</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <h1 class="mt-5"><?php echo $_GET['survey']; ?></h1>
      <p class="lead">Please fill out all answers</p>

        <form class="" action="form_review.php" method="post">

          <?php
          $name = $_GET['survey'];

          $sql = "SELECT * FROM `questions` WHERE `Questionnaire_Name` = '$name' ORDER BY `Question_Number` ASC";
          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                $val = 1;
                  while($row = mysqli_fetch_array($result)){

                          echo "<div class=\"form-group\">";
                          echo "<label>Question " . $val++ . ": " . $row['Question'] . "</label>";
                          echo "<input type = \"hidden\" value = \"".$row['Question']."\" name = \"question[]\">";


                  if(strval($row['Question_Type']) == "open")
                  {

                    echo "<input type=\"text\" name = \"answers[]\"class = \"answers form-control\" placeholder = \"Answer\">";
                    echo "<input type = \"hidden\" value = \"".$row['Question_Number']."\" name = \"num[]\">";
                    echo "</div>";
                  }
                  else if($row['Question_Type'] == "multiple_choice")
                  {
                    $answ = explode("||", $row['Options']);
                    foreach($answ as $a)
                    {
                      echo " <div class=\"form-check\">";
                      echo " <input class=\"form-check-input\" type=\"radio\" id = \"".$a."\"name=\"answers[]\" value=\"".$a."\" checked>";
                      echo "<label class=\"form-check-label\" for=\"".$a."\">".$a."</label>";

                    }
                    echo "</div>";
                    echo "<input type = \"hidden\" value = \"".$row['Question_Number']."\" name = \"num[]\">";
                    echo "</div>";
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
