<?php

session_start();
if(isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]==true){
    header("location: Form.php");
    exit;
}

else if (isset($_SESSION["researcherloggedin"])&&$_SESSION["researcherloggedin"]==true){
	header("location: create_questionnaire.php")
}


require_once "user.php";

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter your username.";
    }else
    {
        $username = trim($_POST["username"]);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";     
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err)){
        
        // Prepare an Select statement
        $sql = "SELECT Username, Password FROM user";
         
        if($stmt = $mysql->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);           
            // Set parameters
            $param_username = $username;           
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if ($stmt->rowCount()==1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["ID"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        //if password matches start the session
                        if ($password == $hashed_password) {
                            session_start();
                            //store data in session variables 
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $Participant;

                            header("location: Form.php");
                        }
						else if ($password == $hashed_password) {
							session_start();
							
							$_SESSION["researcherloggedin"] = true;
							$_SESSION["id"] = $id;
							$_SESSION["username"] = $Researcher
							
							header("location: create_questionnaire.php")
						}
						else{
                            $password_err = "The password you entered was not valid";
                        }
                    }
                }else{
                    $username_err = "No account found with that username" ;
                }
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    // Close connection
    unset($mysql);
}
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
    </header>
    <div class="text-center">
    <form class="form-signin">
      <img class="mb-4" src="logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please Sign In</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 1066-2003</p>
    </form>
    </div>
  </body>
</html>

