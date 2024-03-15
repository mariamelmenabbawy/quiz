<?php include 'headerr.php'; 
include '../server.php' ;
  $id = $_GET["id"];
  $question="";
  $op1="";
  $op2="";
  $op3="";
  $op4="";
  $answer="";  
$exam_category='';
$res=mysqli_query($connect,"SELECT * FROM questions where id=$id");
while($rows=mysqli_fetch_array($res)){
  $question=$rows["ques"];
  $op1=$rows["op1"];
  $op2=$rows["op2"];
  $op3=$rows["op3"];
  $op4=$rows["op4"];
  $answer=$rows["answer"];  
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body > 
    


<div class="col-lg-6">
<div class="exam-category-header">
<h5 class="text-center mb-4">Update Question</h5>
</div>
    <form action="" method="POST" class="mx-auto">
    <div class="container mt-5">
    <h4 class="mb-4">Update Question</h4>
   <div>
            <label for="question">Question :</label>
            <input type="text" class="form-control" name="question"
             placeholder="Add Question"  value="<?php echo $question; ?> ">
             
        </div>
        <div class="form-group">
            <label for="op1">Add Option 1 :</label>
            <input type="text" class="form-control" name="op1" placeholder="Add Option 1 :" value="<?php echo $op1; ?> ">
             
        </div>
        <div class="form-group">
            <label for="op2">Add Option 2 :</label>
            <input type="text" class="form-control"  name="op2"placeholder="Add Option 2 :" value="<?php echo $op2; ?> ">
             
        </div>
        <div class="form-group">
            <label for="op3">Add Option 3 :</label>
            <input type="text" class="form-control" name="op3"placeholder="Add Option 3 :"value="<?php echo $op3; ?> ">
             
        </div>
        <div class="form-group">
            <label for="op4">Add Option 4 :</label>
            <input type="text" class="form-control" name="op4"placeholder="Add Option 4 :"value="<?php echo $op4; ?> ">
             
        </div>
        <div class="form-group">
            <label for="theanswer">Add Answer :</label>
            <input type="text" class="form-control" name="theanswer"placeholder="Add Answer"value="<?php echo $answer; ?> ">
             
        </div>
        <div class="form-group">
        <input type="submit"class="btn btn-primary" name="submitt"  value="Update Question" >
             
        </div></form>
        <?php
            if(isset($_POST['submitt'])){
                $res=mysqli_query($connect,"UPDATE questions set ques='$_POST[question]',op1='$_POST[op1]',op2='$_POST[op2]',op3='$_POST[op3]' ,op4='$_POST[op4]',answer='$_POST[theanswer]'");
                ?>
                <script type="text/javascript"> 
                    window.location="addqes.php";
                </script>
                <?php
            }


        ?>