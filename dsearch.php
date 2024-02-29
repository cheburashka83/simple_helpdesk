<?php                                //Подключить зависимости
require './lib/settings.php';
include "./lib/header.php";
include "./lib/sidebar.php";
include "./lib/topbar.php";
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Поиск заявок по датам</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">    <!-- Форма ввода даты -->
                <form action="dsearch.php" method="post">
                <label for="dateStart">Дата открытия (не ранее):</label>
                <input type="date" name="dateStart"/><br>
                <label for="dateEnd">Дата закрытия(не позже):</label>
                <input type="date" name="dateEnd"/><br>
                <input id="submit" class="btn btn-primary" type="submit" name="submit" value="Искать">
            </form><p></p>
<?php
if(isset($_POST["submit"])){        //если нажат submit, сделать выборку и отобразить таблицу
    if(!empty($_POST['dateStart']) && !empty($_POST['dateEnd'])) 
        $sql = 'SELECT * FROM services, abonents WHERE dateStart >= "'. $_POST['dateStart'] .'" AND dateEnd <= "'. $_POST['dateEnd'] .'" AND abonents.abId = services.abId';
            if($result = $pdo->query($sql)){
            $rowsCount = $result->num_rows; // количество полученных строк
            echo '<table id="example"><thead><tr>
            <th>Id Заявки</th>
            <th>Номер договора</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Фамилия</th>
            <th>Адрес</th>
            <th>телефон</th>
            <th>Дата открытия</th>
            <th>Дата закрытия</th>
            <th>Комментарий</th></tr></thead>';
            foreach($result as $row){
                echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["abId"] . "</td>";
                    echo "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $row["secName"] . "</td>";
                    echo "<td>" . $row["surName"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["dateStart"] . "</td>";
                    echo "<td>" . $row["dateEnd"] . "</td>";
                    echo "<td>" . $row["comment"] . "</td>";
                echo "</tr>";
            }
        echo "</tbody></table>";
        //скрипт обработки таблицы
        echo "<script>
        $(document).ready(function() {
            $('#example').DataTable();
        } ); </script>";
    } else {
        echo "Ошибка: " . $conn->error;
    }
}
?>

<?php                                //Подключить зависимости
require './lib/footer.php';
?>  