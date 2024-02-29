<?php                                   //управление - редактирование пользователей
require './lib/settings.php';           //Подключить зависимости
include "./lib/header.php";
include "./lib/sidebar.php";
include "./lib/topbar.php";
?>
<!-- Изменить пользователя -->
<?php
if(isset($_GET["UserId"])){             //если установлен GET["UserId"]
    if (isset ($_POST['deleted'])) {    //если установлен POST['deleted']
        $del = 1;} 
        else {$del = 0;}

	$sql='UPDATE `users` SET `username`= "' . $_POST['UserName'] . '", `password`= "' . $_POST['Password'] . '" , `full_name`= "' . $_POST['FullName'] . '" , `email`= "'. $_POST['Email'] . '", `blocked` = "' . $del . '" WHERE `userid` = "' . $_POST['UserId'] . '";';
        $result=mysqli_query( $con, $sql); //изменить в БД
			if($result){
				$message = "Account Successfully Updated";
			}
			else {
			$message = "Failed to insert data information! SQL query:".$sql;
			}
	}
	else {
	$message = "";
	}
?>                                  
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Все абоненты<br>
    </div>
    <div class="card-body">
    <div class="table-responsive">


<?php               //отображение страницы с таблицей пользователей
echo ('<a href="register.php"><button class="btn btn-primary">Добавить пользователя</button></a><br><br><br>');
    $sql = "SELECT * FROM users ";
        if($result = $pdo->query($sql)){
                echo '<table id="example" class="table table-bordered" width="100%" cellspacing="0">
                <thead><tr>
                <th>ID пользователя</th>
                <th>Username</th>
                <th>Пароль</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Блокирован</th></tr>
                </thead> <tbody>';
               
                foreach($result as $row){
                    echo '<tr><td><a href="useredit.php?UserId=' . $row["userid"] . '">' . $row["userid"] . '</a></td>';
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["password"] . "</td>";
                    echo "<td>" . $row["full_name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["blocked"] . "</td>";
                    
                    //echo '<td><a href="abonedit.php?abId=' . $row["abId"] . '"><button class="btn btn-info" >Редактировать</button></a></td>';
                    echo "</tr>";
                }
                echo "</tbody></table>";
                
    echo "<script>$(document).ready(function() {
        $('#example').DataTable();
        } ); </script>";
                
            } else{
                echo "Ошибка: " . $conn->error;
                }
            echo '</ul>';
        echo ($message);
?>       
<?php               //Подключить зависимости
include './lib/footer.php';
?>  
