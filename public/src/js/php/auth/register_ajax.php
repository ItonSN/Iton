<?php

require_once __DIR__ . "/../../../../../src/database.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $jsonData = file_get_contents("php://input");
    $data = json_decode($jsonData, true);

    if (count($data) === 4) {
        $username = $data["username"];
        $email = $data["email"];
        $password = $data["password"];
        $birthDate = $data["birthDate"];

        $db = Database::getInstance();

        if (!$db->userExists($email)) {
            $birthYear = explode("-", $birthDate)[0];

            if ((int) date("Y") - (int) $birthYear > 15) {
                $db->createUser($username, $email, $password, $birthDate);

                echo "Inscription réussie !";
                http_response_code(200);
            } else {
                echo "Âge d'accès minimum en France : 15 ans";
                http_response_code(400);
            }
        } else {
            echo "Un utilisateur existe déjà avec cette adresse e-mail";
            http_response_code(400);
        }
    } else {
        echo "Des paramètres ont été oubliés";
        http_response_code(412);
    }
} else {
    echo "Mauvaise méthode";
    http_response_code(405);
}
