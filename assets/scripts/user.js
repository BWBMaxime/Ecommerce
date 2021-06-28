/** POST METHOD */

// on récupère l'évènement du bouton submit
const submit = document.querySelector("input#btnSubmit");

// on récupère les infos du formulaire
const inputs = document.querySelectorAll("input.data");

// lors du click sur le bouton Submit 
submit.addEventListener('click', event => {
    form = {
        'firstname' : getValueByKey('firstname'),
        'lastname' : getValueByKey('lastname'),
        'email' : getValueByKey('email'),
        'birth' : getValueByKey('birth'),
        'phone' : getValueByKey('phone')
    };

    HTTP.post('/user', form, true, result => {
        if (result !== false && result["status"] == "success") {
            alert("Your account has been updated");
        }
        refresh();
    });
})



/** DELETE METHOD */

// on récupère l'évènement du bouton Delete account
const deleteBtn = document.querySelector("input#btnDelete");

deleteBtn.addEventListener('click', event => {
    HTTP.delete('/user', { 'id': getValueByKey('id') }, true, result => {
        if (result !== false && result["status"] == "success") {
            if (confirm("Do you want to confirm the deletion of your account?")) {
                window.location.replace('/');
            }
        }
    })
    
})



function getValueByKey(key) {
    let returnValue = null;
    for (let i = 0; i < inputs.length; i++) {
        let input = inputs[i];
        if (input.name === key) {
            if (input.value !== null) {
                returnValue = input.value
            } else {
                returnValue = input.defaultValue;
            }
            break;
        }
    }
    return returnValue;
}