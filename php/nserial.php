<?php  
   session_start();
  include "conf.php";
  $user_id=$_SESSION['user_id'];
  $tdate=date("d/m/Y");
  $dt_id=mysqli_real_escape_string($conn,$_POST['doctor_id']);
  $pname=mysqli_real_escape_string($conn,$_POST['pname']);
  $age=mysqli_real_escape_string($conn,$_POST['age']);
  
  //echo $dt_id.$pname.$age;
   if(!empty($dt_id)&&!empty($pname)&&!empty($age)){
	      $dt=mysqli_query($conn,"SELECT * FROM doctor WHERE id='$dt_id'");
	      if(mysqli_num_rows($dt)>0){
	        	$row=mysqli_fetch_assoc($dt);
	        	$sid=rand(time(),100000000);
	        	$dname=$row['name'];
	        	$dspec=$row['spec'];
	        	$rptime=$row['vts'];
	        	$fee=$row['fee'];
             $us=mysqli_query($conn,"SELECT * FROM user WHERE user_id='$user_id'");
             if(mysqli_num_rows($us)>0){
	        	$row1=mysqli_fetch_assoc($us);
	        	$pmn=$row1['phnNo'];
                $dt=date("zY");
                 	$srr=mysqli_query($conn,"SELECT * FROM serial WHERE did='$dt_id' AND date='$dt'");
                 	$srno=mysqli_num_rows($srr)+1;
			        $ins=mysqli_query($conn,"INSERT INTO serial VALUES('$srno','$sid','$pname','$pmn','$dt_id','$dname','$dspec','$rptime','$dt','$fee','$age','$tdate')");
			        if($ins)echo "successful";
	          }
	      }
	      else{
	      	echo "Doctot id is incorrect..";
	      }
   }
   else echo "All input filed is required..";
?>