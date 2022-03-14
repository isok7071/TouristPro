<?php
session_start();
if (isset($_SESSION["admin"])) {
    header("Location: ../adminMain.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/adminStyles.css" type="text/css">
    <title>Tourist Pro</title>
</head>

<body>
    <section class="admin-auth">
        <div class="container container__admin-auth">
            <div class="admin-auth__form-wrapper">
                <img class="admin-auth__logo" src="logo/logo.svg" alt="logo">
                <h1 class="admin-auth__caption">Вход в панель администратора</h1>
                <form class="admin-auth__form" method="post" action="php/adminAuth.php">
                    <input class="admin-auth-login admin-auth__inputs" minlength="4" maxlength="20" type="text" name="admin-auth-login"
                        placeholder="Логин">
                    <input class="admin-auth-password admin-auth__inputs" minlength="4" maxlength="20" type="password" name="admin-auth-password"
                        placeholder="Пароль">
                    <button class="admin-auth__submit" name="auth-submit" type="submit">Войти</button>
                </form>
            </div>
        </div>
    </section>

</body>

</html>