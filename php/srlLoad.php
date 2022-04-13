<?php  
    session_start();
    include "conf.php";
    $user_id=$_SESSION['user_id'];
    //echo $user_id;
    $us=mysqli_query($conn,"SELECT * FROM user WHERE user_id='$user_id'");
     $row=mysqli_fetch_assoc($us);
     $pmn=$row['phnNo'];
     $erl=mysqli_query($conn,"SELECT * FROM serial WHERE pmn='$pmn'");
     $ans="";
      while($row1=mysqli_fetch_assoc($erl)){
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
      echo $ans;
?>