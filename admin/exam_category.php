<?php include '../header.php'; 
include '../server.php' ;
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
            <label for="username"><i class="fas fa-pencil-alt"></i> New Exam Category</label>
            <input type="text" class="form-control" id="username" name="ExamCategory"
             placeholder="Add Exam Category"   >
             
        </div>
        <div class="form-group">&#x23F3;
            <label for="Time"><i class="fas fa-hourglass"></i>Time In Minutes:</label>
            <input type="text" class="form-control" id="time" name="time" placeholder="Exam Time in Min.">
             
        </div>
        <div class="form-group">
        <input type="submit"class="btn btn-primary" name="submitt"  value="Add Exam" >             
        </div> </div></div></form>
        <div class="col-lg-6"><div class="card">
            <div class="card-header"><strong class="card-title">Exam Categories</strong></div>
        <div class="card-body"><table border="1" class="table table-borded">
        <thead>
            <tr>
            <th>#</th>
                <th>Exam Name</th>
                <th>Exam Time</th>
                <th>Edit</th>
                <th>Delete </th>
            </tr>
        </thead>
        <?php 
        $count=0;
        $result=mysqli_query($connect,"SELECT * FROM exam_category");
        while ($rows = mysqli_fetch_assoc($result)) {
            $count++;
?>

<tbody>
            <tr>
                <th scope="row"><?php echo $count;?></th>
                <td><?php echo $rows["category"];?></td>
                <td><?php echo $rows["time_in_min"];?></td>
                <td><a href="edit.php?id=<?php echo $rows["id"];  ?>">edit</a></td>
                <td><a href="delete.php?id=<?php echo $rows["id"];  ?>" >delete</a> </td>
            </tr>
            <tr>
               
            </tr>

<?php

        }?>
        
            <!-- Add more rows as needed -->
        </tbody>
    </table></div> 
</div></div> 
</body>
</html>
<?php
if(isset($_POST['submitt'])){
    mysqli_query($connect, "INSERT INTO exam_category VALUES (NULL, '{$_POST['ExamCategory']}', '{$_POST['time']}')") or die(mysqli_error($connect));
?>
   <script type="text/javascript">
    alert("successfully exam added");
    window.location.href=window.location.href;
   </script>
   <?php
} include '../footer.php';
?>