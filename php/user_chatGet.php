<?php 
 session_start();
     include_once "conf.php";
     $out_id=$_SESSION['user_id'];
     $in_id="admin";
     $ans="";
    // echo $out_id." ".$in_id;
     $sql="SELECT * FROM sms where (out_id='$out_id' or in_id='$out_id') and (out_id='$in_id' or in_id='$in_id')";
     $query=mysqli_query($conn,$sql);
     if(mysqli_num_rows($query)>0){
        while($row=mysqli_fetch_assoc($query)){
          if($row['out_id']===$out_id){
             $ans.='<div class="chat outgoing">
			                    <div class="details">
			                        <p>'.$row['msg'].'</p>
			                    </div>
			                </div>';
          }
          else{
             $ans.='<div class="chat incoming">
                    <div class="details">
                        <p>'.$row['msg'].'</p>
                    </div>
                </div>';
          }
        }
        echo $ans;
     }
     else{
      echo "No chat yet";
     }
?>