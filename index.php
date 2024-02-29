<?php
include "lib/settings.php";                   //Подключить зависимости
include "lib/header.php";
include "lib/sidebar.php";
include "lib/topbar.php";
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Текущие задачи</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
<?php                                                   //Получить список обращений клиентов из БД
    $sql = "SELECT * FROM services, abonents WHERE dateEND IS NULL AND abonents.abId = services.abId";
        if($result = mysqli_query($con,$sql)){
            echo '<table class="table table-bordered" id="example" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id Заявки <br> № договора </th>
                    <th>Имя  <br>Отчество <br>Фамилия <br> Паспорт</th>
                    <th>Адрес<br>телефон</th>
                    <th>Комментарий</th>
                    <th>Функции</th></tr></thead><tbody>';
            foreach($result as $row){                  //таблица с обращениями клиентов
                echo "<tr>";
                echo "<td>" . $row["id"] . "<br>" . $row["abId"] . "</td>";
                echo "<td>" . $row["Name"] . "<br>" . $row["secName"] . "<br>"  . $row["surName"] . "<br>" . $row["passport"] . "</td>";
                echo "<td>" . $row["address"] . "<br>тел.:" . $row["phone"] . "</td>";
                echo '<td>' . $row["comment"] . '</td>';
                echo '<td width="30%"><form action="comment.php?id=' . $row["id"] .'&comment='. $row["comment"] .'" method="POST">
                        <textarea name="commentadd" class="form-control" id="exampleFormControlTextarea1" rows="3" style="height: 65px;" placeholder="комментарий"></textarea><br>
                        <input id="saveForm" class="btn btn-outline-primary me-2 my-1" type="submit" name="submit" value="добавить"></form>
                        <a href="del.php?id=' . $row["id"] . '"><button class="btn btn-warning">Закрыть</button></a>
                <a href="print.php?id=' . $row["id"] . '&name=' . $row["Name"] . '&secName=' . $row["secName"] . '&surName=' . $row["surName"] . '&address=' . $row["address"] . '&phone=' . $row["phone"] . '&comment=' . $row["comment"] . '&start=' . $row["dateStart"] . '"><button class="btn btn-primary">Распечатать</button></a>
                </td>';
                echo "</tr>";
                }
                echo "</table>";
                    } else{
                        echo "Ошибка: " . $conn->error;
                        }

            echo '<script> $(document).ready(function() {$(\'#example\').DataTable();} ); </script>';  

?>
<?php                                //Подключить зависимости
    include "lib/footer.php";
?>