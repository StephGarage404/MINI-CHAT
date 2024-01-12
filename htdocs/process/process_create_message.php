<?php

include '../config/debug.php';

if (!empty($_POST['content'])) {

    require_once '../settings/connexion.php';

    $preparedRequest = $mysqlClient->prepare(
        "INSERT INTO message (chat, created_at) VALUES (?,?)"
    );

    $preparedRequest->execute([
        $_POST['chat'],
        date("Y-m-d H:i:s")
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