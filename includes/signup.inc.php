<?php

if (isset($_POST['signup-submit'])) {
    require 'dbhandler.inc.php';

    $username = $_POST['username'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $password_repeat = $_POST['pwd-repeat'];

    if(empty($username) || empty($email) || empty($password) || empty($password_repeat)){
        header("Location: ../signup.php?error=emptyfields&username=".$username."&mail=".$email);
        exit(); // it is to exist from this page and not to run below codes.
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location: ../signup.php?error=InvalidMailUsername");
        exit(); // it is to exist from this page and not to run below codes.
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../signup.php?error=InvalidMail&username=".$username);
        exit(); // it is to exist from this page and not to run below codes.
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=InvalidUsername&mail=".$email);
        exit(); // it is to exist from this page and not to run below codes.
    }
    else if($password !== $password_repeat){
        header("Location: ../signup.php?error=PasswordCheck&username=".$username."&mail=".$email);
        exit(); // it is to exist from this page and not to run below codes.
    }
    else{

        $sql = "select username from users where username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../signup.php?error=sqlError");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, "s", $username);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $resultCheck = mysqli_stmt_num_rows($stmt);
          if($resultCheck > 0){
              header("Location: ../signup.php?error=UsernameAlredyTaken&mail=".$email);
              exit();
          }
          else {

              $sql = "insert into users (username, email, password) values (?, ?, ?)";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../signup.php?error=sqlError");
                exit();
              }
              else{
                $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                mysqli_stmt_execute($stmt);
                header("Location: ../signup.php?signup=success");
                exit();
              }

          }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else {
  header("Location: ../signup.php");
  exit();
}

?>
