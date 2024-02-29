<?php 				//Форма добавления пользователя и записи в БД
include "./lib/settings.php";                  //Подключить зависимости
include "./lib/header.php";
include "./lib/sidebar.php";
include "./lib/topbar.php";
?>

<?php
if(isset($_POST["register"])){
	//проверка на существование пользователя.
	if(!empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
	$full_name= htmlspecialchars($_POST['full_name']);
	$email=htmlspecialchars($_POST['email']);
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	$query=mysqli_query( $con, "SELECT * FROM users WHERE username='".$username."'");
	$numrows = $query->num_rows;
	if($numrows==0)	{					// Если такого username нет, записать в БД
		$sql="INSERT INTO users	(full_name, email, username,password) VALUES('".$full_name."','".$email."', '".$username."', '".$password."')";
		$result=mysqli_query( $con, $sql);
			if($result){
				$message = "Account Successfully Created";
			}
			else {
			$message = "Failed to insert data information! SQL query:".$sql;
			}
	}
	else {
	$message = "That username already exists! Please try another one!";
	}
	}
}
?>

<!DOCTYPE html>
	<html lang="en">
	<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Регистрация</title>
</head>
<body class="bg-gradient-primary">
<div class="container">

<div class="row justify-content-center">
	<div class="col-xl-10 col-lg-12 col-md-9">
		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Форма для ввода информации -->
				<div class="row">
					<div class="col-lg-12">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-6">Регистрация</h1>
									<form action="register.php" id="registerform" method="post" name="registerform">
 									<p><label for="user_login">Полное имя<br>
 									<input class="form-control form-control-user" id="full_name" name="full_name"  size="100%"  type="text" value="" required></label></p>
									<p><label for="user_pass">E-mail<br>
									<input class="form-control form-control-user" id="email" name="email" size="100%" type="email" value="" required></label></p>
									<p><label for="user_pass">Имя пользователя<br>
									<input class="form-control form-control-user" id="username" name="username" size="100%" type="text" value="" required></label></p>
									<p><label for="user_pass">Пароль<br>
									<input class="form-control form-control-user" id="password" name="password" size="100%"   type="password" value="" required></label></p>
									<p><input class="btn btn-primary btn-user btn-block" id="register" name= "register" type="submit" value="Добавить пользователя"></p>
	  								<?php echo ($message); ?>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php 				//Подключить зависимости
include "lib/footer.php";
?>

