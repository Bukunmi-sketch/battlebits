const form = document.querySelector("form");
const btnbalance = document.querySelector("#buywithbalance");
const btnwars = document.querySelector("#buywithwars");
const error = document.querySelector(".error");

form.onsubmit = (e) => {
    e.preventDefault();
}
/* The code block is an event handler for the click event on the `btn` element. When the button is
clicked, it creates an XMLHttpRequest object (`xhr`) to send an asynchronous HTTP request to the
server. */

btnbalance.onclick = () => {

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
                    btnbalance.innerHTML = "Buy with Balance";
                    btnbalance.style.fontSize = "15px";
                  Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: 'weapon purchased successfully',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
                } else {
                    // error.textContent = data;
                    // error.style.display = "block";

                    Swal.fire({
                        icon: 'error',
                        title: 'error!',
                        text: data,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                    
                    btnbalance.innerHTML = "try again";
                    btnbalance.style.fontSize = "15px";
                }
            } //STATUS ===200
        } else {
            btnbalance.innerHTML = '<i class="fa fa-spinner fa-pulse"></i>';
            btnbalance.style.color = "white";
            btnbalance.style.fontSize = "1.2em";

        } //DONE
    }

    xhr.open("POST", "./Controllers/weaponController.php", true);
    let formdata = new FormData(form);
    xhr.send(formdata);
}