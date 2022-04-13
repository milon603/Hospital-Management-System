<?php 
  session_start();
  include_once "conf.php";
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $pass=mysqli_real_escape_string($conn,$_POST['pass']);

  if(!empty($name)&&!empty($pass)){
      $sql=mysqli_query($conn,"SELECT * FROM user WHERE name='{$name}' AND pass='{$pass}'");
      if($sql){
      	if(mysqli_num_rows($sql)>0){
 			$row=mysqli_fetch_assoc($sql);
 			$_SESSION['user_id']=$row['user_id'];
            echo "success";
      	}
      	else{
      		echo "Wrong user name or password...";
      	}
      }
      else echo "somthing is wrng";
    
  }
  else{
  	echo "All input Fields are required..";
  }
?>  