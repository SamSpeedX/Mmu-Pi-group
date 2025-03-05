const sajili = document.getElementById("sajili");
const form = document.querySelector("form");
const errorText = document.getElementById("error");

setInterval(() => {
    form.onsubmit = (e)=>{
        e.preventDefault();
    
        const regurl = "http://127.0.0.1:8000/add-to-cart";
        let xhr = new XMLHttpRequest();
        xhr.open("POST", regurl, true);
        xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                  let data = xhr.response;
                    errorText.style.display="block";
                    errorText.innerHTML=data;
                    setTimeout(() => {
                      errorText.style.display="none";
                    }, 1000);
              }
          }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }
}, 1000);
