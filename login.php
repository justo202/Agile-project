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
          <input type="radio" id="login" name="buttn" value="login" checked>
          <label for="login">Log in</label>
        </div>
        <div>
          <input type="radio" id="signup" name="buttn" value="signup">
          <label for="signup">Sign up</label>
        </div>
        <p>
          <button type="submit" onclick="myFunction()" id="Submit" name="btn" value="Submit" placeholder="Go!">
        </p>
      </form>
    </div>

    <script>
    function myFunction() {
      var x = document.getElementById("login").checked;
      document.getElementById("demo").innerHTML = x;
    }
    </script>

  </body>
</html>
