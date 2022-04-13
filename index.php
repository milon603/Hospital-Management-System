<!DOCTYPE html>
<html>
<head>
	<title>Hospital</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<link rel="stylesheet"href="styles.css">

    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
	//const Body=document.querySelector(".body");
	//Body.innerHTML="kjd";

	function fr(){

	  hidn();
    if(Body.classList.contains("right")){
    	 Body.classList.remove("right");
    }
    else{

		        let xhr=new XMLHttpRequest();
		     xhr.open("GET","php/logout.php");
		     xhr.onload=()=>{
		        if(xhr.readyState===XMLHttpRequest.DONE){
		            if(xhr.status===200){
		                let data = xhr.response;
		                //console.log(data);
		                if(data=="YES"){
		                  location.href="index.php";
		                }
		                else{
		                	 login.style.visibility="visible";
		                      login.style.width="500px";
		                      Body.classList.add("right");
		                }
		            }
		        }
		     } 
		     xhr.send();
 		}
   }
</script>
</head>
<?php 
 $nm=" ";
 $linBtn="Login";
  session_start();
  if(isset($_SESSION['user_id'])){
           include_once "php/conf.php";
            $sql=mysqli_query($conn,"SELECT * FROM user WHERE user_id={$_SESSION['user_id']}");
            if(mysqli_num_rows($sql)>0){
              $row=mysqli_fetch_assoc($sql);
               $nm=$row['name'];
               if($row['status']=='admin'){
               	 header("location:admin.php?cuser_id=0");
               }
            }
    $linBtn="Logout";        
  }
?>

<body>
	<section>
		<div class="head">
			<div class="heding">
				<input type="button" value="My serials" name="srl" class="bttn btn">
			</div>
			<div class="add">
					<h3><i>"Rajbari Medical Center & Hospital"</i></h3>
		            <img src="me.JPG" style="height: 350px;width: 500px;object-fit: cover;"><br>
		            <h5 style="margin-top: -2rem;"><i>Address: Sajjankanda,Rajbari,</i></h5>
		            <h5><i>Dhaka,Bangladesh.</i></h5>
			</div>
			<div class="head_right">
				<input type="button" name="LinOut" value="<?php echo $linBtn;  ?>" class="bttn btn" onclick="fr();">
				<h6><?php echo $nm;  ?></h6>
			</div>
		</div>
	</section>
	<section>
		<div class="body">
			<div class="serial">
			  <div class="zzz">
				<table class="tableContant">
					<thead>
						<tr>
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
						</tr>
					</thead>
					<tbody>
						
						
					</tbody>
				</table>
			  </div>
			</div>
		
			<div class="content">
				<div class="search">
					<span class="text">Search a doctor by name or id</span>
					<input type="text" placeholder="Enter Doctor name Or Id to search.....">
					<button><i class="fas fa-search"></i></button>
				</div>
				 <div class="Doctor_list">
                     
				 </div>
				 <div class="slider-dots"></div>
				 </div>
               <div class="login">
		     		<form action="" class="sign-in-form">
		     			<h2 class="title">Sign in</h2>
		     			<div class="error-txt"></div>
		     			<div class="input-field">
		     				<i class="fas fa-user"></i>
		     				<input type="text" name="name"  placeholder="Username">
		     			</div>
		     			<div class="input-field">
		     				<i class="fas fa-lock"></i>
		     				<input type="password" placeholder="password" name="pass">
		                         <label class="eyee"><i class="fas fa-eye"></i></label>
		                         
		     			</div>
		     			<input type="submit" value="Login" class="bttn btn">
		     			<p>Don't have an account? <a href="#" class="account-text" id="sign-up-link">Sign up</a></p>
		     		</form>
               </div>


               <div class="signup">

		              <form action="#" enctype="multipart/form-data" class="sign-up-form">
		                     <h2 class="title">Sign up</h2>
		                     <div class="error-txt"></div>
		                    <div class="input-field">
		                         <i class="fas fa-user"></i>
		                         <input type="text" name="name" placeholder="Username">
		                    </div>
		                    <div class="input-field">
		                         <i class="fas fa-phone-square-alt"></i>
		                         <input type="text" name="PhoneNo"  placeholder="Mobile Number">
		                    </div>
		                    <div class="input-field">
		                         <i class="fas fa-envelope"></i>
		                         <input type="email"  name="email"  placeholder="Email">
		                    </div>
		                   <div class="input-field">
		                         <i class="fas fa-lock"></i>
		                         <input type="password"  name="pass" placeholder="password">
		                         <label class="eyee"><i class="fas fa-eye"></i></label>
		                    </div>
		                    <input type="submit" value="Sign up" class="bttn btn">
		                    <p>Aready have an account? <a href="#" class="account-text" id="sign-in-link">Sign in</a></p>
		              </form>
               </div>


               <div class="chat-area">
			           <header>
			              <img src="me.JPG" alt="">
			               <div class="details">
			                   <span>Rajbari Medical Center & Hospital</span>
			               </div>
			           </header>
			           <div class="chat-box">
			               <div class="chat outgoing">
			                    <div class="details">
			                        <p>It's my message..</p>
			                    </div>
			                </div>
			                <div class="chat incoming">
			                    <div class="details">
			                        <p>It's my message..</p>
			                    </div>
			                </div>
			           </div>
			           <form action="#" class="typing-area">
			               <input type="text" name="msg" placeholder="Type a message here....">
			               <button class="btn"><i class="fab fa-telegram-plane"></i></button>
			           </form>
                </div> 

                <div class="new_serial">
                	<form action="" class="sign-in-form">
		     			<h2 class="title">new serial</h2>
		     			  <div style="width:100%;color: red;display: flex;align-items: center;justify-content: center;margin-top: 0rem;margin-bottom: 2rem;" class="error-txt"></div>
		     			<div class="input-field">
		     				<input type="text" name="doctor_id"  placeholder=" Doctor Id:">
		     			</div>
		     			<div class="input-field">
		     				     <input type="text" name="pname"  placeholder=" Patiant Name:">
		     			</div>
		     			<div class="input-field">
		     				     <input type="text" name="age"  placeholder=" Patiant Age:">
		     			</div>
		     			<input type="button" value="take serial" name="ns" class="bttn  btn" style="width: 200px;">
		     		</form>
                </div>

		</div>
	</section>
	<section>
		<div class="sms">
			<div class="lft"><input type="button" value="Take a new serial" class="bttn btn " name="serial" style="width: 300px;"></div>
			<div class="rit"><input type="button" value="chat" class="bttn btn" name="chat" style="width: 300px;"></div>
	   </div>
	</section>
	<section>
		<div class="footer">
			<p>Thanks For Visit Our Website.</p>
		</div>
	</section>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="js_slider.js"></script>
	<script src="js_users.js"></script>
	<script src="js_user1.js"></script>

</body>
</html>
