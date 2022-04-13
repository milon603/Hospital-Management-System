/************** chat   *********************/ 
const chatareaa=document.querySelector(".body .chat-area"),
      ctform=chatareaa.querySelector("form"),
      ctFIn=ctform.querySelector("input"),
      ctInBtn=ctform.querySelector("button");
      chatBox=document.querySelector(".chat-box");
ctform.onsubmit =(e)=>{
    e.preventDefault();
}
ctInBtn.onclick=()=>{
   let xhr=new XMLHttpRequest();
     xhr.open("POST","php/user_chatIn.php");
     xhr.onload=()=>{
        //console.log("OK");
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
               // console.log(data);
                ctFIn.value="";
               scrollToBotton();
            }
        }
     } 
     let formData=new FormData(ctform);
     xhr.send(formData);
 }
  chatBox.onmouseenter=()=>{
    chatBox.classList.add("active");
  }
  chatBox.onmouseleave=()=>{
    chatBox.classList.remove("active");
  }

 setInterval(()=>{
 	//console.log("jhdfk");
  let xhr=new XMLHttpRequest();
     xhr.open("POST","php/user_chatGet.php");
     xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status===200){
                let data = xhr.response;
               // console.log(data);
                  chatBox.innerHTML=data;
                if(!chatBox.classList.contains("active"))scrollToBotton();
            }
        }
     } 
     let formData=new FormData(ctform);
     xhr.send(formData);
},500);

 function scrollToBotton(){
  chatBox.scrollTop=chatBox.scrollHeight;
 }
