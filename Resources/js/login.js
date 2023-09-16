function check() {
    var d = document.getElementById("pass");
    var eye = document.getElementById("show");


    if (d.type === "password") {
        d.type = "text";
        eye.innerHTML = '<ion-icon name="eye-off-outline"></ion-icon>';
    } else {
        d.type = "password";
        eye.innerHTML = '<ion-icon name="eye-outline"></ion-icon>';
    }
}




//const form=document.querySelector("");

const form = document.querySelector("form#login");
const btn = document.querySelector("#button");
const error = document.querySelector(".error");

form.onsubmit = (e) => {
    e.preventDefault();
}
/* The code block is an event handler for the click event on the `btn` element. When the button is
clicked, it creates an XMLHttpRequest object (`xhr`) to send an asynchronous HTTP request to the
server. */

btn.onclick = () => {

    let xhr = "";
    if (window.XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    } else {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {

                let data = xhr.responseText;
                if (data == "success") {
                    location.href = "army";
                    // window.history.pushState('',"homeee","home.php");
                } else {
                    error.textContent = data;
                    error.style.display = "block";
                    btn.innerHTML = "Login again";
                    btn.style.fontSize = "15px";
                }
            } //STATUS ===200
        } else {
            btn.innerHTML = '<i class="fa fa-spinner fa-pulse"></i>';
            btn.style.color = "white";
            btn.style.fontSize = "1.2em";

        } //DONE
    }

    xhr.open("POST", "./Controllers/logincontroller.php", true);
    let formdata = new FormData(form);
    xhr.send(formdata);
}