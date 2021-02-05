
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
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="EthicsForm.html">Ethics Form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="list.php">Completion list</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="transcript_gen_test.php">Tag transcript</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="logout.php">Log out</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
</nav>

    <!-- Begin page content -->
    <main role="main" class="container">
      <div class="container">
        <h1 class = "mt-2 mb-2">Completed questionaire table</h1>
          <input type="text" onkeyup="myFunction()" id = "inputText"class="mt-2 mb-2 form-control" placeholder="Enter questionaire name to search for...">
        <div class="table-responsive table-parent" style = "max-height: 500px;background-color: white;">
      <table class="table table-hover table-striped" id = "inputTable" style = "background-color: white;margin-bottom:0px;">
        <thead>
            <tr>
              <th scope="col">Qutesionaire</th>
              <th scope="col">User</th>
            </tr>
        </thead>
        <tbody>
          <?php
              $sql = "SELECT * FROM `completed_questionnaires` WHERE 1";
              $result = mysqli_query($link, $sql);
                if(mysqli_num_rows($result) > 0){

              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                  echo "<td>".$row['Questionnaire_Name']."</td>";
                  echo "<td>".$row['Username']."</td>";
                  echo "</tr>";
                }
              }
              else{
                  echo "No records matching your query were found.";
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
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("inputText");
  filter = input.value.toUpperCase();
  table = document.getElementById("inputTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 1; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
