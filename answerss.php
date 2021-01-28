

<?php
include 'db.php';
$answers = $_POST['answers'];
$name = $_POST['name'];
$number = $_POST['num'];
$i = 0;
foreach($answers as $answer)
{
  $sql = "INSERT INTO `answers` (`Question_Number`, `Questionnaire_Name`, `Answer`) VALUES ('$number[$i]', '$name', '$answer')";

  if ($link->query($sql) === TRUE) {
} else {
  echo "Error: " . $sql . "<br>" . $link->error;
}
  $i++;
}
mysqli_close($link);
 ?>
 <!doctype html>
 <html lang="en">
   <head>

     <title>Thank you!</title>

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
       <h1 class="h3 mb-3 font-weight-normal">Thank you for completing our survey!</h1>

     </form>
     </div>
   </body>
 </html>
