const Body=document.querySelector(".body");

const searchBar = document.querySelector(".body .content .search input"),
searchBtn = document.querySelector(".body .content .search button");
//console.log("ok,,,");
searchBtn.onclick= ()=>{
  if(searchBtn.classList.contains("ac")){
     reloadBody();
     searchBtn.classList.remove("ac");
   }
   else{
     //console.log("dc");
     searchBtn.classList.add("ac");
   }
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
  searchBar.value="";
}
//console.log("sdjfklsdfhljks");
searchBar.onkeyup=()=>{
   let srvl = searchBar.value;
   //console.log(srvl);
   if(srvl != ""){
       searchBar.classList.add("active");
   }
   else{
      searchBar.classList.remove("active");

   }
  let xhr=new XMLHttpRequest();
     xhr.open("POST","php/dtSearch.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
               // console.log(data);
               BodyContDtList.innerHTML=data;
            }
        }
     } 
     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhr.send("srvl=" + srvl);
}

const searchBar1 = document.querySelector(".body .serial .search input"),
searchBtn1 = document.querySelector(".body .serial .search button");
//console.log("ok,,,");
searchBtn1.onclick= ()=>{
  searchBar1.classList.toggle("active");
  searchBar1.focus();
  searchBtn1.classList.toggle("active");
  searchBar1.value="";
}
searchBar1.onkeyup=()=>{
   let srvl = searchBar1.value;
   //console.log(srvl);
   if(srvl != ""){
       searchBar1.classList.add("active");
   }
   else{
      searchBar1.classList.remove("active");

   }
  let xhr=new XMLHttpRequest();
     xhr.open("POST","php/srSerial.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
               //console.log(data);
               //BodyContDtList.innerHTML=data;
               adTbody.innerHTML=data;
            }
        }
     } 
     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhr.send("srvl=" + srvl);
}




const searchBar2 = document.querySelector(".body .user .search input"),
searchBtn2 = document.querySelector(".body .user .search button");
//console.log("ok,,,");
searchBtn2.onclick= ()=>{
  searchBar2.classList.toggle("active");
  searchBar2.focus();
  searchBtn2.classList.toggle("active");
  searchBar2.value="";
}

//console.log("ok,,");

searchBar2.onkeyup=()=>{
  let searchTerm = searchBar2.value;
  //console.log(searchTerm);
  if(searchTerm != ""){
       searchBar2.classList.add("active");
   }
   else{
      searchBar2.classList.remove("active");
   }
  let xhr=new XMLHttpRequest();
     xhr.open("POST","php/userSearch.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                //console.log(data);
                userList.innerHTML=data;
            }
        }
     } 
     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhr.send("searchTerm=" + searchTerm); 
}

/************** Header  *********************/  
const serialBtn=document.querySelector(".head input[name='srl']"),
LinOutBtn=document.querySelector(".head input[name='LinOut']"),
serial=document.querySelector(".body .serial");
serialBtn.onclick=()=>{
      if(Body.classList.contains("left")){
          serial.style.width="0px";
           serial.style.visibility="hidden";

            BodyCont.style.width="100%"; 
           BodyCont.style.visibility="visible";
           Body.classList.remove("left");
      }
      else{
           if(Body.classList.contains("Adns")){
                admin.style.width="0px";
                admin.style.visibility="hidden";
                Body.classList.remove("Adns");
             }
           BodyCont.style.width="0px"; 
           BodyCont.style.visibility="hidden";

           serial.style.width="100%";
           serial.style.visibility="visible";
           Body.classList.add("left");
      }
  
}

LinOutBtn.onclick=()=>{
 // console.log("aaaaaaaa");
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
            }
        }
     } 
   xhr.send();  
}

const seriall=document.querySelector(".body .serial .zzz"),
      adTbody=seriall.querySelector(".tableContant tbody");
//adTbody.innerHTML="dhfdsgkddg";



setInterval(()=>{
  let xhr=new XMLHttpRequest();
     xhr.open("GET","php/adminsrlLoad.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
               //console.log(data);
              if(!searchBar1.classList.contains("active"))adTbody.innerHTML=data;
            }
        }
     } 
     xhr.send();
},500);


/************* content ***********************/
const BodyCont=document.querySelector(".body .content"),
      Berrt=BodyCont.querySelector(".error-txt"),
      BodyContHead=BodyCont.querySelector(".Dt_head"),
      BodyContRmvDt=BodyCont.querySelector(".removeDt"),
      DtBtn=BodyContRmvDt.querySelector("input[name='dtBtn']"),
      Dt_id=BodyContRmvDt.querySelector("input[name='DtId']"),
      BodyContDtList=BodyCont.querySelector(".Doctor_list"),
      AddDtBtn=BodyContHead.querySelector("input[name='Add']"),
      rmvDtBtn=BodyContHead.querySelector("input[name='rmv']");

       // Berrt.innerHTML="hello";

 BodyCont.onmouseenter=()=>{
    chatBox.classList.add("active");
  }
  BodyCont.onmouseleave=()=>{
    chatBox.classList.remove("active");
  }
reloadBody();    
function reloadBody(){
  let xhr=new XMLHttpRequest();
     xhr.open("GET","php/adminsDoctor.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
               // console.log(data);
                BodyContDtList.innerHTML=data;       
            }
        }
     } 
     xhr.send();
}    
DtBtn.onclick=()=>{
  let DtId = Dt_id.value;
  let xhr=new XMLHttpRequest();
     xhr.open("POST","php/rmvDt.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                 console.log(data);
                 if(data[0]=='s'){
                   location.href="admin.php?cuser_id=0";
                 }
                 else Berrt.innerHTML=data;
                
            }
        }
     } 
     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhr.send("Dt_id=" + DtId); 
}

AddDtBtn.onclick=()=>{
         if(BodyCont.classList.contains("rmvDtr")){
            BodyCont.classList.remove("rmvDtr");
            BodyContRmvDt.style="visibility: hidden;height: 0px;";
        }
        if(BodyCont.classList.contains("AddDt")){
          BodyCont.classList.remove("AddDt");
          BodyCont.style.width="100%";
          DtAdd.style="width: 0px;visibility: hidden;";
          DtAddForm.style="visibility:hidden;height: 0px!important;width:0px!important;";
        }
        else{
            BodyCont.classList.add("AddDt");
          BodyCont.style.width="50%";
          DtAdd.style="width: 50%!important;visibility:visible;";
          DtAddForm.style="visibility: visible;height: 100%!important;width:100%!important;";     
        }
      }

rmvDtBtn.onclick=()=>{
         if(BodyCont.classList.contains("AddDt")){
          BodyCont.classList.remove("AddDt");
          BodyCont.style.width="100%";
          DtAdd.style="width: 0px;visibility: hidden;";
          DtAddForm.style="visibility:hidden;height: 0px!important;width:0px!important;";
        }
        if(BodyCont.classList.contains("rmvDtr")){
          BodyCont.classList.remove("rmvDtr");
          Berrt.innerHTML="";
            BodyContRmvDt.style="visibility: hidden;height: 0px;";
        }
        else{
          BodyCont.classList.add("rmvDtr");
            BodyContRmvDt.style="visibility: visible;height: auto;";
        }
      }

/************* Doctor Add ***********************/
const DtAdd=document.querySelector(".body .Doctor_add");

const DtAddForm=document.querySelector(".body .Doctor_add form"),
      
      DtAddBtn=DtAddForm.querySelector("input[name='xyz']"),
      DtAddDay=DtAddForm.querySelector(".Day"),
      DtAddDayText=DtAddDay.querySelector(".Day_txt"),
      DtAddDayTextIn=DtAddDayText.querySelector("input[name='days']"),
      DtAddDayIn=DtAddDay.querySelector(".Days"),

      saturDay=DtAddDayIn.querySelector("input[name='sa']"),
      sunDay=DtAddDayIn.querySelector("input[name='su']"),
      munDay=DtAddDayIn.querySelector("input[name='mu']"),
      wednesDay=DtAddDayIn.querySelector("input[name='we']"),
      tuesDay=DtAddDayIn.querySelector("input[name='tu']"),
      thursDay=DtAddDayIn.querySelector("input[name='th']"),
      friDay=DtAddDayIn.querySelector("input[name='fr']");
      errt=document.querySelector(".body .Doctor_add .error-txt");
      //errt.innerHTML="hello,";

DtAddForm.onsubmit =(e)=>{
    e.preventDefault();
}
//console.log("zjlkj");

DtAddBtn.onclick=()=>{
   let xhr=new XMLHttpRequest();
     xhr.open("POST","php/DoctorAdd.php");
     xhr.onload=()=>{
        //console.log("OK");
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                console.log(data);
                if(data[0]=='s'){
                  location.href="admin.php?cuser_id=0";
                }
                else errt.innerHTML=data;
            }
        }
     } 
     let formData=new FormData(DtAddForm);
     xhr.send(formData);  
}

      saturDay.onclick=()=>{
        if(DtAddDayIn.classList.contains("sa")){ 
          DtAddDayIn.classList.remove("sa");
          saturDay.style.background="none";
        }
        else{
         DtAddDayIn.classList.add("sa");
         saturDay.style.background="#006856";
        }
        createText();
      }

      sunDay.onclick=()=>{
        if(DtAddDayIn.classList.contains("su")){
         DtAddDayIn.classList.remove("su");
         sunDay.style.background="none";
        }
        else{ 
          DtAddDayIn.classList.add("su");
          sunDay.style.background="#006856";
        }
        createText();
      }

      munDay.onclick=()=>{
        if(DtAddDayIn.classList.contains("mu")){
         DtAddDayIn.classList.remove("mu");
         munDay.style.background="none";
        }
        else{ 
          DtAddDayIn.classList.add("mu");
          munDay.style.background="#006856";
         }
        createText();
      }
      wednesDay.onclick=()=>{
        if(DtAddDayIn.classList.contains("we")){
         DtAddDayIn.classList.remove("we");
         wednesDay.style.background="none";
        }
        else{ 
          DtAddDayIn.classList.add("we");
          wednesDay.style.background="#006856";
        }
        createText();
      }

      tuesDay.onclick=()=>{
        if(DtAddDayIn.classList.contains("tu")){
         DtAddDayIn.classList.remove("tu");
         tuesDay.style.background="none";
        }
        else{ 
          DtAddDayIn.classList.add("tu");
          tuesDay.style.background="#006856";
        }
        createText();
      }

      thursDay.onclick=()=>{
        if(DtAddDayIn.classList.contains("th")){
         DtAddDayIn.classList.remove("th");
         thursDay.style.background="none";
        }
        else{ 
          DtAddDayIn.classList.add("th");
          thursDay.style.background="#006856";
        }
        createText();
      }

      friDay.onclick=()=>{
        if(DtAddDayIn.classList.contains("fr")){
         DtAddDayIn.classList.remove("fr");
         friDay.style.background="none";
        }
        else{ 
          DtAddDayIn.classList.add("fr");
          friDay.style.background="#006856";
        }
        createText();
      }
      

      function createText(){
          //console.log(DtAddDayIn.classList);
          str="";
          if(DtAddDayIn.classList.contains("sa"))str+="Saturday ";
          if(DtAddDayIn.classList.contains("su"))str+="Sunday ";
          if(DtAddDayIn.classList.contains("mu"))str+="Monday ";
          if(DtAddDayIn.classList.contains("we"))str+="Wednesday ";
          if(DtAddDayIn.classList.contains("tu"))str+="Tuesday ";
          if(DtAddDayIn.classList.contains("th"))str+="Thursday ";
          if(DtAddDayIn.classList.contains("fr"))str+="Friday";
         // console.log(str);
          DtAddDayTextIn.value=str;
      }

/****************** Admin ********************/
const admin=document.querySelector(".body .Admin"),
      err=admin.querySelector(".error-text"),
      addcls=admin.querySelector(".AddAd"),

      adAdCbtn=addcls.querySelector("input[name='adBtn']"),
      adAdCIn=addcls.querySelector("input[name='adId']"),

      dltcls=admin.querySelector(".removeDt"),
      dtAdCbtn=dltcls.querySelector("input[name='dtBtn']"),
      dtAdCIn=dltcls.querySelector("input[name='dtId']"),

      AddAdBtn=admin.querySelector(".Dt_head input[name='Add']"),
      rmvAdBtn=admin.querySelector(".Dt_head input[name='rmv']"),
      AdTb=admin.querySelector(".tableContant"),
      AdTbb=AdTb.querySelector("tbody");


dtAdCbtn.onclick=()=>{
  let userId = dtAdCIn.value;
  let xhr=new XMLHttpRequest();
     xhr.open("POST","php/dtAdmins.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                //console.log(data);
                if(data[0]==="Y"){
                     err.innerHTML="Admin Delete successfully.."; 
                     err.style="background: green;width:300px;height:30px;" 
                     dltcls.style="visibility: hidden;height:0px;";
                     dtAdCIn.value="";
                }
                else{
                  err.innerHTML=data;
                  err.style="background: red; width:400px;height:30px;"; 
                }
                
            }
        }
     } 
     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhr.send("userId=" + userId); 
}

adAdCbtn.onclick=()=>{
  let userId = adAdCIn.value;
  let xhr=new XMLHttpRequest();
     xhr.open("POST","php/AddAdmins.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                //console.log(data);
                if(data[0]==="Y"){
                     err.innerHTML="Admin Add successfully.."; 
                     err.style="background: green;" 
                     addcls.style="visibility: hidden;height:0px;";
                     adAdCIn.value="";
                }
                else{
                  err.innerHTML=data;
                  err.style="background: red; width:400px;height:30px;"; 
                }

            }
        }
     } 
     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhr.send("userId=" + userId); 
}

setInterval(()=>{
   err.innerHTML="";
   err.style="background: none;" 
},5000);
AddAdBtn.onclick=()=>{
  adAdCIn.value="";
  hidnAd();
  if(admin.classList.contains("add")){
        admin.classList.remove("add");
  }
  else{
        admin.classList.add("add");
        addcls.style="visibility: visible;height: auto;";
  }
  if(admin.classList.contains("delete")){
      admin.classList.remove("delete");
  }
}    
rmvAdBtn.onclick=()=>{
  //console.log("delete");
  dtAdCIn.value="";
  hidnAd();
  if(admin.classList.contains("delete")){
      admin.classList.remove("delete");
  }
  else{
      admin.classList.add("delete");
      dltcls.style="visibility: visible;height: auto;";
  }
  if(admin.classList.contains("add")){
        admin.classList.remove("add");
  }
}

function hidnAd(){
   dltcls.style="visibility: hidden;height:0px;";
   addcls.style="visibility: hidden;height:0px;";
}

setInterval(()=>{
  let xhr=new XMLHttpRequest();
     xhr.open("GET","php/admins.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                //console.log(data);
                AdTbb.innerHTML=data;
            }
        }
     } 
     xhr.send();
},500);


/*********************** User *****************/
const user=document.querySelector(".body .user");
const userList=document.querySelector(".body .user .user-list");

setInterval(()=>{
  let xhr=new XMLHttpRequest();
     xhr.open("GET","php/users.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                //console.log(data);
                if(!searchBar2.classList.contains("active")){
                  userList.innerHTML=data;
                }
            }
        }
     } 
     xhr.send();
},500);


/****************** chat area ******************/
const ctAR=document.querySelector(".body .chat-area");
const cform=document.querySelector(".typing-area"),
cinputField=cform.querySelector(".chat-area form input[name='msg']"),
sendBtn=cform.querySelector("button"),
chatBox=document.querySelector(".chat-box");

//ctAR.style="width:500px;visibility: visible;";

cform.onsubmit =(e)=>{
    e.preventDefault();
}
sendBtn.onclick=()=>{
   let xhr=new XMLHttpRequest();
     xhr.open("POST","php/admin_chatIn.php");
     xhr.onload=()=>{
        //console.log("OK");
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                //console.log(data);
                cinputField.value="";
                scrollToBotton();
            }
        }
     } 
     let formData=new FormData(cform);
     xhr.send(formData);
 }

  chatBox.onmouseenter=()=>{
    chatBox.classList.add("active");
  }
  chatBox.onmouseleave=()=>{
    chatBox.classList.remove("active");
  }

 setInterval(()=>{
  let xhr=new XMLHttpRequest();
     xhr.open("POST","php/admin_chatGet.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
                //console.log(data);
                chatBox.innerHTML=data;
                if(!chatBox.classList.contains("active"))scrollToBotton();
            }
        }
     } 
     let formData=new FormData(cform);
     xhr.send(formData);
},500);

 function scrollToBotton(){
  chatBox.scrollTop=chatBox.scrollHeight;
 }

/****************** footer  *******************/
const sms=document.querySelector(".sms input[name='chat']");
const Admins=document.querySelector(".sms input[name='serial']");

sms.onclick=()=>{
    if(ctAR.style.visibility=="visible"){
         ctAR.style="width:0px;visibility: hidden;";
         location.href="admin.php?cuser_id=0";
      }
    else if(Body.classList.contains("userr")){
    Body.classList.remove("userr");
    user.style="width:0px;visibility: hidden;";
    location.href="admin.php?cuser_id=0";
  }
  else{
    Body.classList.add("userr");
    user.style="width:500px;visibility: visible;";
   // location.href="admin.php?cuser_id=0"
  }
  
}
Admins.onclick=()=>{
  //console.log("Admin");
   if(Body.classList.contains("Adns")){
          admin.style.width="0px";
           admin.style.visibility="hidden";

            BodyCont.style.width="100%"; 
           BodyCont.style.visibility="visible";
           Body.classList.remove("Adns");
      }
      else{
           if(Body.classList.contains("left")){
              serial.style.width="0px";
               serial.style.visibility="hidden";
                Body.classList.remove("left");
             }
           BodyCont.style.width="0px"; 
           BodyCont.style.visibility="hidden";

           admin.style.width="100%";
           admin.style.visibility="visible";
           Body.classList.add("Adns");
    }
}
/*

*/
