<?php

session_start();
require '../settings/connexion.php'; 
date_default_timezone_set('Europe/Paris');


if (!empty($_POST['chat'])) {


    // Récuperer le message

    $preparedRequestGetUser = $mysqlClient->prepare(
       "SELECT * FROM user WHERE pseudo = ?"
    );

    // requete pour faire demarer une session ou en faire une ou reprendre celle en cours
    
    $preparedRequestGetUser->execute([
       $_SESSION['user']
    ]);
    $user = $preparedRequestGetUser->fetch(PDO::FETCH_ASSOC);

    $preparedRequest = $mysqlClient->prepare(
        "INSERT INTO message (created_at, id_user, message_user, ip_adress) VALUES (?,?,?,?)"
    );
    $preparedRequest->execute([

        date("Y-m-d H:i:s"),
        $user['id'],
        $_POST['chat'],
        $_POST['adress-ip'],

    ]);
}

?>


<!DOCTYPE html>
<html>
<head>
<title>Redirection automatique en HTML</title>

<meta http-equiv="refresh" content="1; URL=../index.php">
</head>

<body>
 <p>Vous serez redirigé vers une nouvelle page dans 1 secondes.</p>
</body>

</html>