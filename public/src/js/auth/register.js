const username = document.getElementById('username-i');
const email = document.getElementById('email-i');
const password = document.getElementById('password-i');
const birthDate = document.getElementById('birthDate-i');
const submit = document.getElementById('submit-b');
const out = document.getElementById('output');

console.log("Hello World !");

submit.addEventListener('click', pointer => {
    if (!checkInputs()) {
        console.log("Champs !", color="red");
        out.value = "Veuillez remplir tous les champs.";
        return;
    } else console.log("Pas champs");
})

function checkInputs()
{
    if (username != "" && email != "" && password != "" && birthDate != "")
        return true;
    else
        return false;
}