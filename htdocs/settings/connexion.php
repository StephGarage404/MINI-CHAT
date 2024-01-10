<?php
$mysqlClient = new PDO(
	'mysql:host=127.0.0.1;dbname=mini-chat;charset=utf8',
	'root',
	'',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,]
);
?> 




