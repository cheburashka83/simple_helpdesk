<?php                                   //поиск абонента по  id, фамилии, адресу
require './lib/settings.php';           //Подключить зависимости
include "./lib/header.php";
include "./lib/sidebar.php";
include "./lib/topbar.php";
?>

<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Поиск абонента</h6>
    </div>
    <div class="card-body">
    <div class="table-responsive">

<p>Поиск по id, фамилии, адресу</p>

<?php
$sql = "SELECT * FROM abonents WHERE abId LIKE '%" . $_POST['search'] . "%' OR surName LIKE '%" . $_POST['search'] . "%' OR address LIKE '%" . $_POST['search'] . "%'";

echo '<p></p>';
if($result = $pdo->query($sql)){
    $rowsCount = $result->num_rows; // количество полученных строк
    echo '<table class="table table-bordered" width="100%" cellspacing="0">
            <tr><th>Id</th><th>Имя</th>
                <th>Отчество</th><th>Фамилия</th>
                <th>Паспорт</th><th>Адрес</th><th>телефон</th><th></th></tr>';
    foreach($result as $row){       // вывод всех строк
        echo "<tr>";
            echo "<td>" . $row["abId"] . "</td>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["secName"] . "</td>";
            echo "<td>" . $row["surName"] . "</td>";
            echo "<td>" . $row["passport"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo '<td><a href="addserv.php?id=' . $row["abId"] .'"><button>Создать заявку</button></a></form></td>';
        echo "</tr>";
    }
    echo "</table>";
} else{
    echo "Ошибка: " . $conn->error;
    }
?>


<?php
include "./lib/footer.php";           //Подключить зависимости
?>


