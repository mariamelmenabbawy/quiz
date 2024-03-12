<?php include '../header.php'; 
include '../server.php' ;  $id = $_GET["id"];
$res=mysqli_query($connect,"SELECT * FROM exam_category where id=$id");
while($row=mysqli_fetch_array($res)){
  
$exam_category=$row["category"];
$exam_time=$row['time_in_min'];
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<title> Add Exam </title>
</head>
<body > <div class="col-lg-6">
    <form action="" method="POST">
    <div class="container mt-5">
<div class="form-group">
            &#9997;
            <label for="ExamCategory"><i class="fas fa-pencil-alt"></i> New Exam Category</label>
            <input type="text" class="form-control" name="ExamCategory"
             placeholder="Add Exam Category" value="<?php echo $exam_category;?>"  >
             
        </div>
        <div class="form-group">&#x23F3;
            <label for="time"><i class="fas fa-hourglass"></i>Time In Minutes:</label>
            <input type="text" class="form-control" name="time" placeholder="Exam Time in Min." value="<?php echo $exam_time; ?>">
             
        </div>
        <div class="form-group">
        <input type="submit"class="btn btn-primary" name="submitt"  value="Update Exam" >             
        </div> </div></div></form>
     
            
    
</div></div> 
</body>
</html>
<?php
if(isset($_POST['submitt'])){
    mysqli_query($connect, "UPDATE exam_category SET category='{$_POST['ExamCategory']}', time_in_min='{$_POST['time']}' WHERE id='$id'") or die(mysqli_error($connect));


?>
   <script type="text/javascript">
    alert("successfully exam added");
    window.location = "exam_category.php";

   </script>
   <?php
} include '../footer.php';
?>
