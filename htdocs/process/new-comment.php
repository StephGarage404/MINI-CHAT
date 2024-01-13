<?php

session_start();
require '../settings/connexion.php'; 
date_default_timezone_set('Europe/Paris');

//  Si l'utilisateur a saisi un message
//      et qu'il est connecté (iduser dans session)
if (!empty($_POST['chat']) && !empty($_SESSION['iduser']))
{
    //  Prépare la requête qui va insérer le nouveau message dans la table message
    $preparedRequest = $mysqlClient->prepare(
        "INSERT INTO message (created_at, id_user, message_user, ip_adress) VALUES (?,?,?,?)"
    );

    //  Exécute la requête en remplaçant les ? par les paramètres suivants : date et heure, id de l'utilisateur sélectionné, le texte du message et l'adresse IP
    $preparedRequest->execute([

        date("Y-m-d H:i:s"),
        $_SESSION['iduser'],
        $_POST['chat'],
        $_POST['adress-ip'],

    ]);
}




