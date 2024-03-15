<?php

include 'header.php';
$date=date("Y-m-d H-i-s");
$_SESSION["endtime"]=date("Y-m-d H-i-s",strtotime($date."+ $_SESSION[examtime] minutes"));

?>
<div class ="row">
    <div class="col-lg-6 col-lg-push-3">
    <?php
    $correct=0;
    $wrong=0;
    if(isset($_SESSION["answer"])){
        for($i=1;$i<sizeof($_SESSION["answer"]);$i++){
            $answer="";
            $res=mysqli_query($connect,"SELECT *FROM questions WHERE category='$_SESSION[exam_category]' && num=$i");
            while($row=mysqli_fetch_array($res)){
             $answer=$row["answer"];       
            }
            if(isset($_SESSION["answer"][$i])){
                    if($answer === $_SESSION["answer"][$i]){
                            $correct=$correct+1;
                    }
                    else{
                        $wrong+=1;
                    }
            }
            else{
                $wrong+=1;
            }
        }
    }
    $count=0;
    $res=mysqli_query($connect,"SELECT *FROM questions  WHERE category='$_SESSION[exam_category]' ");
    $count=mysqli_num_rows($res); 
    $correct=$count-$wrong;
    echo "<br>" ;echo"<br>";
    echo    "<center>";
    echo "Total Questions=". $count;
    echo "<br>";
    echo    "Correct Answers=".$correct;
    echo "<br>";
    echo "Wrong Answers=".$wrong;
        echo "</center>"
?>
</div>
</div>

<?php
if (isset($_SESSION["exam_start"])){
$date=date("Y-m-d");
mysqli_query($connect, "INSERT INTO results (id, username, exam_type, total_question, correct_answer, wrong_answer, examtime) VALUES (NULL, '{$_SESSION['username']}', '{$_SESSION['exam_category']}', '$count', '$correct', '$wrong', '$date')")or die(mysqli_error($connect));
}
if(isset($_SESSION['exam_start'])){
unset($_SESSION['exam_start']);
?>
<script type="text/javascript">
window.location .href=window.location.href; // to refresh the current page

</script>
<?php

}
include 'footer.php';
?>