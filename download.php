<?php
  include 'db.php';
  $name = $_GET['name'];
  $myfile = fopen("data.txt", "w") or die("Unable to open file!");
  $sql = "SELECT * FROM `answers` WHERE `Questionnaire_Name` = '$name' ORDER BY `Question_Number` ASC";
  if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) > 0){
        fwrite($myfile, "'$name'\n")
          while($row = mysqli_fetch_array($result)){
            $txt = "Answers to question 1";
            fwrite($myfile, $txt);
          }
          // Free result set
          mysqli_free_result($result);
      } else{
          $txt = "No data found for this survey";
          fwrite($myfile, $txt);
      }
header('Content-Type: application/download');
header('Content-Disposition: attachment; filename="data.txt"');
header("Content-Length: " . filesize("data.txt"));
//$fp = fopen("data.txt", "r");
fpassthru($myfile);
fclose($myfile);
  }
  mysqli_close($link);
 ?>
 <!doctype html>
 <html lang="en">
   <head>

     <title>Login</title>

     <!-- Style Links -->
     <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
     <link rel="stylesheet" href="LoginStyle.css">

   </head>

   <body>

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

             <a class="navbar-brand" href="CreateForm.php">Create Form</a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
             </button>
     </header>

     <div class="text-center">

     <form class="form-signin">
       <img class="mb-4" src="logo.png" alt="" width="72" height="72">
       <h1 class="h3 mb-3 font-weight-normal">Download should be starting soon!</h1>

     </form>
     </div>
   </body>
 </html>
