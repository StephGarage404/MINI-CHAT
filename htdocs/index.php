<?php
session_start();
include "./settings/superglobale-verif.php";
require "./settings/connexion.php";

$selectusers = 'SELECT * FROM user';
    $add_users = $mysqlClient->query($selectusers);
    $users = $add_users->fetchAll(PDO::FETCH_ASSOC);


$preparedRequest =  $mysqlClient->prepare(
     "SELECT * FROM message  
        JOIN user
        ON message.id_user = user.id");
 $preparedRequest->execute();
 $messages = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);


// ESSAIE RANDOM COLOR

//  $color = dechex(rand(0x000000, 0xFFFFFF));

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoForum</title>
    <link rel="stylesheet" href="./style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>
<body>
    
    

    <header>

        <nav class="navbar navbar-expand-lg d-flex align-items-right">
            
            <h1 class="titre">MINI CHAT</h1>
            <div class="container d-flex justify-content-end">
                

                <form action="./process/user_identif.php" method="post">
                    <button class="navbar-brand bg-transparent text-white" type="submit">Se connecter</button>
                    <input class="me-5"type="text" name="userName">

                </form>

            <form action="./process/session_leave.php" method="post">
            
                <button class="navbar-brand text-white" type="submit">Deconnexion</button>
                    
            </form>
             </div>

        </nav>

    </header>

<div style="color: red;font-size:40">AJOUTER COLONNE COLOR DANS TABLE USER</div>

    <section class="Card p-3 text-white ">

            <!-- DEBUT CODE HAUT DE PAGE!-->

            <div class="title row">

                <div class="col-6 fs-3 ">
                    <p >
                    Bienvenue aux passionnés automobiles! Rejoignez notre forum pour partager vos expériences et discuter d'événements auto passionnants.
                    </p>
                </div>

                <div class="col-3">

                </div>

                <div class="peopletalking col col-3">
                    <img src="./images/pngegg(2).png">
                </div>

            </div>

            <!-- FIN CODE HAUT DE PAGE!-->



        

        <div class="row mt-5">

            <!-- DEBUT CODE PARTIE GAUCHE!-->

            <div class="col col-6">

                <div class="row mx-5" id="passMessage">
 
                <?php
                   /* foreach ($messages as $ok) {

                        ?><div class="tchat"> <?= $ok['message_user']?></div><?php
                    }*/
                    ?>


                </div>

                <div class="row mclaren">
                        <img src="./images/pngegg(6).png" alt="mclaren rouge et noir">
                </div>

                <div class="row commente">

                    <form action="./process/new-comment.php" class="d-flex" role="search" method="post" id="NewChatForm">
                        
                        <input class="form-control me-2" name="chat" id="chat" placeholder="Participer à la disscussion..." aria-label="Search">
                        <!--  $_SERVER contient des informations système gérées par leur serveur
                            Dans notre cas, on récupère l'addresse IP du pc qui a ouvert la page index.php
                          -->
                        <input type="hidden" name="adress-ip" id="adress-ip" value="<?php $_SERVER['REMOTE_ADDR']?>">      
                        <button class="btn btn-danger" type="submit">Envoyer</button>
                    </form>

                  

                </div>

            </div>

            <!-- FIN CODE PARTIE GAUCHE!-->


            <!-- DEBUT CODE PARTIE MILIEU!-->

           
                <div class="col col-2 ps-5">
                    <div class="vr" style="height: 450px; width: 3px;"></div>        
                </div>

          

            <!-- FIN CODE PARTIE MILIEU!-->
                

            <!-- DEBUT CODE PARTIE DROITE!-->

            <div class="col col-4">
                <div class="blockuser">
                    <?php

                        foreach ($users as $value) {
                            ?> <div class="user" style="color:<?=$value['color']?>"> <?=$value['pseudo']?> </div> <?php 
                        }

                    ?>
                </div>
            </div>
            <!-- FIN CODE PARTIE DROITE!-->

        </div>

      

    </section>






    <footer>

        
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
    <script src="./JS/app.js"></script>

</html>