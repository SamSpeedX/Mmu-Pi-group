const form = document.querySelector(".form");
const errorText = document.getElementById("error");

setInterval(() => {
  form.onsubmit = (e)=>{
    e.preventDefault();

    const org = window.location.origin;
    const regurl = `${org}/google_register`;
    let xhr = new XMLHttpRequest();
    xhr.open("POST", regurl, true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                setTimeout(() => {
                  errorText.style.display="block";
                  errorText.innerHTML="Congratulation Boss Your account has created successful!";

                  location.href="/login"
                }, 2000);
                location.href="/login";
              }else{
                if (data === 'successnull') {
                  setTimeout(() => {
                    errorText.style.display="block";
                    errorText.innerHTML="Congratulation Boss Your account has created successful!";
                    location.href="/login"
                  }, 2000);
                } else {
                  errorText.style.display = "block";
                  errorText.textContent = data;
                  setTimeout(() => {
                      errorText.remove();
                      location.href="/register"
                  }, 10000);
                }
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
}, 1000);