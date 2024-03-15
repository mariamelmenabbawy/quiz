<?php
include 'headerr.php';
include '../server.php';

?>
<div class="row" style="...">
    <div class="col-lg-6 col-lg-push-3" style="...">
    <center style="margin-top: 50px;">
    <h1 style="color:  black; font-family: Arial, sans-serif;">Old Exam Results</h1>
</center>

        <?php
    
    $res=mysqli_query($connect,"SELECT * FROM results order by id desc");
    $count=0;
    $count=mysqli_num_rows($res);
    if($count==0){
        ?><center> 
             <h1>No Results Found</h1>
        </center>
    <?php
    }else {
        ?>
        <table class="table table-borded">
           <?php echo '<tr style="background-color: #ADD8E6;" >';
           echo "<th>";echo " username </th>";
           echo "<th>";echo " exam type</th>";
           echo "<th>";echo "total question</th>";
           echo "<th>";echo "correct answer</th>";
           echo "<th>";echo "wrong answer</th>";
           echo "<th>";echo "exam time</th>";
           
           echo "</tr>";
           while($row=mysqli_fetch_array($res)){
            echo "<tr>";
            echo "<td>";echo " $row[username] </td>";
            echo "<td>";echo " $row[exam_type]</td>";
            echo "<td>";echo "$row[total_question]</td>";
            echo "<td>";echo "$row[correct_answer]</td>";
            echo "<td>";echo "$row[wrong_answer]</td>";
            echo "<td>";echo "$row[examtime]</td>";
            
            echo "</tr>";

           }
   ?>
    </table>
        
        <?php
    }
    ?>
    </div>
</div>

<?php
include '../footer.php';
?>