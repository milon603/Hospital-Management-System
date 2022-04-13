<?php 
  	session_start();
    include_once "conf.php";
    
    $dt_id=$_POST['Dt_id'];

   $sq=mysqli_query($conn,"SELECT * FROM doctor WHERE id='$dt_id'");
   if(mysqli_num_rows($sq)>0){
		    $sql=mysqli_query($conn,"DELETE FROM doctor WHERE id='$dt_id'");
		    echo "sucessful";
	}	    
    else echo "Wrong Doctor Id";
?>    