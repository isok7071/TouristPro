<?php

session_start();

if (isset($_SESSION["login"])) {
    $booking = "bookingManage.php";
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
    <link rel="stylesheet" href="../css/bookingStyles.css" type="text/css">
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



    <section class="booking booking__container" id="Booking">
        <div class="container">
            <h1 class="booking__main-caption">Управление бронированием</h1>
            <div class="booking__wrapper">
                <h2 class="booking__captions">Регион:</h2>
                <p class="booking__infos">Абхазия</p>

                <h2 class="booking__captions">Маршрут:</h2>
                <p class="booking__infos">Термальные источники Абхазии</p>


                <h2 class="booking__captions">Выбранные зоны:</h2>
                <div class="booking__zones-container booking__section">
                    <p class="booking__infos booking__zone">3. г. Рагнит</p>
                    <p class="booking__infos booking__zone">2. г. Тильзит</p>
                </div>

                <h2 class="booking__captions">Предполагаемые даты похода:</h2>
                <div class="booking__dates-container">
                    <p class="booking__infos booking__date">20.08.2021</p>
                    <p class="booking__infos booking__date">25.08.2021</p>
                </div>

                <h2 class="booking__captions">Количество человек:</h2>
                <p class="booking__infos">30 и меньше</p>


                <h2 class="booking__captions">Стоимость:
                    <span class="booking__tour-price">30 000 р.</span>
                </h2>
            </div>

            <h1 class="booking__other-caption">Дополнительные услуги</h1>
            <div class="booking__adds-wrapper">
                <div class="booking__adds-card">
                    <input class="booking__adds-check" type="checkbox" name="Provodnik">
                    <div class="booking__adds-text">
                        <h3 class="booking__adds-name">Услуги проводника</h3>
                        <p class="booking__adds-price">3 000 р.</p>
                    </div>
                </div>

                <div class="booking__adds-card">
                    <input class="booking__adds-check" type="checkbox" name="Provodnik">
                    <div class="booking__adds-text">
                        <h3 class="booking__adds-name">Услуги аренды оборудования</h3>
                        <p class="booking__adds-price">2 000 р.</p>
                    </div>
                </div>

                <div class="booking__adds-card">
                    <input class="booking__adds-check" type="checkbox" name="Provodnik">
                    <div class="booking__adds-text">
                        <h3 class="booking__adds-name">Услуги проводника</h3>
                        <p class="booking__adds-price">3 000 р.</p>
                    </div>
                </div>

                <div class="booking__adds-card">
                    <input class="booking__adds-check" type="checkbox" name="Provodnik">
                    <div class="booking__adds-text">
                        <h3 class="booking__adds-name">Услуги фотографа/видео оператора</h3>
                        <p class="booking__adds-price">4 000 р.</p>
                    </div>
                </div>
                <div class="booking__adds-card">
                    <input class="booking__adds-check" type="checkbox" name="Provodnik" checked>
                    <div class="booking__adds-text">
                        <h3 class="booking__adds-name">Страхование от несчастных случаев</h3>
                        <p class="booking__adds-price">5 000 р.</p>
                    </div>
                </div>
            </div>
            <h1 class="booking__other-caption">Комментарий к заказу</h1>
            <textarea class="booking__comment" maxlength="250" name="comm"></textarea>

            <h1 class="booking__other-caption">Введите E-mail для связи с вами</h1>
            <input class="booking__email" type="email" name="booking-email" placeholder="E-mail">
        </div>


        <h1 class="booking__final-caption">Итоговая стоимость: 
            <span class="booking__final-price">35 000 р.</span>
        </h1>
        <form class="booking__save-form" action="index.html">
            <button  class="booking__save" type="submit" name="save">
                Сохранить изменения
            </button>
        </form>
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