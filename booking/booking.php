<?php
require "../php/settings.php";
session_start();
if (isset($_SESSION["login"])) {
    $bookingm = "bookingManage.php";
    $account = "Выход из аккаунта";
    $acc_status = "../php/exit.php";
} else {
    header("Location: ../php/nonauth.php");
    $bookingm = "../registration/reg.php";
    $account = "Личный кабинет";
    $acc_status = "../registration/reg.php";
}
//Класс реализующий вывод выбранного ранее маршрута и его данных в страницу бронирования
class booking  extends dbConnect
{
    public $tourid;
    public $chosentour;
    public $region;
    public $zones;
    public $datapohoda;
    public $people;
    public $tourPrice;
    public $searchtour;
    public $searchid;
    public $searchzone;


    function __construct()
    {
        parent::__construct();
        if (!empty($_SESSION['chosen-tour'])) {
            $this->chosentour = $_SESSION['tour'];
            
        } else if($_GET['selected-tour'])
            {   
                $this->chosentour = $_GET['selected-tour'];
            }
        
           
       
    }

    //Очищает все поля от лишнего
    public function trimming()
    {
        $this->chosentour = filter_var(trim($this->chosentour), FILTER_SANITIZE_STRING);
    }

    //Поиск тура и зон в бд
    function nameSearch()
    {
        $this->searchtour = $this->mysqli->query("SELECT * FROM `tours` WHERE `name` LIKE '%" . $this->chosentour . "%'");
       
        $this->searchid = $this->mysqli->query("SELECT * FROM `tours` WHERE `name` LIKE '%" . $this->chosentour . "%'");
        while ($out = $this->searchid->fetch_assoc()) {
            $this->tourid = $out['id'];
        }
        
        $res = $this->mysqli->query("SELECT * FROM `zone` WHERE `id_t` LIKE '" . $this->tourid . "'");
        while ($resultZone = $res->fetch_assoc()) {
            $this->searchzone[] = $resultZone['name'];
        }
    }

    //Вывод цены
    public function price()
    {
        $res = $this->mysqli->query("SELECT * FROM `tours` WHERE `name` LIKE '%" . $this->chosentour . "%'");
        while ($resultprice = $res->fetch_assoc()) {
            $this->tourPrice = $resultprice['tourprice'];
        }
        echo $this->tourPrice;
    }

    //Вывод найденного тура
    function bookingOutput()
    {
        while ($output = $this->searchtour->fetch_assoc()) {
            echo '<section class="booking booking__container" id="Booking">
            <div class="container">
                <h1 class="booking__main-caption">Данные о заказе</h1>
                <div class="booking__wrapper">
                    <h2 class="booking__captions">Регион:</h2>
                    <p class="booking__infos">' . $output['region'] . '</p>
    
                    <h2 class="booking__captions">Маршрут:</h2>
                    <p class="booking__infos">' . $output['name'] . '</p>
    
    
                    <h2 class="booking__captions">Выбранные зоны:</h2>
                    <div class="booking__zones-container booking__section">
                        <p class="booking__infos booking__zone">' . implode(", ", $this->searchzone) . '</p>
                    </div>
    
                    <h2 class="booking__captions">Предполагаемые даты похода:</h2>
                    <div class="booking__dates-container">
                        <p class="booking__infos booking__date">' . $output['datapohoda'] . '</p>
                    </div>
    
                    <h2 class="booking__captions">Количество человек:</h2>
                    <p class="booking__infos">' . $output['people'] . '</p>
    
    
                    <h2 class="booking__captions">Стоимость:
                        <span class="booking__tour-price">' . $output['tourprice'] . '</span>
                    </h2>
                </div>';
        }
    }
}
$booking = new booking;
$booking->nameSearch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/bookingStyles.css" type="text/css">
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
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
                        <a class="header__nav-list-link" href="<?php $bookingnm ?>">Бронирование</a>
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
    <?php $booking->bookingOutput() ?>
    <h1 class="booking__other-caption">Дополнительные услуги</h1>
    <div class="booking__adds-wrapper">
        <div class="booking__adds-card">
            <input class="booking__adds-check" id="provodnik" type="checkbox" value="3000" name="adds-usluga">
            <div class="booking__adds-text">
                <h3 class="booking__adds-name">Услуги проводника</h3>
                <p class="booking__adds-price">3 000 р.</p>
            </div>
        </div>

        <div class="booking__adds-card">
            <input class="booking__adds-check" id="arenda" type="checkbox" value="2000" name="adds-usluga">
            <div class="booking__adds-text">
                <h3 class="booking__adds-name">Услуги аренды оборудования</h3>
                <p class="booking__adds-price">2 000 р.</p>
            </div>
        </div>

        <div class="booking__adds-card">
            <input class="booking__adds-check" id="photograph" type="checkbox" value="4000" name="adds-usluga">
            <div class="booking__adds-text">
                <h3 class="booking__adds-name">Услуги фотографа/видео оператора</h3>
                <p class="booking__adds-price">4 000 р.</p>
            </div>
        </div>
        <div class="booking__adds-card">
            <input class="booking__adds-check" id="strahovka" type="checkbox" value="5000" name="adds-usluga">
            <div class="booking__adds-text">
                <h3 class="booking__adds-name">Страхование от несчастных случаев</h3>
                <p class="booking__adds-price">5 000 р.</p>
            </div>
        </div>
    </div>
    <h1 class="booking__other-caption">Комментарий к заказу</h1>
    <textarea class="booking__comment" maxlength="250" name="comm"></textarea>

    <h1 class="booking__other-caption">Введите E-mail для связи с вами</h1>
    <form class="booking__email-form" method="post">
        <input class="booking__email" type="email" name="booking-email" placeholder="E-mail">
    </form>
    </div>


    <h1 class="booking__final-caption">Итоговая стоимость:
        <span class="booking__final-price" id="final">
            <script>
               //Рассчет итоговой стоимости тура
               var tourPrice = parseInt($(".booking__tour-price").text());
                $('input.booking__adds-check').on("click", function() {

                    var sum2 = 0;

                    if ($("#provodnik").is(':checked')) {
                        sum2 += parseInt($("#provodnik").val());
                    }
                    if ($("#arenda").is(':checked')) {
                        sum2 += parseInt($("#arenda").val());
                    }
                    if ($("#photograph").is(':checked')) {
                        sum2 += parseInt($("#photograph").val());
                    }
                    if ($("#strahovka").is(':checked')) {
                        sum2 += parseInt($("#strahovka").val());;
                    }
                    $('#final').html(sum2 + tourPrice);
                });

                $('input.booking__adds-check').eq(3).click();
            </script>
        </span>
    </h1>
    <form class="booking__submit-form" method="post" action="../index.php">
        <button class="booking__submit" type="submit" name="submit-all">
            Оформить
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
                        <a class="footer__link" href="<?php $bookingm ?>">
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