<?php
  session_start();


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MMTUTS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
      <header class="container">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#"><img src="r.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Portfolio</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">About me</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
          </div>
        </nav>



      </header>
      <main class="container">
        <div class="">
          <form action="includes/login.inc.php" method="post">
            <input class="form-control" type="text" name="username_email" placeholder="Username/E-mail...">
            <input class="form-control" type="password" name="pwd" placeholder="Password...">
            <button class="form-control" type="submit" name="login-submit">Login</button>
          </form>
          <a href="signup.php">Signup</a>
          <form action="includes/logout.inc.php" method="post">
            <button class="form-control" type="submit" name="logout-submit">Logout</button>
          </form>
        </div>
        <?php
          if(isset($_SESSSION['user_id'])) {
            echo '<p class="text-center">You are logged in!</p>';
          }
          else {
            echo '<p class="text-center">You are logged out!</p>';
          }

        ?>


      </main>




      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>

<!-- get method use korle  je keu data peye jabe, kintu post method e segula pabe na. -->
<!-- amader webdite e jesob page sobai dekhte pabe segula noemally thakbe. kintu jegula je keu dekhte parbe na, log in kore dekhte hobe segula includes folder er vitor ase.  -->
