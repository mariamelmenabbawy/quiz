<?php
include '../server.php';


if(isset($_GET["id"])) {
    $id = $_GET["id"];
    mysqli_query($connect, "DELETE FROM `questions` WHERE id='$id'");
    
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit(); 
?>