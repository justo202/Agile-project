

<?php
// Initialize the session
session_start();
include 'db.php';
$answers = $_POST['answers'];
$name = $_POST['name'];
$number = $_POST['num'];
$user = $_SESSION["username"];
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
 $sqlanswer = "INSERT INTO `completed_questionnaires`(`Questionnaire_Name`, `Username`) VALUES ('$name','$user')";
 if ($link->query($sqlanswer) === TRUE) {
} else {
 echo "Error: " . $sqlanswer . "<br>" . $link->error;
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
           <a class="navbar-brand" href="home.php">Home</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <a class="navbar-brand" href="logout.php">Log out</a>
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
