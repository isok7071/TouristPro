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

//Класс выводящий зоны по конкретному маршруту
class seatsChoose extends dbConnect
{
    public $chosentour;
    public $tourid;
    public $zonequery;

    function __construct()
    {
        parent::__construct();
        $this->chosentour = $_GET['change'];
        $_SESSION["chosen-tour"] = $this->chosentour;
    }
    //Очищает все поля от лишнего
    public function trimming()
    {
        $this->chosentour = filter_var(trim($this->chosentour), FILTER_SANITIZE_STRING);
    }

    //Поиск тура и зон в бд
    function zoneSearch()
    {
        $res = $this->mysqli->query("SELECT * FROM `tours` WHERE `name` LIKE '%" . $this->chosentour . "%'");
        while ($out = $res->fetch_assoc()) {
            $this->tourid = $out['id'];
        }
        //Запрос зон по айди тура 
        $this->zonequery = $this->mysqli->query("SELECT * FROM `zone` WHERE `id_t` LIKE '%" . $this->tourid . "%'");
    }

    function zoneOutput()
    {
        while ($zoneOutput = $this->zonequery->fetch_assoc()) {
            echo '
            
            <div class="choose__card" name="' . $zoneOutput['id_z'] . '">
            <img class="choose__card-img" src="' . $zoneOutput['image'] . '" alt="card-image">
            <div class="choose__card-text">  
                <input class="choose__card-checkbox"  type="checkbox" value="' . $zoneOutput['name']  . '" name="chooseCheckbox">
                <p  class="choose__card-name">' . $zoneOutput['name']  . '</p>
            </div>
            </div>
            ';
        }
    }
}

$choose = new seatsChoose();
$choose->zoneSearch();
$_SESSION["tour"] = $_GET['change'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/seatStyles.css" type="text/css">
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
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
                        <a class="header__nav-list-link" href="../index.php#AboutUs#Search">Поиск</a>
                    </li>
                    <li class="header__nav-list-li">
                        <a class="header__nav-list-link" href="<?php echo $booking; ?>"> Бронирование</a>
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

    <div class="container step-back">
        <button class="step-back__button" onclick="stepBack()">Вернуться на шаг назад</button>
    </div>

    <section class="choose choose__container" id="Choose">
        <div class="container">
            <h1 class="choose__caption">Выберите желаемые зоны маршрута</h1>
            <h2 class="choose__subcaption">Схема маршрута</h2>
            <div class="choose__card-row">
                <?php $choose->zoneOutput() ?>
            </div>
            <script>

                //Получаем массив выбранных зон
                var checkboxes = document.querySelectorAll("input[type=checkbox][name=chooseCheckbox]");
                var enabledZons = [];

                checkboxes.forEach(function(checkbox) {
                    checkbox.addEventListener('change', function() {
                        enabledZons =
                            Array.from(checkboxes) // Convert checkboxes to an array to use filter and map.
                            .filter(i => i.checked) // Use Array.filter to remove unchecked checkboxes.
                            .map(i => i.value); // Use Array.map to extract only the checkbox values from the array of objects.
                    });
                })
            </script>
            <form class="choose-form" method="get" action="../booking/booking.php">
                <button type="submit" id="zones-sub" class="choose-form__submit" name="zones">Забронировать</button>
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