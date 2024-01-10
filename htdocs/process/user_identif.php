<?php
session_start();


if (!empty($_POST['userName']) ) {

        require_once '../settings/connexion.php';



        $SQLuniqueUser = $mysqlClient->prepare("SELECT * FROM user WHERE pseudo = '" . $_POST['userName'] . "'");

        $SQLuniqueUser->execute();

        $uniqueUser = $SQLuniqueUser->fetch(PDO::FETCH_ASSOC);


        if (!empty($uniqueUser['pseudo'])) {


            $_SESSION['user'] = $uniqueUser['pseudo'];


        }else{
            $preparedRequest = $mysqlClient->prepare(
                "INSERT INTO user (pseudo) VALUES (?)");

            $preparedRequest->execute([

                $_POST['userName']]);

            $_SESSION['user'] = $_POST['userName'];

            ;}
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