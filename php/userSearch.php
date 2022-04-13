<?php 
  session_start();
    include_once "conf.php";
    $admin_id="admin";
    $searchStr = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $sql=mysqli_query($conn,"SELECT * FROM user WHERE(name LIKE '%{$searchStr}%') ");
    $ans="";$ans1="";$ans2="";
    if(mysqli_num_rows($sql)==0){
      $ans.="No users are available to chat...";
    }
    else if(mysqli_num_rows($sql)>0){
      
      
       while($row=mysqli_fetch_assoc($sql)){
            

           $user_id=$row['user_id'];
           $in_id=$row['user_id'];
         if($row['status']=='admin')continue;
           $sqla="SELECT * FROM sms where (out_id='admin' or in_id='admin') and (out_id='$in_id' or in_id='$in_id') ORDER BY msg_id DESC LIMIT 1";
         //$sqla="SELECT * FROM sms  WHERE (out_id={$admin_id} OR in_id={$admin_id}) AND (out_id={$user_id} OR in_id={$user_id}) ORDER BY msg_id DESC LIMIT 1";
          $quer2=mysqli_query($conn,$sqla);
          $rs="No massage available";
             $you="";
          if($quer2)
          if(mysqli_num_rows($quer2)>0){
            $row2=mysqli_fetch_assoc($quer2);
            $rs=$row2['msg'];
            $you=($row2['out_id']===$admin_id)?"Admin: ":"";
          }
          $result=$you.$rs;
         // echo $result;
          (strlen($result)>20)?$msg=substr($result,0,20).'.....':$msg=$result;


            $ans1.='<a href="admin.php?cuser_id='.$row['user_id'].'">
                      <div class="conten">
                          <div class="details">
                             <span>'.$row['name'].'</span>
                             <p>'.$msg.'</p>
                          </div>
                      </div>
                  </a>';     
          
    }
      $ans.=$ans1;
      $ans.=$ans2;
  }

  echo $ans1; 
?>