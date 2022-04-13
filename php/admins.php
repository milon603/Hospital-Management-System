<?php  
 	session_start();
    include_once "conf.php";
    $admin_id='admin';
    $sql=mysqli_query($conn,"SELECT * FROM user WHERE status='admin'");
    $ans="";
    while($row=mysqli_fetch_assoc($sql)){
    	$ans.='<tr>
							<td>'.$row['name'].'</td>
							<td>'.$row['user_id'].'</td>
							<td>'.$row['phnNo'].'</td>
							<td>'.$row['email'].'</td>
						</tr>';
    }
    echo $ans;
?>