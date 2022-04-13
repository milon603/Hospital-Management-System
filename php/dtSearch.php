<?php 
  	session_start();
    include_once "conf.php";
    
    $srvl=$_POST['srvl'];
     //echo $srvl;
     $sql=mysqli_query($conn,"SELECT * FROM doctor WHERE (name LIKE '%{$srvl}%' OR id LIKE '%{$srvl}%' OR spec LIKE '%{$srvl}%')");
     $ans="";
     if(mysqli_num_rows($sql)>0){
		  while($row=mysqli_fetch_assoc($sql)){
                $ans.='<div class="Doctor">
                     	<img src="php/images/'.$row['img'].'">
                     	<h2>Name: '.$row['name'].'</h2>
                     	<h3>Id: '.$row['id'].'</h3>
                     	<h4>Speciality: '.$row['spec'].'</h4>
                     	<h4>Visit Day: '.$row['vday'].'</h4>
                     	<h4>Time: '.$row['vts'].' to '.$row['vte'].'</h4>
                     	<h4>Doctor Fee: '.$row['fee'].' Taka</h4>
                     </div>';
		  }
	}	  	
	echo $ans;
?>    