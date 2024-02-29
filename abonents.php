<?php
require './lib/settings.php';
include "./lib/header.php";
include "./lib/sidebar.php";
include "./lib/topbar.php";
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Все абоненты<br>
    </div>
    <div class="card-body">
    <div class="table-responsive">


<?php
echo ('<a href="abonadd.php"><button class="btn btn-primary">Добавить абонента</button></a><br><br>');
    $sql = "SELECT * FROM abonents ";
        if($result = $pdo->query($sql)){
                echo '<table id="example" class="table table-bordered" width="100%" cellspacing="0">
                <thead><tr>
                <th>№ договора</a></th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Фамилия</th>
                <th>Паспорт</th>
                <th>Адрес</th>
                <th>телефон</th></tr>
                </thead> <tbody>';
               
                foreach($result as $row){
                    echo '<tr><td><a href="abonedit.php?abId=' . $row["abId"] . '">' . $row["abId"] . '</a></td>';
                    echo "<td>" . $row["Name"] . "</td>";
                    echo "<td>" . $row["secName"] . "</td>";
                    echo "<td>" . $row["surName"] . "</td>";
                    echo "<td>" . $row["passport"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
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
        
        
            echo '</ul>';?>  
<?php
require './lib/footer.php';
?>  
