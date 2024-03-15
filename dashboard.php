<?php

include 'header.php';

?>
<div class="row">
    <div class="col-lg-6 col-lg-push-3">
        <br>
        <div class="row">
            <div class="col-lg-2 col-lg-push-10">
                <div id="current_que" style="float:left;"></div>
                <div  style="float:left;">/</div>
                <div id="total_que" style="float:left;"></div>
            </div>
                <div class="row" style="margin-top:20px;">
                <div class="row" class="col-lg-10 col-lg-push-1"style="min-height:150px;background-color:white;" id ="load_questions"></div>
            </div>

        </div>
    </div>
    </div>
                <div class="row" style="margin-top:20px;">
                <div class="row" class="col-lg-6 col-lg-push-3"style="min-height:50px;">
                <div class="col-lg-12 text-center">     
                    <input type="button" class="btn btn-warning" value="Previous" onclick="load_previous()">   &nbsp;
                    <input type="button" class="btn btn-warning" value="Next" onclick="load_next()">
                    <a type ="submit"class="btn btn-warning" href="result.php">Submit</a>
                   
                </div>
            </div>
            </div>

</div>
<script type="text/javascript">
    function load_total_que(){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){ 
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                
                document.getElementById("total_que").innerHTML=xmlhttp.responseText;
            }
               
        };
        xmlhttp.open("GET","forajax/load_total_que.php", true);

        xmlhttp.send();
    }


    var qno="1";
    load_questions(qno);

    function load_questions(qno){
        document.getElementById("current_que").innerHTML=qno;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){ 
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                
               if(xmlhttp.responseText=="over"){
                    window.location="result.php";
               }
               else{
                document.getElementById("load_questions").innerHTML=xmlhttp.responseText;
                load_total_que();
               }
            }
               
        };
        xmlhttp.open("GET", "forajax/load_questions.php?qno="+ qno, true);
        xmlhttp.send();
    }
    function load_previous(){
            if(qno=="1"){
                    load_questions(qno);

            }else{  
                    qno-=1;
                    load_questions(qno);
            }
    }
    function load_next(){
            qno=eval(qno)+1;
            load_questions(qno);
    }
        function radioclick(radiovalue,qno){
            var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){ 
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                
                
            }
               
        };
      
        xmlhttp.open("GET", "forajax/save_answer.php?qno=" + qno + "&value1=" + radiovalue, true);

        xmlhttp.send();       
        }
</script>
<?php
include 'footer.php';
?>