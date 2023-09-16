const form=document.querySelector("form#frmsignup");
const btn=document.querySelector("#button");
const error=document.querySelector(".error");

form.onsubmit=(e)=>{
   e.preventDefault();
}

btn.onclick=()=>{
   console.log("heello")
let xhr=new XMLHttpRequest();

xhr.onreadystatechange=()=>{
if(xhr.readyState===XMLHttpRequest.DONE){
     if(xhr.status===200){
              let data=xhr.response;
              
             if(data ==="success"){
             //    error.textContent=data;
                location.href="army";
                }
                else{
                    error.textContent=data;
                   error.style.display="block";
                   btn.innerHTML="Sign up again";
                   btn.style.fontSize="0.8em";
                   }    	
         }//status
         
      }
else{
       btn.innerHTML='<i class="fa fa-spinner fa-pulse"></i>';
       btn.style.color="white";
      btn.style.fontSize="1.2em";
     }
}

xhr.open("POST","./Controllers/signupcontroller.php",true);
let formdata=new FormData(form);
xhr.send(formdata);

//"http://localhost/websites/social/sign-up/m



}


function checka(){
var d=document.getElementById("passa");
var eyea=document.getElementById("showa");
   


if(d.type==="password"){
       d.type="text";
       eyea.innerHTML='<ion-icon name="eye-off-outline" style="font-size:1.6em;"></ion-icon>';
   }
else{
   d.type="password";
   eyea.innerHTML='<ion-icon name="eye-outline" style="font-size:1.6em;"></ion-icon>';
       
   }
}



function checkb(){
var e=document.getElementById("passb");
var eyeb=document.getElementById("showb");

if(e.type==="password"){
e.type="text";
eyeb.innerHTML='<ion-icon name="eye-off-outline" style="font-size:1.6em;"></ion-icon>';
   }
else{
e.type="password";
eyeb.innerHTML='<ion-icon name="eye-outline" style="font-size:1.6em;"></ion-icon>';

       }
}
