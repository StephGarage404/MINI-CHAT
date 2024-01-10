<?php

require "./settings/connexion.php";

if (!empty($_POST['id_message'])
&& !empty($_POST['id_user'])
&& !empty($_POST['message'])
&& !empty($_POST["date_time"])) 
{
    
    
    //Etape 2 Créer la requete SQL
    
    $sql = "INSERT INTO `message`(`id`, `id_user`, `message`, `created_at`) VALUES ('"
            . $_POST['id_message']. "', '" 
            . $_POST['id_user'] . "',' "
            . $_POST['message'] . "', '"
            . $_POST['date_time'] ."')";
            
    var_dump($sql);
    $mysqlClient->query($sql);  
}

else
{
   echo "requête invalide";
   echo "<pre>";
   var_dump($sql);
   echo "</pre>"; 
}