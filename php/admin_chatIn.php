<?php 
 session_start();
  if(isset($_SESSION['user_id'])){
     include_once "conf.php";
     $out_id="admin";
     $in_id=mysqli_real_escape_string($conn,$_POST['incoming_id']);
     $msg=mysqli_real_escape_string($conn,$_POST['msg']);
     if(!empty($msg)){
     	$sql=mysqli_query($conn,"INSERT INTO sms (in_id,out_id,msg) VALUES({$in_id},'{$out_id}','{$msg}')");
     	$sqla="SELECT * FROM sms where (out_id='admin' or in_id='admin') and (out_id='$in_id' or in_id='$in_id') ORDER BY msg_id DESC LIMIT 1";
     	$smsId=110;
     	$quer2=mysqli_query($conn,$sqla);
          if($quer2)
          if(mysqli_num_rows($quer2)>0){
            $row2=mysqli_fetch_assoc($quer2);
             $smsId=$row2['msg_id'];
          }
     	
     	$sql2=mysqli_query($conn,"UPDATE user set LmsgId='{$smsId}' where user_id='{$in_id}'");
     }
  }
?>