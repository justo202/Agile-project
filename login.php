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
        <p>
          <input type="radio" id="login" name="login" value="login" checked>
          <label for="login">Login</label>
        </p>
        <p>
          <input type="submit" id="signup" name="signup" value="signup" checked>
          <label for="signup">Sign up</label>
        </p>
        <p>
          <input type="submit" id="Login" name="btn" value="login" placeholder="Go!">
        </p>
      </form>
    </div>
  </body>
</html>
