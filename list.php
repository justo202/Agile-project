
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
      <div class="container">
        <div class="table-responsive table-parent" style = "height: 500px;background-color: white;">
      <table class="table table-hover table-striped" id = "table_to_highlight" style = "background-color: white;">
        <thead>
            <tr>
              <th scope="col">Qutesionaire</th>
              <th scope="col">User</th>
            </tr>
        </thead>
        <tbody>
          <?php
              $stmt = $link->query("SELECT * FROM `completed_questionnaires` WHERE 1");
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                  echo "<tr>";
                  echo "<td>".$row['Questionnaire_Name']."</td>";
                  echo "<td>".$row['Username']."</td>";
                  echo "</tr>";
                }
          ?>
        </tbody>

      </table>
      </div>
      </div>

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
