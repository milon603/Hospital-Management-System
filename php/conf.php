<?php 
  $sname="127.0.0.1:3308";
  $user="root";
  $pass="";
  $conn=new mysqli($sname,$user,$pass,"hospital");
  if(!$conn){
  	echo "Database not connected" . mysqli_connect_error();
  }
?>