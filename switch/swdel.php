<?php
include "../lib/settings.php";
$sql = 'DELETE FROM  `swcomment` WHERE `swname` ="' . $_GET['swname'] .'";';
$query = $pdo->query($sql);

$sql = 'DELETE FROM  `switch` WHERE `swname` ="' . $_GET['swname'] .'";';
$query = $pdo->query($sql);

header('Location: switch.php');
?>