/** POST METHOD */

// on récupère l'évènement du bouton submit
const submit = document.querySelector("input#btnSubmit");

// on récupère les infos du formulaire
const inputs = document.querySelectorAll("input.data");

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

// lors du click sur le bouton Submit 
submit.addEventListener('click', event => {
    form = {
        'firstname' : getValueByKey('firstname'),
        'lastname' : getValueByKey('lastname'),
        'email' : getValueByKey('email'),
        'birth' : getValueByKey('birth'),
        'phone' : getValueByKey('phone')
    };

    HTTP.post('/user', form, true, () => refresh());
})

/** DELETE METHOD */

// on récupère l'évènement du bouton Delete account
const deleteBtn = document.querySelector("input#btnDelete");

deleteBtn.addEventListener('click', () => HTTP.delete('/user', null, false, () => redirect('/')))