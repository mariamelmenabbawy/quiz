<?php
session_start();

if(!isset($_SESSION["endtime"])){
    echo "00:00:00";
}
else{
    $time1=gmdate("H:i:s",strtotime($_SESSION["endtime"])-strtotime(date("Y-m-d H:i:s")));
    if(strtotime($_SESSION["endtime"]) < strtotime(date("Y-m-d H:i:s"))){
        echo "00:00:00";
    }
    else{
       ?> <div id="countdowntimer" style="display:block;">
    <span style="font-size: 24px; color: #ffffff; background-color: #007bff; padding: 5px 10px; border-radius: 5px;">
        <?php echo $time1; ?>
    </span>
</div>
<?php
    }
}
?>