const marchant = document.getElementById("marchant");
const action = document.getElementById("account");
const nida = document.getElementById("nidaa");
const nchi = document.getElementById("country");
const tin = document.getElementById("tini");
const nn = document.getElementById("id")

setInterval(() => {
    if (nchi !== null) {
        nchi.onchange = () => {
            if (nchi.value === 'Tanzania') {
                nida.style.display="block";
                tin.style.display="block";
                nn.style.display="none";
            }
        
            if (nchi.value !== 'Tanzania') {
                nida.style.display="none";
                tin.style.display="none";
                nn.style.display="block";
            }
        }
    }

    if (nchi === 'china') {
        nn.style.display="block";
    }
    
    if (action !== null) {
        action.onchange = () => {
            if (action.value === 'marchant') {
                marchant.style.display="block";
            }
        
            if (action.value !== 'marchant') {
                marchant.style.display="none";
            }
        }
    }
}, 500);

