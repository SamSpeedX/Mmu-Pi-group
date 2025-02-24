const marchant = document.getElementById("marchant");
const action = document.getElementById("account");
const nida = document.getElementById("nidaa");
const nchi = document.getElementById("country");
const tin = document.getElementById("tini");

nchi.onchange = () => {
    if (nchi.value === 'Tanzania') {
        nida.style.display="block";
        tin.style.display="block";
    }

    if (nchi.value !== 'Tanzania') {
        nida.style.display="none";
        tin.style.display="none";
    }
}

action.onchange = () => {
    if (action.value === 'marchant') {
        marchant.style.display="block";
    }

    if (action.value !== 'marchant') {
        marchant.style.display="none";
    }
}

