<?php                                //Внесение комментария в заявку
include 'lib/settings.php';           //Подключить зависимости
include 'lib/header.php';


$id = $_GET['id'];
$comment = $_GET['comment'] . "<br>" .$_SESSION["session_username"] . " " . date('Y-m-d H:i') . ":" . $_POST['commentadd'];
$sql = "UPDATE services SET comment  = '" . $comment . "' WHERE services.id = " . $id ."";
$query = $pdo->prepare($sql);
$query->execute([$id]);
header('Location: /');