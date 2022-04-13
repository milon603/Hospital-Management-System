<!DOCTYPE html>
<html>
<head>
	<title>Hospital</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<link rel="stylesheet"href="admin.css">

    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>


</head>

<?php 
 $nm=" ";
 $linBtn="Login";
 $cnm="Milon Hossain";
 $csty="";
 $cuser_id=0;
  session_start();
  if(isset($_SESSION['user_id'])){
           include_once "php/conf.php";
            $sql=mysqli_query($conn,"SELECT * FROM user WHERE user_id={$_SESSION['user_id']}");
            if(mysqli_num_rows($sql)>0){
				$row=mysqli_fetch_assoc($sql);
	              if($row['status']=='user'){
	              	header("location:index.php");
	              }
			  $nm=$row['name'];
            }
          $linBtn="Logout";  
        if(isset($_GET['cuser_id']))$cuser_id=mysqli_real_escape_string($conn,$_GET['cuser_id']);
         
         $sql=mysqli_query($conn,"SELECT * FROM user WHERE user_id={$cuser_id}");
            if(mysqli_num_rows($sql)>0){
              $row1=mysqli_fetch_assoc($sql);
              $cnm=$row1['name'];
            }

         if($cuser_id!=0){
         	$csty="width: 400px;visibility: visible;";
         }


        $sq=mysqli_query($conn,"SELECT * FROM doctor ORDER BY id DESC LIMIT 1");
        $row3=mysqli_fetch_assoc($sq);
        if(mysqli_num_rows($sq)>0)$Dt_id=$row3['id']+1;
        else $Dt_id=1000;
         
  }
  else{
  	header("location:index.php");
  }
?>
<body>
	<section>
		<div class="head">
			<div class="heding">
				<input type="button" value="serials" name="srl" class="btn">
			</div>
			<div class="add">
					<h3><i>"Rajbari Medical Center & Hospital"</i></h3>
		            <img src="me.JPG" style="height: 350px;width: 500px;object-fit: cover;"><br>
		            <h5 style="margin-top: -2rem;"><i>Address: Sajjankanda,Rajbari,</i></h5>
		            <h5><i>Dhaka,Bangladesh.</i></h5>
			</div>
			<div class="head_right">
				<input type="button" name="LinOut" value="<?php echo $linBtn;  ?>" class="bttn btn">
				<h6><?php echo $nm;  ?></h6>
			</div>
		</div>
	</section>

    <section>
		<div class="body">

            <div class="serial">

            	<div class="search">
						<span class="text">Search any related serial</span>
						<input type="text" placeholder="Type to search.....">
						<button><i class="fas fa-search"></i></button>
				</div>

			  <div class="zzz">
				<table class="tableContant">
					<thead>
						<th>Serial Number</th>
							<th>Serial ID</th>
							<th>Patient Name</th>
							<th>Patient Age</th>
							<th>Patient Mobile Number</th>
							<th>Doctor ID</th>
							<th>Doctor Name</th>
							<th>Doctor Specialty</th>
							<th>Reporting Time</th>
							<th>Date</th>
							<th>Doctor fee</th>
					</thead>
					<tbody>
						
						
					</tbody>
				</table>
			  </div>
			</div>
              

			<div class="Doctor_add">
				
                <h1 style="margin-bottom: 2rem;">Doctor Add</h1>
                <div style="width: 500px;color: red;display: flex;align-items: center;justify-content: center;margin-top: -2rem;margin-bottom: 2rem;" class="error-txt"></div>
				<form action="">

					<div class="Id_name">
                        <div class="name">
                        	<label>Dr: Name:</label>
							<input type="text" name="Dt_name" placeholder="Enter Doctor Name">
                        </div>
                        <div class="Id">
                        	<label>Dr: ID: <span><?php echo $Dt_id; ?></span></label>
                        </div>
					</div>
					<div class="spec_time">
                        <div class="spec">
                        	<label>Dr: Speciality:</label>
							<input type="text" name="spec" placeholder="Enter Doctor Speciality">
                        </div>
                        <div class="fee">
                        	<label>Doctor fee:</label>
							<input type="text" name="fee" placeholder="Fee">
                        </div>
					</div>
					<div class="Day">
						<div class="Day_txt">
							<label>Visiting Day:</label>
							<input type="text" name="days" placeholder="Select Doctors Visiting Days..." >
						</div>
					    <div class="Days">
					    	<input type="button" name="sa" value="Saturday">
					    	<input type="button" name="su" value="Sunday">
					    	<input type="button" name="mu" value="Monday">
					    	<input type="button" name="we" value="Wednesday">
					    	<input type="button" name="tu" value="Tuesday">
					    	<input type="button" name="th" value="Thursday">
					    	<input type="button" name="fr" value="Friday">
					    </div>
					</div>
					<div class="time">
						<div class="stTime">
							<div class="lft">
								<label>Visiting Time Start:</label>
								<input style="width: 300px;" type="text" name="stTime" placeholder="Start Time With AM or PM">
							</div>
                            
						</div>
						<div class="EndTime">
							<div class="lft">
								<label>Visiting Time End:</label>
								<input style="width: 300px;" type="text" name="endTime" placeholder="End Time With AM or PM">
							</div>
						</div>
					</div>
					<div class="file">
						<label style="padding-right: 20px;">Doctor Img:</label>	
						<input style="width: 300px; padding-right: 20px;margin-right: auto;" type="file" name="Dt_img" value="Add">
						<input class="btn" style="width: 200px;margin-left: auto;" type="button" name="xyz" value="Add">
					</div>
				</form>

			</div>

            <div class="content">
				<div style="width: 100%;color: red;display: flex;align-items: center;justify-content: center;margin-top: 1rem;margin-bottom: 2rem;" class="error-txt"></div>
            	<div class="removeDt">
            		<label style="font-size: 18px;padding-right: 20px;font-weight: 600;">Doctor Id:</label>
            			<input class="Id" type="text" name="DtId" placeholder="Enter Doctor Id">
            		<div class="DtBtn">
            			<input type="button" class="btn" name="dtBtn" value="remove">
            		</div>
            	</div>

				<div class="Dt_head">
					<div class="Add_dt">
						<input type="button" name="Add" value="Add a doctor" style="width: 200px;" class="btn">
					</div>
					<div class="search">
						<span class="text">Search a doctor by name or id</span>
						<input type="text" placeholder="Enter Doctor name Or Id to search.....">
						<button><i class="fas fa-search"></i></button>
					</div>
					<div class="remove_dt">
						<input type="button" style="width: 200px;" name="rmv" value="Remove Doctor" class="btn">
				   </div>
				</div>
				<div class="Doctor_list">

				</div> 
            </div>
			 <div class="Admin">
			 	<div class="error-text" style="display: flex;align-items: center;justify-content: center;"></div>
 				<div class="removeDt">
            		<label style="font-size: 18px;padding-right: 20px;font-weight: 600;">Admin Id:</label>
            			<input class="Id" type="text" name="dtId" placeholder="Enter Admin Id">
            		<div class="DtBtn">
            			<input type="button" class="btn" name="dtBtn" value="remove">
            		</div>
            	</div>
            	
                 
            	<div class="AddAd">
            		<label style="font-size: 18px;padding-right: 20px;font-weight: 600;">User Id:</label>
            			<input class="Id" type="text" name="adId" placeholder="Enter User Id">
            		<div class="DtBtn">
            			<input type="button" class="btn" name="adBtn" value="Add Admin">
            		</div>
            	</div>

			 	<div class="Dt_head">
					<div class="Add_ad">
						<input type="button" name="Add" value="Add a Admin" style="width: 200px;" class="btn">
					</div>
					<div class="remove_ad">
						<input type="button" style="width: 200px;" name="rmv" value="Remove a Admin" class="btn">
				   </div>
				</div>
				<table class="tableContant">
					<thead>
						<tr>
							<th>Admin Name</th>
							<th>Admin ID</th>
							<th>Admin Phone Number</th>
							<th>Admin Mail Id</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table> 
			</div>	
 		    <div class="user">
 		    	<header> 
 		    		<div style="padding-left: 20px;"class="conten">
                      <img  src="me.jpg" alt="">
                      <div class="details">
                          <span>Rajbari Medical Center & Hospital</span>
                      </div>
                  </div>
                </header>
                <div class="search">
	                <span class="text">Select an user to start chat</span>
	                <input type="text" placeholder="Enter name to search.....">
	                <button><i class="fas fa-search"></i></button>
                </div>
                <div class="user-list">
	               
                </div>
 		    </div>	
            
 		    <div class="chat-area" style="<?php echo $csty; ?>">
			           <header>
			               <div class="details">
			                   <span><?php echo $cnm; ?></span>
			               </div>
			           </header>
			           <div class="chat-box">
			               <div class="chat outgoing">
			                    <div class="details">
			                        <p>It's my message..</p>
			                    </div>
			                </div>
			                <div class="chat incoming">
			                    <img src="me.JPG" alt="">
			                    <div class="details">
			                        <p>It's my message..</p>
			                    </div>
			                </div>
			           </div>
			           <form action="#" class="typing-area" autocomplete="off">
			           	   <input type="text" name="incoming_id" value="<?php echo $cuser_id; ?>"  hidden>
			               <input type="text" name="msg" placeholder="Type a message here....">
			               <button class="btn"><i class="fab fa-telegram-plane"></i></button>
			           </form>
                </div> 

		</div>
	</section>
	
	<section>
		<div class="sms">
			<div class="lft"><input type="button" value="Admins" class="btn " name="serial" style="width: 300px;"></div>
			<div class="rit"><input type="button" value="chat" class="btn" name="chat" style="width: 300px;"></div>
	   </div>
	</section>
	<section>
		<div class="footer">
			<p>Welcome To Admin Panel.</p>
		</div>
	</section>	
	<script src="js_admin.js"></script>	
</body>
</html>	