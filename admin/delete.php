<?php
include '../server.php';


if(isset($_GET["id"])) {
    $id = $_GET["id"];
    mysqli_query($connect, "DELETE FROM `exam_category` WHERE id='$id'");
    
}

header('Location: exam_category.php');
exit(); 
?>
