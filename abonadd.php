<?php
require './lib/settings.php';
include "./lib/header.php";
include "./lib/sidebar.php";
include "./lib/topbar.php";
?>
<!-- Добавлениепользователя  -->
<?php
if (!empty($_POST['abId'])){
    $sql = "INSERT INTO `abonents` (`abId`, `Name`, `secName`, `surName`, `passport`, `address`, `phone`, `date`) VALUES ('". $_POST[abId] ."', '". $_POST[name] ."', '". $_POST[secName] ."', '". $_POST[surName] ."', '". $_POST[passport] ."', '". $_POST[address] ."', '". $_POST[phone] ."', '". $_POST[date] ."');";
//    echo $sql;
    $query = $pdo->query($sql);
    header('Location: /abonsearch.php');
}
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Добавить пользователя</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form action="abonadd.php?abId=<?php print_r ($raw['abId']); ?>" method="post">
                <div class="mb-3"><label for="abID">№ договора:</label><input type="text" class="form-control" id="abId" name="abId" ></div>
                <div class="mb-3"><label for="date">Дата договора:</label><input type="date" class="form-control" id="date" name="date" ></div>
                <div class="mb-3"><label for="name">Имя:</label><input type="text" class="form-control" id="name" name="name" ></div>
                <div class="mb-3"><label for="surName">Отчество:</label><input type="text" class="form-control" id="secName" name="secName" ></div>
                <div class="mb-3"><label for="secName">Фамилия:</label><input type="text" class="form-control" id="surName" name="surName" ></div>
                <div class="mb-3"><label for="passport">Паспорт:</label><input type="text" class="form-control" id="passport" name="passport" ></div>
                <div class="mb-3"><label for="address">Адрес:</label><input type="text" class="form-control" id="address" name="address" ></div>
                <div class="mb-3"><label for="phone">Телефон:</label><input type="text" class="form-control" id="phone" name="phone" ></div>
                <div class="mb-3"><input id="saveForm" class="btn btn-warning" type="submit" name="submit" value="Сохранить"></form></div>
        </div>
    </div>
</div>


<?php
include "./lib/footer.php";
?>