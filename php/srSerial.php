<?php  
   	session_start();
    include_once "conf.php";
    
    $srvl=$_POST['srvl'];
    $sql=mysqli_query($conn,"SELECT * FROM serial WHERE (srno LIKE '%{$srvl}%' OR sid LIKE '%{$srvl}%' OR pname LIKE '%{$srvl}%' OR pmn LIKE '%{$srvl}%' OR did LIKE '%{$srvl}%' OR dname LIKE '%{$srvl}%' OR dspec LIKE '%{$srvl}%' OR rptime LIKE '%{$srvl}%' OR tdate LIKE '%{$srvl}%') ORDER BY date DESC");
    $ans="";
     if(mysqli_num_rows($sql)>0){
		  while($row1=mysqli_fetch_assoc($sql)){
                 $ans.='<tr>
							<td>'.$row1['srno'].'</td>
							<td>'.$row1['sid'].'</td>
							<td>'.$row1['pname'].'</td>
							<th>'.$row1['age'].'</th>
							<td>'.$row1['pmn'].'</td>
							<td>'.$row1['did'].'</td>
							<td>'.$row1['dname'].'</td>
							<td>'.$row1['dspec'].'</td>
							<td>'.$row1['rptime'].'</td>
							<td>'.$row1['tdate'].'</td>
							<td>'.$row1['fee'].'</td>
						</tr>';
		  }
	}	  	
	echo $ans;
?>