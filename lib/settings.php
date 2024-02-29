<?php
# mysql
$db = 'mysql:host=localhost;dbname=provider'; # Задаем адрес и имя базы данных
$pdo = new PDO($db, 'dbadmin', 'dbadmin21'); # Подключаемся
?>

<?php
$con = mysqli_connect('localhost','dbadmin', 'dbadmin21', 'provider') or die(mysql_error());
?>