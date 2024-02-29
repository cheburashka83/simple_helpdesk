<?php
include './lib/settings.php';                  //Подключить зависимости
$sql = 'DELETE FROM  `users` WHERE `userid` =' . $_GET['UserId'] .';';
$query = $pdo->query($sql);

header('Location: /users.php');             //вернуться на страницу
?>