<?php 
  session_start();
  include "conf.php";
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $PhoneNo=mysqli_real_escape_string($conn,$_POST['PhoneNo']);
  $email=mysqli_real_escape_string($conn,$_POST['email']);
  $pass=mysqli_real_escape_string($conn,$_POST['pass']);
  // echo $name.$PhoneNo.$email.$pass;
  if(!empty($name)&&!empty($PhoneNo)&&!empty($email)&&!empty($pass)){
      if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $sql=mysqli_query($conn,"SELECT email FROM user WHERE email='{$email}'");
          if(mysqli_num_rows($sql)>0){
          echo $email . "is already exits!!";
         }
         else{
                 $status="user";
           $random_id=rand(time(),10000000);
           $sql1=  mysqli_query($conn,"INSERT INTO user (user_id, name, email, phnNo, pass, status) VALUES({$random_id}, '{$name}','{$email}', '{$PhoneNo}','{$pass}', '{$status}')");
           if($sql1){
              $sq=mysqli_query($conn,"SELECT * FROM user WHERE email='{$email}'");
              if(mysqli_num_rows($sq)>0){
              $row=mysqli_fetch_assoc($sq);
              $_SESSION['user_id']=$row['user_id'];
              echo "success";
            }
          }
         }
      }
      else{
        echo "$email - This is not a valid email...";
      }
  } 
  else{
      echo "All input Field are requeired...";
  }
?>