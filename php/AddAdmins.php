<?php 
  session_start();
    include_once "conf.php";
    $user_id = mysqli_real_escape_string($conn, $_POST['userId']);
    $sql=mysqli_query($conn,"SELECT * FROM user WHERE user_id='$user_id'");
    if(mysqli_num_rows($sql)>0){
        $row=mysqli_fetch_assoc($sql);
        if($row['status']=='admin'){
        	echo "user id is incorrect. ".$row['user_id']." is a admin id..";
        }
        else{
	    	$sq=mysqli_query($conn,"UPDATE user SET status='admin' WHERE user_id='$user_id'");

	         echo "YES";
       }  
    }
    else{
    	echo "user id is incorrect..";
    }
?>    