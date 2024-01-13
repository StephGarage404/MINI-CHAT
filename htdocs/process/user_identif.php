<?php
session_start();
require_once '../color/RandomColor.php';
Use \Colors\RandomColor;

if (!empty($_POST['userName'])) {

        require_once '../settings/connexion.php';


        //Prépare la requête SQL qui récupèrera la ligne de la table USER pour laquelle le pseudo est égal à la valeur saisie par l'utilisateur ($_POST['userName'])
        $SQLuniqueUser = $mysqlClient->prepare("SELECT * FROM user WHERE pseudo = '" . $_POST['userName'] . "'");
        //  Exécution de la requête sur le serveur SQL
        $SQLuniqueUser->execute();
        //  Récupération du résultat de la requête SQL (la ligne de la table USER correspondant au pseudo saisi)
        $uniqueUser = $SQLuniqueUser->fetch(PDO::FETCH_ASSOC);

        //  Si on a trouvé une ligne avec le pseudo saisi
        if (!empty($uniqueUser['pseudo']))
        {


            //  On "connecte" l'utilisateur en enregistrant son nom et son id dans la session en cours
            $_SESSION['user'] = $uniqueUser['pseudo'];
            $_SESSION['iduser'] = $uniqueUser['id'];
           

        }
        //  Si on n'a pas trouvé une ligne avec le pseudo saisi
        //      => c'est un nouvel utilisateur
        else
        {
            //  Préparation de la requête SQL
            $preparedRequest = $mysqlClient->prepare(
                "INSERT INTO user (pseudo, color) VALUES (?,?)");

            $color = RandomColor::one(); 
            
            //  Exécution de la requête SQL "insert" en remplaçant le ? par $_POST['userName'] et $color qui est envoyé en paramètre de la méthode execute
            $preparedRequest->execute(
                [
                    $_POST['userName'],
                    $color
                ]);

            
            //Prépare la requête SQL qui récupèrera la ligne de la table USER pour laquelle le pseudo est égal à la valeur saisie par l'utilisateur ($_POST['userName'])
            $SQLcreateduser = $mysqlClient->prepare("SELECT * FROM user WHERE pseudo = '" . $_POST['userName'] . "'");
            //  Exécution de la requête sur le serveur SQL
            $SQLcreateduser->execute(); 
            $createduser = $SQLcreateduser->fetch(PDO::FETCH_ASSOC);

            //  On "connecte" l'utilisateur qui vient d'être créé en enregistrant son nom et l'id qui a été créé dans la session en cours
            $_SESSION['user'] = $createduser['pseudo'];
            $_SESSION['iduser'] = $createduser['id'];

        }
}



