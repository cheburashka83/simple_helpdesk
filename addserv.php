<?php   //создание заявки на странице поиска абонента
require 'lib/settings.php';           //Подключить зависимости

$id = $_GET['id'];
$comment = "Заявка создана:" . date('Y-m-d H:i');
$sql = "INSERT INTO `services` (`abId`, `dateStart`, `dateEnd`, `comment`) VALUES ('" .$id. "', NOW(), NULL, '" .$comment. "');";
print_r ($sql);
$query = $pdo->prepare($sql);
$query->execute([$id]);

header('Location: /index.php');     //возвращение на главную