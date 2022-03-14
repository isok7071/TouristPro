<?php 
session_start();
//Выход из аккаунтов
unset($_SESSION["login"]);
unset($_SESSION["admin"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Tourist Pro</title>
</head>

<body>
    <h1 class="captions-php">Вы вышли из аккаунта</h1>
    <a class="links-php" href="../index.php">Вернуться на главную страницу</a>
</body>
</html>