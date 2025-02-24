const username1 = document.getElementById("name");
const email1 = document.getElementById("email");
const phone = document.getElementById("phone");
const id = document.getElementById("id");

setInterval(() => {
    fetch("api/profilejs", {
        method: 'POST',
        headers: { 'Content-Type': 'application/json'},
        body: JSON.stringify({ uid: id })
    })
    .then((response) => response.json())
    .then((data) => {
        username1.innerHTML=data.username;
        email1.innerHTML=data.email;
        phone.innerHTML=data.phone;
    })
    .catch((error) => {
        console.error(error);
        console.log(error); 
    })
}, 100);
alert("sam")