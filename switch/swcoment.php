<?php               //Подключить зависимости
include '../lib/settings.php';
include '../lib/header.php';

$swid = $_GET['id'];            //извлечь данные из формы на стронице swinfo.php с комментарием
$comment = $_POST['port_description'];
$port = $_POST['port_num'];

$sql = "SELECT * FROM `swcomment` WHERE swname = '" . $swid . "' AND swport = '" . $port . "'"; 
$result = mysqli_query($con,$sql);  //проверить наличие текущего комментария
if($row = mysqli_fetch_assoc($result)){     //делаем UPDATE, если есть
    $sql = "UPDATE `swcomment` SET `comment` = '" . $comment . "' WHERE `commentid` = '" . $row['commentid'] . "'";
} else {                            //делаем INSERT, если нет комментария
$sql = "INSERT INTO swcomment (`comment`, `swname`, `swport`)  VALUES ('" . $comment . "','" . $swid . "','" . $port ."')";
}

$query = $pdo->prepare($sql);
$query->execute([$id]);
header('Location: ./swinfo.php?id=' . $swid); //вернуться на swinfo.php
?>