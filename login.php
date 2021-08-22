<?php session_start(); ?>
<html>

<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
	<title>Login Form</title>


	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel ="stylesheet" type="text/css"  href="css/style.css">
</head>

<body>

	<?php
	require 'api/db_connect.php';

	if (isset($_POST['login']) and isset($_POST['password'])){

		$login = $_POST['login'];
		$password = $_POST['password'];

		$query = "select * from users where login='$login' and password='$password' limit 1";
		$result = mysqli_query($bd,$query) or die(mysqli_error($bd));
		$count =  mysqli_num_rows($result);

		if ($count == 1){
			$_SESSION['login']= $login;
		}
		else{
			$fmsg = "Ошибка";
		}
	}

	if (isset($_SESSION['login'])){
		$login = $_SESSION['login'];
		echo '<script type="text/javascript"> window.location = "adminpanelchange.php" </script>';
	}

	?>

	<div class="login-box">
		<form id="auth" method="POST">
			<h1>Авторизация</h1>
			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="Имя пользователя" name="login" value="">
			</div>

			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"> </i>
				<input type="password" placeholder="Пароль" name="password" value="">
			</div>

			<input class="btn" type="submit" name="" value="Войти">
		</form>
	</div>

</body>

<script src="js/bootstrap.bundle.min.js"></script>
<!-- bootstrap js -->

</html>