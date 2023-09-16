/**
 * This JavaScript code is used to handle form submission and send the form data to a server using
 * AJAX.
 */


/* These lines of code are using the `querySelector` method to select specific elements from the HTML
document. */
const form=document.querySelector("form.create");
const depositfieid=document.querySelector("#depositfield");
const error=document.querySelector(".error");
const sendbtn=document.querySelector(".submit");

const chatboxx=document.querySelector(".chatboxx");

/* The code `form.onsubmit=(e)=>{ e.preventDefault(); }` is preventing the default form submission
behavior. When a form is submitted, the browser typically refreshes the page or redirects to a new
page. By calling `e.preventDefault()`, the code is preventing this default behavior from happening.
This allows the code to handle the form submission using AJAX instead of a traditional form
submission. */
form.onsubmit=(e)=>{
  e.preventDefault();
    }
 
 
/* The code `sendbtn.onclick=()=>{...}` is an event handler that is triggered when the send button is
clicked. */
sendbtn.onclick=()=>{     
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
                  let data=xhr.response;

                  if (data == "success") {
                    depositfieid.value="";
                   // chatboxx.innerHTML=data;
                   // chatboxx.style.display="block";
                  //  scrollbottom();
                  sendbtn.innerHTML = "Deposit";
                    sendbtn.style.fontSize = "15px";
                  Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Your deposit was successful.',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });

                } else {
                    error.textContent = data;
                    error.style.display = "block";
                    sendbtn.innerHTML = "try again";
                    sendbtn.style.fontSize = "15px";
                }
                      }    //STATUS ===200
                  }    //DONE
           else{
                  sendbtn.innerHTML="sending";
                  sendbtn.style.fontSize="0.7em";                                
          }  
      }
  /* The code `xhr.open("POST","../Controllers/commentController.php",true);` is setting up an AJAX
  request to the server. It specifies the HTTP method as POST and the URL to which the request
  should be sent. In this case, the URL is "../Controllers/commentController.php". */
   xhr.open("POST","./Controllers/createTransactionController.php",true);
   let formdata=new FormData(form);
   xhr.send(formdata); 
   }
/*
setInterval(()=>{

      let xhr="";
      if(window.XMLHttpRequest){
      xhr=new XMLHttpRequest();
      }
      else{
      xhr=new ActiveXObject("Microsoft.XMLHTTP");
      }
xhr.open("POST","m.getchat.php",true);
   xhr.onload=()=>{
      if(xhr.readyState===XMLHttpRequest.DONE){
          if(xhr.status===200){
              
              let data=xhr.response;
              chatboxx.innerHTML=data;
              chatboxx.style.display="block";
              scrollbottom();
                      }    //STATUS ===200
           }    //DONE
        }

let formdata=new FormData(form);
xhr.send(formdata); 

},500);		//onkeyup

*/
 function scrollbottom(){
    chatboxx.scrollTo=chatboxx.scrollHeight;
     }




