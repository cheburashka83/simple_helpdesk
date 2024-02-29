<?php
session_start();
require_once("./lib/settings.php"); //Подключить зависимости
if(isset($_POST["login"])){
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	$query =mysqli_query($con, "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'");
	$numrows=$query->num_rows;

	if($numrows!=0){            //если есть совпадение
	while($row=mysqli_fetch_assoc($query)){
		$dbusername=$row['username'];
  		$dbpassword=$row['password'];
		}
	if($username == $dbusername && $password == $dbpassword)
	{
	$_SESSION['session_username']=$username;
	header("Location: index.php");              //Перенаправление браузера
	}
	} else {
	//$message = "Invalid username or password!";
	echo '<div class="alert alert-danger" role="alert"><center>
	    Не правильное имя пользователя или пароль!</center>
        </div>';
	}
} else {
	//$message = "All fields are required!";
	echo '<div class="alert alert-warning" role="alert"><center>
	    Заполните все поля!</center>
        </div>';
	}
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Добро пожаловать!</h1>
                                    </div>
                                    <form class="user" action="" id="username" method="post" name="username">
                                        <div class="form-group">
                                            <input type="username" class="form-control form-control-user"
											   id="username" name="username" placeholder="Имя пользователя..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Пароль" required>
                                        </div><hr>

                                        <p><input class="btn btn-primary btn-user btn-block" name="login" type= "submit" value="Log In"></p>
									</form>
                                    <div hidden class="text-center" >
                                        <a class="small" href="forgot-password.html" >Forgot Password?</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>
