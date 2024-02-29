<?php
require 'lib/settings.php';
$sql = 'DELETE FROM  `services` WHERE `abId` =' . $_GET['abId'] .';';
$query = $pdo->query($sql);
print_r ($sql);

$sql = 'DELETE FROM  `abonents` WHERE `abId` =' . $_GET['abId'] .';';
$query = $pdo->query($sql);
print_r ($sql);

header('Location: abonents.php');
?>