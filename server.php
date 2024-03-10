<?php

// connect to database
$connect=mysqli_connect('localhost','root','','quiz');
if(!$connect){
die( 'Error' .mysqli_connect_error());
  exit;
}
?>