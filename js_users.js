
/********************search bar *******************/
const Body=document.querySelector(".body");

const searchBar = document.querySelector(".body .content .search input"),
searchBtn = document.querySelector(".body .content .search button");
//console.log("ok,,,");
searchBtn.onclick= ()=>{
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
  searchBar.value="";
  if(!searchBtn.classList.contains("active"))location.href = "index.php";
}

searchBar.onkeyup=()=>{
   let srvl = searchBar.value;
  let xhr=new XMLHttpRequest();
     xhr.open("POST","php/dtSearch.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                console.log(data);
                dtList.innerHTML=data;
                //dtList.style="grid-template-columns: repeat(3,1fr)!important;";
            }
        }
     } 
     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhr.send("srvl=" + srvl);
   
}
/************** chat   *********************/ 
const chatarea=document.querySelector(".body .chat-area");   

/************** Login class  *********************/
 const login=document.querySelector(".body .login"),
inform=login.querySelector("form"),
inconBtn=inform.querySelector("input[type='submit']"),
 passFild=login.querySelector("form input[type='Password']"),
 Iname=login.querySelector("form input[name='name']"),
 passFi=login.querySelector(".eyee i"),
 loginBtn=login.querySelector("form .btn"),
 loginToSignup=login.querySelector("form .account-text"),
 inerrortext=login.querySelector(".error-txt")

inform.onsubmit =(e)=>{
  e.preventDefault();
}

 inconBtn.onclick=()=>{
     let xhr=new XMLHttpRequest();
     xhr.open("POST","php/signin.php",true);
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
          if(xhr.status==200){
            let data = xhr.response;
            //console.log(data);
                if(data[0]==='s'){
                      location.href = "index.php";
                  }
                else{
                  inerrortext.style.display = "block";
                      inerrortext.style.color = "red";
                      inerrortext.textContent = data;
                   
              }
          }
        }
     }
     //we have to send the from data through ajax to php
     let formData=new FormData(inform);//creating new formData Object
     xhr.send(formData);
} 
 passFi.onclick = ()=>{
  //console.log(passFild);
  if(passFild.type=="password"){
    passFild.type="text";
    passFi.classList.add("active");
  }
  else{
    passFild.type="password";
    passFi.classList.remove("active");
  }
}

loginToSignup.onclick=()=>{
    hidn();
  signup.style.visibility="visible";
  signup.style.width="500px";
}

/************** Sign up  *********************/
const signup=document.querySelector(".body .signup"),
sform=signup.querySelector("form"),
sconBtn=sform.querySelector("input[type='submit']"),
serrortext=signup.querySelector(".error-txt"),
sName=signup.querySelector("form input[name='name']"),
sMail=signup.querySelector("form input[name='email']"),
sMobile=signup.querySelector("form input[name='PhoneNo']"),
UppassFild=signup.querySelector("form input[type='Password']"),
UppassFi=signup.querySelector(".eyee i"),
SignupBtn=signup.querySelector("form .btn"),
SignupToLogin=signup.querySelector("form .account-text");

sform.onsubmit =(e)=>{
  e.preventDefault();
}

sconBtn.onclick=()=>{
   let xhr=new XMLHttpRequest();
     xhr.open("POST","php/signup.php",true);
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
          if(xhr.status==200){
            let data = xhr.response;
            //console.log(data);
                if(data[0]==='s'){
                          location.href = "index.php";
                        //hidn();
                        //chatarea.style="width:400px;visibility:visible;";
                  }
                else{
                serrortext.style.display = "block";
                serrortext.style.color = "red";
                serrortext.textContent = data;
              }
          }
        }
     }
     //we have to send the from data through ajax to php
     let formData=new FormData(sform);//creating new formData Object
     xhr.send(formData);
}

UppassFi.onclick=()=>{
  if(UppassFild.type=="password"){
    UppassFild.type="text";
    UppassFi.classList.add("active");
  }
  else{
       UppassFild.type="password";
    UppassFi.classList.remove("active");
  }
}

SignupToLogin.onclick=()=>{
   hidn();
  login.style.visibility="visible";
  login.style.width="500px";
}
/************** Header  *********************/  
const serialBtn=document.querySelector(".head input[name='srl']"),
LinOutBtn=document.querySelector(".head input[name='LinOut']"),
serial=document.querySelector(".body .serial"),
tbody=serial.querySelector(".tableContant tbody");
//tbody.innerHTML="hello";
serialBtn.onclick=()=>{
      if(Body.classList.contains("left")){
          serial.style.width="0px";
           serial.style.visibility="hidden";

            content.style.width="100%"; 
           content.style.visibility="visible";
           Body.classList.remove("left");
      }
      else{
       content.style.width="0px"; 
           content.style.visibility="hidden";

           serial.style.width="100%";
           serial.style.visibility="visible";
           Body.classList.add("left");
      }
  
}

setInterval(()=>{
  let xhr=new XMLHttpRequest();
     xhr.open("GET","php/srlLoad.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
               // console.log(data);
               tbody.innerHTML=data;
            }
        }
     } 
     xhr.send();
},500);

/************** contant  *********************/
const content=document.querySelector(".body .content");
const dtList=document.querySelector(".body .content .Doctor_list");
   //dtList.innerHTML="hello,";

reloadBody();    
function reloadBody(){
  let xhr=new XMLHttpRequest();
     xhr.open("GET","php/adminsDoctor.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
               // console.log(data);
                dtList.innerHTML=data;       
            }
        }
     } 
     xhr.send();
}   

/************** new serial  *********************/

const new_serial=document.querySelector(".body .new_serial"),
      nsform=new_serial.querySelector("form"),
      nserr=new_serial.querySelector(".error-txt"),
      nsIn=nsform.querySelector("input[name='ns']"),
      did=nsform.querySelector("input[name='doctor_id']"),
      pname=nsform.querySelector("input[name='pname']"),
      age=nsform.querySelector("input[name='age']");

//nserr.innerHTML="hello";
nsform.onsubmit =(e)=>{
  e.preventDefault();
}

nsIn.onclick=()=>{
  let xhr=new XMLHttpRequest();
     xhr.open("POST","php/nserial.php",true);
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
          if(xhr.status==200){
            let data = xhr.response;
            //console.log(data);
            if(data[0]=='s'){
                location.href = "index.php";
            }
            else{
              nserr.innerHTML=data;
            }
          }
        }
     }
     //we have to send the from data through ajax to php
     let formData=new FormData(nsform);//creating new formData Object
     xhr.send(formData);
}

/************** sms  *********************/

const loginn=document.querySelector(".login");
const sms=document.querySelector(".sms input[name='chat']");
const new_serialBtn=document.querySelector(".sms input[name='serial']");
sms.onclick=()=>{
    hidn();
    if(Body.classList.contains("right")){
       Body.classList.remove("right");
    }
    else{

        let xhr=new XMLHttpRequest();
         xhr.open("GET","php/isLogin.php");
          xhr.onload=()=>{
         if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                if(data=="YES"){
                   chatarea.style="width:400px;visibility:visible;";
                   Body.classList.add("right");
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

new_serialBtn.onclick=()=>{
  //console.log("load js");
  if(Body.classList.contains("ns")){
    new_serial.style.visibility="hidden";
    new_serial.style.width="0px";
    Body.classList.remove("ns");
    did.value="";
    pname.value="";
    age.value="";
  }
  else{
    Body.classList.add("ns");
    new_serial.style.visibility="visible";
    new_serial.style.width="500px";
  }
}

/************* function ************/
function hidn(){
  signup.style.visibility="hidden";
  signup.style.width="0px";
    UppassFild.value="";
    sName.value="";
    sMail.value="";
    sMobile.value="";
    if(UppassFi.classList.contains("active")){
      UppassFi.classList.remove("active");
      UppassFild.type="password";
    }
    login.style.visibility="hidden";
  login.style.width="0px";
    passFild.value="";
    Iname.value="";
    if(passFi.classList.contains("active")){
      passFi.classList.remove("active");
      passFild.type="password";
    }
     chatarea.style="width:0px;visibility:hidden;";
     serrortext.textContent = "";
     inerrortext.textContent = "";
}

