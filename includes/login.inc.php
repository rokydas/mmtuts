<?php

if(isset($_POST['login-submit'])){
    require 'dbhandler.inc.php';


    $username_email = $_POST['username_email'];
    $password = $_POST['pwd'];

    if(empty($username_email) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "select * from users where username=? or email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {

            mysqli_stmt_bind_param($stmt, "ss", $username_email, $username_email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
              // echo $password;
              // echo $row['password'];
              $pwdCheck = password_verify($password, $row['password']);
              if ($pwdCheck == false) {
                header("Location: ../index.php?error=WrongPassword");
                exit();
              }
              else if($pwdCheck == true){
                session_start();
                $_SESSSION['user_id'] = $row['user_id'];
                $_SESSSION['username'] = $row['username'];

                header("Location: ../index.php?login=success");
                exit();
              }
              else{
                header("Location: ../index.php?error=wrongPassword");
                exit();
              }
            }
            else {
              header("Location: ../index.php?error=noUser");
              exit();
            }

        }
    }

}
else {
    header("Location: ../index.php");
    exit();
}


 ?>
