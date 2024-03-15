<?php
session_start();
include '../server.php';
$total_que=0;
$res=mysqli_query($connect,"SELECT * FROM questions WHERE category='$_SESSION[exam_category]'");
$total_que=mysqli_num_rows($res);
echo $total_que;
?>