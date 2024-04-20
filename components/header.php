<?php
	include "controllers/connect.php";
	print_r($conn);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ГЛАВНАЯ</title>
	<link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>
	<div class="wrapper">
		<header>
			<a href="/">
				<div class="logo"></div>
			</a>
			<div class="name_site">МАГАЗИН ФРУКТОВ</div>
			<div class="auth">
				<h2>Авторизация</h2>
				<form method="POST" action="profile.php">
					<input type="text" name="login_auth" placeholder="Логин"><br>
					<input type="password" name="pass_auth" placeholder="Пароль"><br>
					<input type="submit" name="auth" value="Войти"><br>
					Нет аккаунта? <a href="registration.php">Создайте!</a>
				</form>
			</div>
			
		</header>