<?php
require "../php/settings.php";
session_start();

if (isset($_SESSION["login"])) {
    $booking = "../booking/bookingManage.php";
    $account = "Выход из аккаунта";
    $acc_status = "../php/exit.php";
} else {
    $booking = "../registration/reg.php";
    $account = "Личный кабинет";
    $acc_status = "../registration/reg.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/authAndRegStyles.css" type="text/css">
    <title>Tourist Pro</title>
</head>

<body>
<header class="header" id="header">
        <div class="container container__nav">
            <div class="header__logo">
                <a class="heder__logo-link" href="../index.php">
                    <img class="header__logo-img" src="../Logo/logo.svg" alt="logo">
                </a>
            </div>

            <nav class="header__nav">
                <ul class="header__nav-list">
                    <li class="header__nav-list-li">
                        <a class="header__nav-list-link" href="../index.php#AboutUs">О нас</a>
                    </li>
                    <li class="header__nav-list-li">
                        <a class="header__nav-list-link" href="../index.php#Search">Поиск</a>
                    </li>
                    <li class="header__nav-list-li">
                        <a class="header__nav-list-link" href="<?php echo $booking;?>">Бронирование</a>
                    </li>
                    <li class="header__nav-list-li">
                        <a class="header__nav-list-link" href="#contacts">Контакты</a>
                    </li>
                    <li class="header__nav-list-li">
                        <a class="header__nav-list-link" href="<?php echo $acc_status ?>"><?php echo $account  ?></a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

 
    <section class="auth">
        <div class="container container__auth">
            <h1 class="auth__caption">Авторизация</h1>
            <form class="auth__form" method="post" action="../php/auth.php">
                <input class="auth__input-login auth__inputs" type="text" minlength="4" maxlength="20" required name="auth-login" placeholder="Логин">
                <input class="auth__input-password auth__inputs" type="password" minlength="4" maxlength="20" required name="auth-password"
                    placeholder="Пароль">
                <button class="auth__submit" name="auth-submit" type="submit">Войти</button>
            </form>
        </div>
    </section>
  

    <footer class="footer">
        <div class="container container__footer">
            <div class="footer__left-text">
                <ul class="footer__nav">
                    <li class="footer__li-list">
                        <a class="footer__link" href="../index.php">
                            Главная
                        </a>
                    </li>

                    <li class="footer__li-list">
                        <a class="footer__link" href="<?php echo $booking;?>">
                            Бронирование
                        </a>
                    </li>

                    <li class="footer__li-list">
                        <a class="footer__link" href="../index.php#Search">
                            Поиск маршрутов
                        </a>
                    </li>

                    <li class="footer__li-list">
                        <a class="footer__link" href="../feedback/feedback.php">
                            Обратная связь
                        </a>
                    </li>

                    <li class="footer__li-list">
                        <a class="footer__link" href="../index.php#feedback">
                            Отзывы
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer__right-text" id="contacts">
                <a class="footer__link" href="tel:+78005553310">
                    8 (800)555-33-10
                </a>
            </div>
        </div>
    </footer>

    <div class="up-button">
        <a class="up-button__link">
            <img class="up-button__img" src="../img/arrrow.svg" alt="up-button">
        </a>
    </div>
    <script src="../js/script.js"></script>
</body>

</html>

