const form = document.querySelector("form");
const btnrandom = document.querySelector("#btnrandom");
const error = document.querySelector(".error");
const playername = document.querySelector(".playername");

// Prevent the form from submitting
form.addEventListener("submit", (e) => {
    e.preventDefault();
});

// Function to fade in an element
function fadeIn(element, callback) {
    element.style.opacity = 0;
    let opacity = 0;
    const interval = setInterval(() => {
        if (opacity < 1) {
            opacity += 0.1;
            element.style.opacity = opacity;
        } else {
            clearInterval(interval);
            if (typeof callback === "function") {
                callback();
            }
        }
    }, 100);
}

// Function to fade out an element
function fadeOut(element, callback) {
    let opacity = 1;
    const interval = setInterval(() => {
        if (opacity > 0) {
            opacity -= 0.1;
            element.style.opacity = opacity;
        } else {
            clearInterval(interval);
            if (typeof callback === "function") {
                callback();
            }
        }
    }, 100);
}

// Function to open the modal
function openModal() {
    const modal = document.getElementById("myModal");
    modal.style.display = "block";
    fadeIn(modal);
}

// Click event handler for the btnrandom button
btnrandom.addEventListener("click", () => {
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const data = xhr.responseText;
                let d=JSON.parse(data);
                
                if (d.message === "success") {
                    btnrandom.innerHTML ="Automatch players";
                    btnrandom.style.fontSize = "15px";
                    playername.innerHTML=d.playername;
                    setTimeout(openModal, 1000);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: data,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                    btnrandom.innerHTML = "Try Again";
                    btnrandom.style.fontSize = "15px";
                }
            }
        } else {
            btnrandom.innerHTML = '<i class="fa fa-spinner fa-pulse"></i>';
            btnrandom.style.color = "white";
            btnrandom.style.fontSize = "1.2em";
        }
    };

    xhr.open("POST", "./Controllers/randomController.php", true);
    const formdata = new FormData(form);
    xhr.send(formdata);
});
