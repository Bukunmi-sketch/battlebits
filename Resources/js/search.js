const searchbar=document.querySelector(".search");
const searchbtn=document.querySelector(".search-btn");
const loader=document.querySelector(".loading");
const userlist=document.querySelector(".feeds");
const errror=document.querySelector(".errror");
// const form=document.querySelector("form.create-post-container");    
// const searchpple=document.querySelector("#search-people");
// const searchpost=document.querySelector("#search-post");


form.onsubmit=(e)=>{
e.preventDefault();
}

searchbar.onkeyup=()=>{
    let searchterm=searchbar.value;
 
    let xhr="";
    if(window.XMLHttpRequest){
    xhr=new XMLHttpRequest();
    }
    else{
    xhr=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhr.onreadystatechange=()=>{
      if(xhr.readyState===XMLHttpRequest.DONE){
           if(xhr.status===200){
                let data=xhr.responseText;
                    
                   console.log(data);
                   userlist.innerHTML=data;
                   userlist.style.display="block";
                   userlist.style.fontSize="1.2em";
                   userlist.style.color="black";
                //   loader.innerHTML="";
              //     document.getElementById("loader").style.display="none";
                   
                                }    //STATUS ===200
          }    //DONE
   
       else{        		
//loader.innerHTML='<ion-icon name="reload-outline"></ion-icon>';
userlist.style.color="black";
userlist.style.fontSize="1.2em";
userlist.style.border="none";
userlist.style.backgroundColor="white"; 
         }
   }      
         
         
 xhr.open("POST","./Controllers/searchcontroller.php",true);
xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
xhr.send("searchtext="+searchterm);
} 		//onkeyup


searchbtn.onclick=()=>{
    let searchterm=searchbar.value;

    let xhr="";
    if(window.XMLHttpRequest){
    xhr=new XMLHttpRequest();
    }
    else{
    xhr=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhr.onreadystatechange=()=>{
      if(xhr.readyState===XMLHttpRequest.DONE){
           if(xhr.status===200){
                let data=xhr.responseText;
                    console.log(data);
                   userlist.innerHTML=data;
                   userlist.style.display="block";
                   userlist.style.fontSize="1.2em";
                   userlist.style.color="black";
                   loader.innerHTML="";
              //     document.getElementById("loader").style.display="none";
                   
                                }    //STATUS ===200
          }    //DONE
   
       else{        		
loader.innerHTML='<ion-icon name="reload-outline"></ion-icon>';
userlist.style.color="black";
userlist.style.fontSize="1.2em";
userlist.style.border="none";
userlist.style.backgroundColor="white"; 
         }
   }      
         
         
 xhr.open("POST","./Controllers/searchcontroller.php",true);
xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
xhr.send("searchtext="+searchterm);
} 		//onkeyup



searchbar.onclick=()=>{
           let searchterm=searchbar.value;

           let xhr="";
           if(window.XMLHttpRequest){
               xhr=new XMLHttpRequest();
                   }
           else{
                   xhr=new ActiveXObject("Microsoft.XMLHTTP");
               }

xhr.onreadystatechange=()=>{
       if(xhr.readyState===XMLHttpRequest.DONE){
           if(xhr.status===200){
                   let data=xhr.responseText;
                   console.log(data);
                   userlist.innerHTML=data;
                   userlist.style.display="block";
                   userlist.style.fontSize="15px";
                   userlist.style.color="black";
                   loader.innerHTML="";
               }    //STATUS ===200
           }    //DONE

           else{        		
                   loader.innerHTML='<ion-icon name="reload-outline"></ion-icon>';
                   
                   userlist.style.color="grey";
                   userlist.style.fontSize="0.6em";
                   userlist.style.backgroundColor="white";  
              //     document.getElementById("loader").style.display="block";
               }
       }      

xhr.open("POST","./Controllers/searchcontroller.php",true);
xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
xhr.send("searchtext="+searchterm);
} //onclick



