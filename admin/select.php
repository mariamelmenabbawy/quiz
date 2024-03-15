<?php include 'headerr.php'; 
include '../server.php' ;
  $id = $_GET["id"];

$exam_category='';
$res=mysqli_query($connect,"SELECT * FROM exam_category where id=$id");
while($rows=mysqli_fetch_array($res)){
  
$exam_category=$rows["category"];

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
<h5 class="text-center mb-4">Add Question inside <span style="color: blue;"><?php echo $exam_category; ?></span></h5>







</div>
    <form action="" method="POST" class="mx-auto">
    <div class="container mt-5">
    <h4 class="mb-4">Add New Questions</h4>
   <div>
            <label for="question">Question :</label>
            <input type="text" class="form-control" name="question"
             placeholder="Add Question"   >
             
        </div>
        <div class="form-group">
            <label for="op1">Add Option 1 :</label>
            <input type="text" class="form-control" name="op1" placeholder="Add Option 1 :">
             
        </div>
        <div class="form-group">
            <label for="op2">Add Option 2 :</label>
            <input type="text" class="form-control"  name="op2"placeholder="Add Option 2 :" >
             
        </div>
        <div class="form-group">
            <label for="op3">Add Option 3 :</label>
            <input type="text" class="form-control" name="op3"placeholder="Add Option 3 :">
             
        </div>
        <div class="form-group">
            <label for="op4">Add Option 4 :</label>
            <input type="text" class="form-control" name="op4"placeholder="Add Option 4 :">
             
        </div>
        <div class="form-group">
            <label for="theanswer">Add Answer :</label>
            <input type="text" class="form-control" name="theanswer"placeholder="Add Answer">
             
        </div>
        <div class="form-group">
        <input type="submit"class="btn btn-primary" name="submitt"  value="Add Question" >
             
        </div>

          
        <div class="card-body">
            <table border="1" class="table table-borded">
        <thead>
            <tr>
            <th>#no.</th>
                <th>question</th>
                <th>op1</th>
                <th>op2</th>
                <th>op3</th>
                <th>op4</th>
                <th>edit</th>
                <th>delete</th>
            </tr>
        </thead>
        <?php 
     $res=mysqli_query($connect,"SELECT * FROM questions ORDER BY num ASC") or die(mysqli_error($connect));
    while($rows=mysqli_fetch_array($res)){
        echo "<tr>";
        echo "<td>" . $rows["num"] . "</td>";
        echo "<td>" . $rows["ques"] . "</td>";
        echo "<td>" . $rows["op1"] . "</td>";
        echo "<td>" . $rows["op2"] . "</td>";
        echo "<td>" . $rows["op3"] . "</td>";
        echo "<td>" . $rows["op4"] . "</td>";
        echo "<td><a href=\"edit_option.php?id=" . $rows['id'] . "\">edit</a></td>";
        echo "<td><a href=\"delete_option.php?id=" . $rows['id'] . "\">delete</a></td>";

        echo "</tr>";
        
    }

?>

            </div>
        </div>
    </div>
</div>
    </div>
<?php

        
        ?>
       
    </table></div> 
</div></div> 
</body>
</html>
<?php
if(isset($_POST['submitt'])){
$loop=0;
$count=0;




$res=mysqli_query($connect, "SELECT * FROM questions WHERE category='$exam_category' ORDER BY id ASC") or die(mysqli_error($connect));
$count=mysqli_num_rows($res);
    if($count == 0 ){

    }
    else{
        while($rows=mysqli_fetch_array($res)){
            $loop++;
            mysqli_query($connect,"UPDATE questions set num='$loop' WHERE id='$rows[id]'");
        }
    }
    $loop++;
    mysqli_query($connect, "INSERT INTO questions VALUES (NULL, '$loop', '$_POST[question]', '$_POST[op1]', '$_POST[op2]', '$_POST[op3]', '$_POST[op4]', '$_POST[theanswer]', '$exam_category')") or die(mysqli_error($connect));
   

?>

   <script type="text/javascript">
    alert("Question added successfully");
    window.location.href=window.location.href;
   </script>
   <?php
} include '../footer.php';
?>