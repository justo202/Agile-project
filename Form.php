
<!doctype html>
<html lang="en">
  <head>

    <title>Form</title>

    <!-- Style Links -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">

  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="Index.html">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="Login.html">Login</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="Form.html">Form</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <h1 class="mt-5">There's some Questions and that</h1>
      <p class="lead">Just write answers into the boxes and im sure you'll be fine</p>
      
      <div class="form-group">
        <label for="Question1">Question 1</label>
        <input type="email" class="form-control" id="Question1" placeholder="Answer">
        <small id="Question1Help" class="form-text text-muted">Use good grammar dumb dumb</small>
      </div>

      <div class="form-group">
        <label for="Question2">Question 2</label>
        <input type="email" class="form-control" id="Question2" placeholder="Answer">
        <small id="Question2Help" class="form-text text-muted">Use good grammar dumb dumb</small>
      </div>

      <div class="form-group">
        <label for="Question3">Question 3</label>
        <input type="email" class="form-control" id="Question1" placeholder="Answer">
        <small id="Question3Help" class="form-text text-muted">Use good grammar dumb dumb</small>
      </div>

      <div class="form-group">
        <label for="MultiChoice1">Big many answer question</label>
        <select class="form-control" id="MultiChoice1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>

    </main>

     <!--<footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer> -->

  </body>
</html>
