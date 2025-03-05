const form = document.querySelector(".form form");
const errorText = document.getElementById("error");

setInterval(() => {
    form.onsubmit = (e)=>{
        e.preventDefault();
    
        const org = window.location.origin;
        const regurl = `${org}/edit_user_profile`;
    
        let xhr = new XMLHttpRequest();
        xhr.open("POST", regurl, true);
        xhr.onload = ()=>{
          if(xhr.readyState === XMLHttpRequest.DONE){
              if(xhr.status === 200){
                  let data = xhr.response;
                  if(data == 'successnull'){
                    errorText.style.display = "block";
                    errorText.textContent = "User info updated successful Boss!";
                    setTimeout(() => {
                        location.href=window.location.origin;
                        errorText.remove();
                    }, 3000);
                  }
                  if(data === "success"){
                    errorText.style.display = "block";
                    errorText.textContent = "User info updated successful Boss!";
                    setTimeout(() => {
                        errorText.remove();
                    }, 3000);
                    
                  }else{
                    if(data == 'successnull'){
                      errorText.style.display = "block";
                      errorText.textContent = "User info updated successful Boss!";
                      setTimeout(() => {
                          errorText.remove();
                      }, 3000);
                    } else {
                      errorText.style.display="block";
                      errorText.innerHTML=data;
                      setTimeout(() => {
                        errorText.style.display="none";
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