<?php
session_start();
include '../server.php';

// Get question number from the URL parameter
$qnum = isset($_GET["qno"]) ? $_GET["qno"] : '';


// Initialize variables
$q_no = "";
$q = "";
$op1 = "";
$op2 = "";
$op3 = "";
$op4 = "";
$answer= "";
$ans = "";



if(isset($_SESSION["answer"][$qnum])){
$ans=$_SESSION["answer"][$qnum];
}
$res = mysqli_query($connect, "SELECT * FROM questions WHERE category = '$_SESSION[exam_category]' AND num = '$qnum'");

$count = mysqli_num_rows($res);

if($count == 0){
echo "over";
}else
        {
    while( $row = mysqli_fetch_array($res)){
        $q_no = $row["num"];
        $q = $row["ques"];
        $op1 = $row["op1"];
        $op2 = $row["op2"];
        $op3 = $row["op3"];
        $op4 = $row["op4"];
    }
    
    ?>
         <table style="font-weight:bold; font-size:16px; padding-left:5px; width: 100%;" colspan="2"> 
        <tr>
            <td><?php echo "(". $q_no . ")  " . $q ?></td>
        </tr>
        
    </table>
    

<?php

}
       
?>

 
<style>
    /* Style for radio labels */
    label.radio-label {
        cursor: pointer;
        
        color: #333; /* Default label color */
    }

    /* Style for selected radio labels */
    input[type="radio"]:checked + label.radio-label {
        color: #007bff; /* Color for selected labels */
    }
</style>

<table>

    <tr>
        <td>
            <input type="radio" id="r0" name="drone" value="<?php echo $op1; ?>" onclick="radioclick(this.value,<?php echo $q_no; ?>)" <?php if ($ans == $op1) { echo "checked"; } ?> />
            <label for="r0" class="radio-label"><?php echo "A) " .$op1; ?></label>
        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" id="r2" name="drone" value="<?php echo $op2; ?>" onclick="radioclick(this.value,<?php echo $q_no; ?>)" <?php if ($ans == $op2) { echo "checked"; } ?> />
            <label for="r2" class="radio-label"><?php echo "B) ".$op2; ?></label>
        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" id="r3" name="drone" value="<?php echo $op3; ?>" onclick="radioclick(this.value,<?php echo $q_no; ?>)" <?php if ($ans == $op3) { echo "checked"; } ?> />
            <label for="r3" class="radio-label"><?php echo "C) ". $op3; ?></label>
        </td>
    </tr>
    <tr>
        <td>
            <input type="radio" id="r4" name="drone" value="<?php echo $op4; ?>" onclick="radioclick(this.value,<?php echo $q_no; ?>)" <?php if ($ans == $op4) { echo "checked"; } ?> />
            <label for="r4" class="radio-label"><?php echo "D) ". $op4; ?></label>
        </td>
    </tr>
    
</table>






