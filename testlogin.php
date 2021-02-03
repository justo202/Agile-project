<?php
  include 'db.php';
  $username = $_POST['user'];
  $password = $_POST['pass'];

  $username = stripcslashes($username);
  $password = stripcslashes($password);
  $username = mysql_real_escape_string($username);
  $password = mysql_real_escape_string($password);

  if (empty($username)||empty($password)) {
    echo "Failed to Login!";
  }
  else {
    $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
    //$result = mysql_query("select * from users where username = '$username' and password = '$password'")
    //            or die("Failed to query database ".mysql_error());
    $row = mysql_fetch_array($result);
    if ($row['username'] == $username && $row['password'] == $password) {
      echo '<h1><b>Login Succesfull '. $username .'!</b> </h1>';
    } else {
      echo "Failed to Login!";
    }
  }
 ?>

 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
  </head>
  <body>
    <div id="frm">
      <form method="POST">
        <p>
          <label>Username:</label>
          <input type="text" id="user" name="user">
        </p>
        <p>
          <label>Password:</label>
          <input type="password" id="pass" name="pass">
        </p>
        <p>
          <input type="submit" id="btn" name="Login">
        </p>
      </form>
    </div>
  </body>
</html>
