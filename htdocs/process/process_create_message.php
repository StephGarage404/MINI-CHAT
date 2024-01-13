<?php

include '../config/debug.php'; 
session_start();

if (!empty($_POST['chat'])) {

    require_once '../settings/connexion.php';

    $preparedRequest = $mysqlClient->prepare(
        "INSERT INTO message (created_at, id_user, message_user, ip_adress) VALUES (?,?,?,?)"
    );

    $preparedRequest->execute([
        date("Y-m-d H:i:s"),
        $_SESSION['iduser'],
        $_POST['chat'],
        $_POST['adress-ip']
    ]);
 

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>