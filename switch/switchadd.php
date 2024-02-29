<?php           //Подключить зависимости
include "../lib/settings.php";
include "../lib/header.php";
include "../lib/sidebar.php";
include "../lib/topbar.php";
?>

<?php                   //Отобразить поля для редактирования, если не пустой $_GET['Swid']
if(!empty($_GET['Swid'])){
        $sql = 'SELECT * FROM switch WHERE swname ="' . $_GET['Swid'] . '" ;';
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
        $edit = "Редактировать коммутатор";
        $readonly = 'readonly="readonly"';
        $ports = '<option selected>' . $row['swports'] . '</option>';
                if ( $row['deleted'] == 1 ){     //Чекбокс для "Удален"
                $checkbox = 'checked';} else { $checkbox = ''; }
} else {
        $edit = "Добавить коммутатор";
        $readonly = '';
        $ports = '';
}
?>

<?php                                   // Добавление коммутатора, если не пустой $_POST['name']
if(!empty($_POST['name'])){
    $sql = "INSERT INTO `switch` (`swname`, `swip`, `swmodel`, `swaddress`, `swports`, `swcommunity`, `deleted`) VALUES ('". $_POST[name] ."', '". $_POST[ip] ."', '".$_POST[model]."', '".$_POST[address]."','".$_POST[ports]."', '".$_POST[community]."', '".$_POST[deleted]."');";
print_r ("Коммутатор добавлен");
    $query = $pdo->query($sql);
}
?>                                      

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?php echo ($edit); ?></h6>
</div>
    <div class="card-body">
    <div class="col-lg-12"><form action="switch.php" method="post">
        <div class="form-group"><label for="name">Имя коммутатора:</label>
            <input class="form-control" type="text" id="name" name="name" value="<?php echo ($row['swname'] . '" ' .  $readonly) ?>"><?php $row['swname'] ?></div>
        <div class="form-group"><label for="ip">Ip адрес:</label>
                <input class="form-control" type="ip" id="ip" name="ip" value="<?php echo ($row['swip'] ) ?>"></div>
        <div class="form-group"><label for="model">Модель:</label>
                <input class="form-control" type="text" id="model" name="model" value="<?php echo ($row['swmodel'] ) ?>"></div>
        <div class="form-group"><label for="address">Место установки:</label>
                <input class="form-control" type="text" id="address" name="address" value="<?php echo ($row['swaddress'] ) ?>"></div>
        <div class="form-group"><label for="ports">Кол-во портов:</label>
                <select class="form-control" id="ports" name="ports">
                        <?php echo ($ports)  ?>
                        <option>18</option>
                        <option>24</option>
                        <option>26</option>
                        <option>28</option>
                        <option>48</option>
                        <option>52</option>
                </select></div>
                
        <div class="form-group"><label for="community">SNMP community:<br></label>
                <input class="form-control" type="text" id="community" name="community" value="<?php echo ($row['swcommunity'] ) ?>" ></div>
        <div class="checkbox"><label><input type="checkbox" id="deleted" name="deleted" value <?php echo ($checkbox) ?>>  Удален</label></div>
        <input id="saveForm" class="btn btn-primary" type="submit" name="submit" value="Сохранить">
        </form>  
        <div class="mb-3"><a href="./swdel.php?swname=<?php echo ($row['swname']); ?>"><button class="btn btn-danger"data-toggle="modal" data-target="#deleteModal">Удалить</button></a></div>
        </div>
        </div>
</div>
</div>
</body>
</html>

<?php                   //Подключить зависимости
include "../lib/footer.php";
?>