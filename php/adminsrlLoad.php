<?php  
  session_start();
    include "conf.php";
     $erl=mysqli_query($conn,"SELECT * FROM serial");
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