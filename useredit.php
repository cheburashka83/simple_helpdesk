<?php               //Подключить зависимости
require "./lib/settings.php";
include "./lib/header.php";
include "./lib/sidebar.php";
include "./lib/topbar.php";
?>
<?php               // Извлечь пользователя для редактирования
if(!empty($_GET['UserId'])){
    $sql = "SELECT * from `users` where `userid` =" . $_GET['UserId'] . " limit 1"; 
    $result = mysqli_query($con,$sql);
    while ($element = mysqli_fetch_assoc($result)) {
    $array['0'] = $element;
    }
    $raw = $array[0];
}
if ( $raw['blocked'] == 1 ){     //Чекбокс для "Заблокирован"
    $checkbox = 'checked';} else { $checkbox = ''; }
?>
<!-- Отображение формы редактирования пользователя  -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Редактировать пользователя</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form action="users.php?UserId=<?php print_r ($raw['UserId']); ?>" method="post">
                <div class="mb-3"><label for="UserId">Id пользователя:</label><input type="text" class="form-control" id="UserId" name="UserId" readonly="readonly" value="<?php print_r ($raw['userid']); ?>"></div>
                <div class="mb-3"><label for="UserName">Имя пользователя:</label><input type="text" class="form-control" id="UserName" name="UserName" value="<?php print_r ($raw['username']); ?>"></div>
                <div class="mb-3"><label for="FullName">ФИО пользователя:</label><input type="text" class="form-control" id="FullName" name="FullName" value="<?php print_r ($raw['full_name']); ?>"></div>
                <div class="mb-3"><label for="Email">E-mail:</label><input type="text" class="form-control" id="Email" name="Email" value="<?php print_r ($raw['email']); ?>"></div>
                <div class="mb-3"><label for="Password">Пароль:</label><input type="password" class="form-control" id="Password" name="Password" placeholder="Password" value="<?php print_r ($raw['password']); ?>"></div>
                <div class="checkbox"><label for="deleted"><input type="checkbox" name="deleted" id="deleted" <?php echo($checkbox) ?>>  Заблокирован</label></div>
                <div class="mb-3"><input id="saveForm" class="btn btn-warning" type="submit" name="submit" value="Сохранить"></form></div>
                <div class="mb-3"><a href="userdel.php?UserId=<?php echo ($raw['userid']); ?>"><button class="btn btn-danger"data-toggle="modal" data-target="#deleteModal">Удалить</button></a></div>
            </div>
    </div>
</div>
<?php               //Подключить зависимости
include "./lib/footer.php";
?>