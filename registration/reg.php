<?php
require "../php/settings.php";
session_start();
if (isset($_SESSION["login"])) {
    $booking = "../booking/bookingManage.php";
    $account = "Выход из аккаунта";
    $acc_status = "../php/exit.php";
} else {
    $booking = "reg.php";
    $account = "Личный кабинет";
    $acc_status = "reg.php";
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
    <header class="header">
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
                        <a class="header__nav-list-link" href="<?php echo $booking  ?>">Бронирование</a>
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

    <section class="registration">
        <div class="container container__registration">
            <h1 class="registration__caption">Регистрация</h1>
            <form class="registration__form" action="../php/reg.php" method="post">
                <input class="registration__input-email registration__inputs" minlength="4" maxlength="40" type="email" name="reg-email" placeholder="E-mail">
                <input class="registration__input-name registration__inputs" minlength="2" maxlength="30" type="text" name="reg-name" placeholder="Имя">
                <input class="registration__input-surname registration__inputs" minlength="2" maxlength="30" type="text" name="reg-surname" placeholder="Фамилия">
                <input class="registration__input-login registration__inputs" required minlength="4" maxlength="20" type="text" name="reg-login" placeholder="Логин">
                <input class="registration__input-password registration__inputs" required minlength="4" maxlength="20" type="password" name="reg-password" placeholder="Пароль">
                <button class="registration__submit" name="reg-submit" type="submit">Зарегестрироваться</button>
            </form>

            <form class="registration__toAuth-form" action="../auth/auth.php" method="get">
                <h1 class="registration__toAuth-caption">Уже есть аккаунт?</h1>
                <button class="registration__toAuth" name="toAuth" type="submit">Войти</button>
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
                        <a class="footer__link" href="<?php echo $booking; ?>">
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