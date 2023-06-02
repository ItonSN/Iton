<?php
$pdo = new PDO("mysql:host=localhost;dbname=iton", "root", "");

if (count($_POST) === 2) {
    $email = $_POST["email"];
    $password = $_POST["pass"];

    $query = $pdo->prepare("SELECT * FROM users WHERE `email`='$email'");
    $query->execute();
    $result = $query->fetchAll();

    var_dump($result);

    if (!count($result) === 0) {
        $username = $result["username"];
        echo "Bienvenue $username !\n";
    } else
        echo "Aucun utilisateur avec l'adresse mail $email trouvé...\n";
        
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | Iton</title>
</head>

<body>
    <form action="" method="post">
    <input type="email" name="email" id="email-i" placeholder="Adresse e-mail">
        <input type="password" name="pass" id="pass-i" placeholder="MDP">
        <button type="submit">Inscription</button>
    </form>
</body>

</html>