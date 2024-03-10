<?php
session_start();
include ('server.php');

$errors = array(); // Initialize the errors array

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = stripslashes(strtolower($_POST['username']));
    $pass = stripslashes($_POST['password']);
    $username = filter_input(INPUT_POST, 'username');
    $username = htmlentities(mysqli_real_escape_string($connect, $_POST['username']));
    $pass = htmlentities(mysqli_real_escape_string($connect, $_POST['password']));
    $pass_md5 = md5($_POST['password']);
}

if (empty($username)) {
    $user_error = "Please enter username";
    $errors[] = $user_error;
}

if (empty($pass)) {
    $password_error = "Please enter password";
    $errors[] = $password_error;
}

if (empty($errors)) {
    $sql = "SELECT id, username, password FROM users WHERE username='$username'";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if (!empty($row) && $row['password'] === $pass) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header('Location: notes.php');
            exit();
        } else {
            
            $errors[] = "Invalid username or password"; // Add error message to errors array
            include 'index.php';
            exit();
        }
    } 
}
else{
   include 'index.php';
}
?>