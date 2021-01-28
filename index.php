<?php

session_start();
if(isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]==true){
    header("location: test.php");
    exit;
}


// Include config file
require_once "db.php";

$email = $password = "";
$email_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email.";
    }else
    {
        $email = trim($_POST["email"]);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Check input errors before inserting in database
    if(empty($email_err) && empty($password_err)){

        // Prepare an Select statement
        $sql = "SELECT Username, Password FROM user";

        if($stmt = $mysql->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            // Set parameters
            $param_email = $email;
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if ($stmt->rowCount()==1) {
                    if ($row = $stmt->fetch()) {
                        $id = $row["ID"];
                        $email = $row["email"];
                        $hashed_password = $row["password"];
                        //if password matches start the session
                        if ($password == $hashed_password) {
                            session_start();
                            //store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            header("location: test.php");
                        }else{
                            $password_err = "The password you entered was not valid";
                        }
                    }
                }else{
                    $email_err = "No account found with that username" ;
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

          </nav>
    </header>

    <div class="text-center">

    <form class="form-signin">
      <img class="mb-4" src="logo.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please Sign In</h1>

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus>

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
