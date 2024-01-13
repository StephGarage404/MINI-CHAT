<?php
    require_once "../settings/connexion.php"; 

    $preparedRequest = $mysqlClient->prepare(
        "SELECT * FROM message INNER JOIN user ON message.id_user = user.id;"
    );

    $preparedRequest->execute();

    $messages = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($messages);