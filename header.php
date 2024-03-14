<?php
include 'server.php';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <title>welcome</title>
</head>
<body>
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: black;">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="navbar-brand text-white" href="select_exam.php">Select The Exam</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand text-white" href="#">Results</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand text-white" href="#">
                            <span><?php session_start(); echo $_SESSION["username"]; ?></span>
                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="navbar-brand text-white" href="addqes.php">Add & edit Questions </a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand text-white" href="exam_category.php">Exam category </a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand text-white" href="logout.php">Logout</a>
                    </li>
                <div>
                    <ul>
                    <li class="breadcome-menu">
                      <div id="countdowntimer" style="display:block;">

                      </div>
                    </li>

                    </ul>
                </div>
                    
                </ul>
            </div>
        </nav>
    
        <script type="text/javascript">
            setInterval(() => {
                timer();
            }, 1000); 
    function timer(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){ 
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                if(xmlhttp.responseText=="00:00:01"){
                    window.location="result.php";
                }
                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
            }
               
        };
        xmlhttp.open("GET","forajax/loadtimer.php",true);
        xmlhttp.send(null);
    }
</script>


