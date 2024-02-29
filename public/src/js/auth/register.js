const username = document.getElementById('username-i');
const email = document.getElementById('email-i');
const password = document.getElementById('password-i');
const birthDate = document.getElementById('birthdate-i');
const submit = document.getElementById('submit-b');
const out = document.getElementById('output');

submit.addEventListener('click', pointer => {
    if (!checkInputs()) {
        out.innerHTML = "Veuillez remplir tous les champs.";
        return;
    } else {
        let xhr = new XMLHttpRequest();

        xhr.onreadystatechange = () => {
            if (xhr.readyState == 4) {
                if (xhr.status != 200) {
                    out.innerHTML = `Erreur ${xhr.status} : ${xhr.response}`;
                } else {
                    alert(xhr.response);
                }
            }
        };

        let data = {
            "username": username.value,
            "email": email.value,
            "password": password.value,
            "birthDate": birthDate.value
        };

        let jsonData = JSON.stringify(data);

        xhr.open('POST', '/src/js/php/auth/register_ajax.php', true);

        try {
            xhr.send(jsonData);
        } catch (err) {
            alert("Request failed");
        }
    }
})

function checkInputs() {
    if (username.value != "" && email.value != "" && password.value != "" && birthDate.value != "")
        return true;
    else
        return false;
}