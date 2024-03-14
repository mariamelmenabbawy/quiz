<?php 

include 'server.php';
include ('header.php');
if(!isset($_SESSION['username'])){
    header('location: index.php');
    exit();
    }

 ?>
<br>
<div class="row" style="...">
    <div class="col-lg-6 col-lg-push-3" style="min-height:500px;">
    <?php 
    $res=mysqli_query($connect,"SELECT * FROM exam_category ");
    while($row=mysqli_fetch_array($res)){
 ?> 
<div>

<div class="container">
    
    <div class="row justify-content-center align-items-center text-center">
        <div class="col-lg-6">
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-success btn-lg w-100 mb-3" onclick="clicking(this.value);" value="<?php echo $row['category']; ?>">
            </div>
        </div>
    </div>
</div>




<?php    }
     ?>
    </div>
</div>
</body>
<script type="text/javascript">
    function clicking(exam_category){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){ 
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                
                window.location="dashboard.php";
            }
               
        };
        xmlhttp.open("GET", "forajax/setexam.php?exam_category=" + exam_category, true);

        xmlhttp.send();
    }
 
</script>

