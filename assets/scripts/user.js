// on récupère l'évènement du bouton submit
const submit = document.getElementById("btnSubmit");

// on récupère les infos du formulaire
const fname = document.getElementById("fname");
const lname = document.getElementById("lname");
const email = document.getElementById("email");
const birth = document.getElementById("birth");
const phone = document.getElementById("phone");

let form = [];

form.push = [fname, lname, email, birth, phone];

console.log(form);


submit.addEventListener('click', event => {
    event.preventDefault();
    HTTP.post('/user', { form }, true);
    setTimeout(() => { window.location.reload() }, 300);
})
