<?php include '../header.php'; 
include '../server.php' ;
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<title> Add Exam </title>
</head>
<body > <div class="col-lg-6">
<div class="exam-category-header">
    <h5>Select Exam Category To Add And Edit Questions</h5>
</div>

    <form action="" method="POST">
    <div class="container mt-5">
         <table border="1" class="table table-borded">
        <thead>
            <tr>
            <th>#</th>
                <th>Exam Name</th>
                <th>Exam Time</th>
                <th>Select</th>
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
                <td><a href="select.php?id=<?php echo $rows["id"];  ?>" >Select</a> </td>
            </tr>
            <tr>
               
            </tr>

<?php

        }
        ?>
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