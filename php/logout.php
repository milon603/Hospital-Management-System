<?php
   session_start();
  include "conf.php";
  //echo "sssssssssss";
  if(isset($_SESSION['user_id'])){
  	session_unset();
    session_destroy();
    echo "YES";
  }
  else{
  	echo "NO";
  }
?>