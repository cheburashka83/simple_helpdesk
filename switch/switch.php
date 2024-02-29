<?php                       //Подключить зависимости
include "../lib/settings.php";
include "../lib/header.php";
include "../lib/sidebar.php";
include "../lib/topbar.php";
include "./getstat.php";
?>

<?php                       //Добавить коммутатор или Редактировать коммутатор при совпадении Имени
if(isset($_POST["name"])){
    if (isset ($_POST['deleted'])) {
        $del = 1;} 
        else {$del = 0;}
    $sql="INSERT INTO `switch` (`swname`, `swip`, `swmodel`, `swaddress`, `swports`, `swcommunity`, `deleted`) VALUES ('". $_POST[name] ."', '". $_POST[ip] ."', '".$_POST[model]."', '".$_POST[address]."','".$_POST[ports]."', '".$_POST[community]."', '".$del."') ON DUPLICATE KEY UPDATE `swip`= VALUES(swip), `swmodel`= VALUES(swmodel), `swaddress`= VALUES(swaddress), `swports`= VALUES(swports), `swcommunity`= VALUES(swcommunity), `deleted`= VALUES(deleted);";
        $result=mysqli_query( $con, $sql);
			if($result){
				$message = "Switch data Updated";
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
    <h6 class="m-0 font-weight-bold text-primary">Коммутаторы</h6>
</div>
<div class="card-body">
<div class="table-responsive">
<?php                                         //Отобразить все коммутаторы
    $sql = "SELECT * FROM switch";
        if($result = $pdo->query($sql)){
                echo '<table class="table table-bordered" id="example" width="100%" cellspacing="0">
                <thead><tr>
                <th>Имя</th>
                <th>IP</th>
                <th>Модель</th>
                <th>Место установки</th>
                <th>кол-во портов</th>
                <th>Изменить</th>
                </thead> <tbody>';
                foreach($result as $row){
                    echo "<tr><td><a href=swinfo.php?id=" . $row["swname"] . ">" . $row["swname"] ."</a></td>";
                    echo "<td>" . $row["swip"] . "</td>";
                    echo "<td>" . $row["swmodel"] . "</td>";
                    echo "<td>" . $row["swaddress"] . "</td>";
                    echo "<td>" . $row["swports"] . "</td>";
                    
                    if (checkPing($row["swip"])) {     //красим ячейку если порт поднят
                       $portstatus = 'class="bg-success"';
                       } else { $portstatus = '';}
                    echo '<td ' . $portstatus.'><a href=./switchadd.php?Swid=' . $row["swname"] . '><img src=../img/pencil.png></a></td>';
                    echo "</tr>";
                }
                echo "</tbody></table>";
                
                echo "<script>
                $(document).ready(function() {
                    $('#example').DataTable();
                } ); </script>";
                
            } else{
                echo "Ошибка: " . $conn->error;
                }
        
        
            echo '</ul>';?>  

<a href=switchadd.php><button>Добавить коммутатор</button></a>
<?php
echo ($message);      //отобразить информацию при ошибке
require '../lib/footer.php';    //Подключить зависимости
?>  
