<?php
session_start();

if (!empty($_SESSION['user'])){

    session_destroy();

    
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