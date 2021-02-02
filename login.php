<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
  </head>
  <body>
    <div id="frm">
      <form action="process.php" method="POST">
        <p>
          <label>Username:</label>
          <input type="text" id="user" name="user">
        </p>
        <p>
          <label>Password:</label>
          <input type="password" id="pass" name="pass">
        </p>
        <div>
          <input type="radio" id="login" name="login" value="login" checked>
          <label for="login">Login</label>
        </div>
        <div>
          <input type="radio" id="signup" name="signup" value="signup">
          <label for="signup">Sign up</label>
        </div>
        <p>
          <input type="submit" id="Login" name="btn" value="Submit" placeholder="Go!">
        </p>
      </form>
    </div>
  </body>
</html>
