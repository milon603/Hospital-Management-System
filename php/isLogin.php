<?php 
  session_start();
  if(isset($_SESSION['user_id'])){
      echo "YES";      
  }
  else echo "NO";
?>