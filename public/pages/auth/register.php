<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - ItonSN</title>
</head>

<body>
    <form action="" method="post">
        <h1>Inscription</h1>
        <p>Veuillez remplir tous les champs.</p>
        <label for="username-i">Nom d'utilisateur</label>
        <input type="text" name="username" id="username-i" autocomplete="TRUE">

        <label for="email-i">Adresse mail</label>
        <input type="email" name="email" id="email-i" autocomplete="TRUE">
        
        <label for="password-i">Mot-de-passe</label>
        <input type="password" name="password" id="password-i" autocomplete="TRUE">
        
        <label for="birthdate-i">Date de naissance</label>
        <input type="date" name="birthdate" id="birthdate-i">

        <button type="button" id='submit-b'>Inscription</button>

        <p id='output' style="color: red;"></p>
    </form>

    <script src="../../src/js/auth/register.js"></script>
</body>

</html>