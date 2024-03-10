<?php
include 'server.php';

$user_error = $email_error = $password_error = $birthday_error = ""; // Initialize error variables

if (isset($_POST['submit'])) {
    $username = stripcslashes(strtolower($_POST['username']));
    $password = stripcslashes($_POST['password']);
    $email = stripcslashes($_POST['email']);
    $errors = [];

    if (isset($_POST['birthday'])) {
        $birthday = htmlentities(mysqli_real_escape_string($connect, (int)$_POST['birthday']));
    }
    $username = htmlentities(mysqli_real_escape_string($connect, $_POST['username']));
    $password = htmlentities(mysqli_real_escape_string($connect, $_POST['password']));
    $email = htmlentities(mysqli_real_escape_string($connect, $_POST['email']));

    $check_user = "SELECT * FROM users WHERE username='$username'";
    $check_result=mysqli_query($connect,$check_user);
    $num_rows=mysqli_num_rows($check_result);
    if($num_rows!=0){
        $user_error = "This username is token";
        $errors[] = $user_error;
        }



    // for username errors
    if (empty($username)) {
        $user_error = "Please enter username";
        $errors[] = $user_error;
    } elseif (strlen($username) < 6) {
        $user_error = "Username must be more than 5 characters";
        $errors[] = $user_error;
    } elseif (filter_var($username, FILTER_VALIDATE_INT)) {
        $user_error = "Please enter a correct username not a number";
        $errors[] = $user_error;
    }

    // for password errors
    if (empty($password)) {
        $password_error = "Please enter password";
        $errors[] = $password_error;
    } elseif (strlen($password) < 6) {
        $password_error = "Password must be more than 5 characters";
        $errors[] = $password_error;
    }

    // for email errors
    if (empty($email)) {
        $email_error = "Please enter email";
        $errors[] = $email_error;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please enter a correct email";
        $errors[] = $email_error;
    }

    // for birthday errors
    if (empty($birthday)) {
        $birthday_error = "Please enter birthday";
        $errors[] = $birthday_error;
    }

    if (empty($errors)&& ($num_rows==0)) {

        $sql = "INSERT INTO users(username, password, email, birthday) VALUES('$username', '$password', '$email', '$birthday')";
        mysqli_query($connect, $sql);
        header('location: notes.php');
    }
    else{
        include 'index2.php';
    }
}

?>





