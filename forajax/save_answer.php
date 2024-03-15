<?php
session_start();
include '../server.php';
$q_no=$_GET["qno"];
$value1=$_GET["value1"];
$_SESSION["answer"][$q_no]=$value1;




?>