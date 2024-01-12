<?php
    require_once "../settings/connexion.php"; 

    $preparedRequest = $mysqlClient->prepare(
        "SELECT * FROM message"
    );

    $preparedRequest->execute();

    $messages = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($messages);