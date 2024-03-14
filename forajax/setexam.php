<?php
session_start();
include '../server.php';

$exam_category = $_GET["exam_category"];
$_SESSION["exam_category"] = $exam_category;

$res = mysqli_query($connect, "SELECT * FROM exam_category WHERE category='$exam_category'");
while ($row = mysqli_fetch_array($res)) {
    $_SESSION['examtime'] = $row["time_in_min"];
}

$date = date("Y-m-d H:i:s");
$_SESSION["endtime"] = date("Y-m-d H:i:s", strtotime("$date + $_SESSION[examtime] minutes"));
// Corrected the typo here
$_SESSION["exam_start"] = "yes";
?>
