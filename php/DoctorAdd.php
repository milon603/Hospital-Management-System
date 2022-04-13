<?php  
	session_start();
    include "conf.php";
      $name=mysqli_real_escape_string($conn,$_POST['Dt_name']);
	  $spec=mysqli_real_escape_string($conn,$_POST['spec']);
	  $fee=mysqli_real_escape_string($conn,$_POST['fee']);
	  $Vday=mysqli_real_escape_string($conn,$_POST['days']);
	  $stTime=mysqli_real_escape_string($conn,$_POST['stTime']);
	  $endTime=mysqli_real_escape_string($conn,$_POST['endTime']);

	  if(!empty($name)&&!empty($spec)&&!empty($fee)&&!empty($Vday)&&!empty($stTime)&&!empty($endTime)){

			  if(isset($_FILES['Dt_img'])){
		            $img_name = $_FILES['Dt_img']['name'];
		            $img_type = $_FILES['Dt_img']['type'];
		            $tmp_name = $_FILES['Dt_img']['tmp_name'];
				    $img_explode = explode('.',$img_name);
		            $img_ext = end($img_explode);
		    
		            $extensions = ["jpeg", "png", "jpg", "JPG","PNG"];
		            if(in_array($img_ext, $extensions) === true){
		            	$time=time();
		            	//echo $time."   ";
		                $new_name=$time.$img_name;
		                //echo $new_name
						if(move_uploaded_file($tmp_name,"images/".$new_name)){
		                    $sq=mysqli_query($conn,"SELECT * FROM doctor ORDER BY id DESC LIMIT 1");
		                    $row=mysqli_fetch_assoc($sq);
		                    if(mysqli_num_rows($sq)>0)$Dt_id=$row['id']+1;
		                     else $Dt_id=1000;
		                   $sql=mysqli_query($conn,"INSERT INTO doctor VALUES('$name','$Dt_id','$spec','$Vday','$stTime','$endTime','$new_name','$fee')");
		                    echo "sucessful";   
						}
		            }
		            else{
		            	echo "Please uploade a file JPG or PNG or jpg or png or jpeg";
		            }
			  }
			  else echo "Please uploade a file!!";


	  }
	  else{
	  	echo "All input field is required...";
	  }
	  
?>