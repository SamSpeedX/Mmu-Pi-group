const sajili = document.getElementById("sajili");
const form = document.querySelector(".awali form");
const errorText = document.getElementById("error");

setInterval(() => {
    form.onsubmit = (e)=>{
        e.preventDefault();
    
        const org = window.location.origin;
        const regurl = `${org}/awal`;
    
        let xhr = new XMLHttpRequest();
        xhr.open("POST", regurl, true);
        xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                  let data = xhr.response;
                  if(data == 'successnull'){
                    errorText.style.display = "block";
                    errorText.textContent = "Login successful Your welcome Boss!";
                    setTimeout(() => {
                        location.href="/";
                        errorText.remove();
                    }, 3000);
                  }
                  if(data === "success"){
                    errorText.style.display = "block";
                    errorText.textContent = "Login successful Your welcome Boss!";
                    setTimeout(() => {
                        location.href="/";
                        errorText.remove();
                    }, 3000);
                    
                  }else{
                    if(data == 'successnull'){
                      errorText.style.display = "block";
                      errorText.textContent = "Login successful Your welcome Boss!";
                      setTimeout(() => {
                          location.href="/";
                          errorText.remove();
                      }, 3000);
                    } else {
                      errorText.style.display="block";
                      errorText.innerHTML=data;
                      setTimeout(() => {
                        errorText.style.display="none";
                        location.href='login';
                      }, 4000);
                    }
                  }
              }
          }
        }
        let formData = new FormData(form);
        xhr.send(formData);
    }
}, 1000);