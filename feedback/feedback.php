<?php 
require "../php/settings.php";
session_start();
if(isset($_SESSION["login"]))    {
    $booking = "../booking/bookingManage.php";
    $account = "Выход из аккаунта";
    $acc_status ="../php/exit.php";
 } else{
    $booking ="../registration/reg.php";
    $account = "Личный кабинет";
    $acc_status = "../registration/reg.php";
 }

 //Класс реализующий запись форму обратной связи в таблицу feedbackform
 class feedbackCall extends dbConnect
{
    public $name;
    public $tel;

    function __construct()
    {   parent::__construct();
        $this->name = $_GET["feedbackName"];
        $this->tel = $_GET["feedbackTel"];
    }

    //Очищает все поля от лишнего
    public function trimming(){
        $this->name = filter_var(trim($this->name), FILTER_SANITIZE_STRING);
        $this->tel = filter_var(trim($this->tel), FILTER_SANITIZE_STRING);
    }

    //Записывает в бд данные обратной связи
    public function feedbackSave(){
        $this->mysqli->query("INSERT INTO `feedbackform` (`name`, `number`) VALUES('$this->name','$this->tel')");               
        echo "<script>alert('Форма успешно отправлена, вам перезвонят в течение 15 минут')</script>";
        
    }

}
    //Если есть get запрос о том что отправили форму обратной связи то создан новый обьект класса
    if(isset($_GET["feedback__submit"]))
    {
        $feedback = new feedbackCall; 
        $feedback->trimming();
        $feedback->feedbackSave();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/feedbackStyles.css" type="text/css">
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

    <section class="feedbackPage">
        <div class="container container__feedbackPage">
            <h1 class="feedbackPage__caption">Заполните форму и мы вам перезвоним</h1>
            <form class="feedbackPage__form" method="get">
                <input class="feedbackPage__input-name feedbackPage__inputs" required name="feedbackName" type="text" minlength="2" maxlength="50" name="feedback-name" placeholder="Ваше имя">
                <input class="feedbackPage__input-tel feedbackPage__inputs" required name="feedbackTel" type="tel" minlength="10" maxlength="12" name="feedback-tel" placeholder="Номер телефона">
                <button class="feedbackPage__submit" name="feedback__submit" type="submit" >Оставить заявку</button>
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
                        <a class="footer__link" href="feedback.php">
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