// $("form.product-modify").on("submit",function(event){
//     event.preventDefault();
// });

let modal = document.querySelector(".modal");
let depositt = document.querySelector(".depositt");
let span = document.querySelector("span.close");
span.onclick =()=>{
 modal.style.display = "none";
}

depositt.onclick =()=>{
    modal.style.display = "block";
   }