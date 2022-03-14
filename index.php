<?php
require "php/settings.php";
session_start();

//Проверяем вошел ли пользователь в аккаунт
if(isset($_SESSION["login"]))    {
    $booking = "booking/bookingManage.php";
    $account = "Выход из аккаунта";
    $acc_status = "php/exit.php";
 } else{
    $booking ="registration/reg.php";
    $account = "Личный кабинет";
    $acc_status = "registration/reg.php";
 }
    //Класс подписки на закрытые акции
    class subscription extends dbConnect{
    public $usermail;

    public function __construct(){
        parent::__construct();
        $this->usermail =$_POST["email"];
    }
    //Удаление лишних символов
    public function trimming(){
        $this->usermail = filter_var(trim($this->usermail), FILTER_SANITIZE_STRING);
        
    }
    //Проверяет есть ли такой email, если нет то записывает его и выдает алерт
    public function subCheck(){
        $res = $this->mysqli->query("SELECT * FROM `subs` WHERE email='$this->usermail'");
        $matchedUser = $res->fetch_assoc();
        //Если найден юзер по такой почте то он не записывается
        if (!empty($matchedUser)) {
            echo "<script>alert('Данный E-mail уже существует')</script>";    
        } else {
            $this->mysqli->query("INSERT INTO `subs` (`email`) VALUES('$this->usermail')");        
            echo "<script>alert('Вы подписались на рассылку!')</script>";
        }
    }
    }
    //Если есть пост запрос от кнопки подписки на закрытые акции создается новый объект класса
    if(isset($_POST["substocks-submit"]))
    {
        $sub = new subscription; 
        $sub->trimming();
        $sub->subCheck();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Tourist Pro</title>
</head>

<body>
    <header class="header" id="header">
        <div class="container container__nav">
            <div class="header__logo">
                <a class="heder__logo-link" href="index.php">
                    <img class="header__logo-img" src="Logo/logo.svg" alt="logo">
                </a>
            </div>

            <nav class="header__nav">
                <ul class="header__nav-list">
                    <li class="header__nav-list-li">
                        <a class="header__nav-list-link" href="#AboutUs">О нас</a>
                    </li>
                    <li class="header__nav-list-li">
                        <a class="header__nav-list-link" href="#Search">Поиск</a>
                    </li>
                    <li class="header__nav-list-li">
                        <a class="header__nav-list-link" href="<?php echo $booking;?>"> Бронирование</a>
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

    <div class="bg">
        <section class="about-us" id="AboutUs">
            <div class="container container__about-us">
                <h1 class="about-us__h1caption">
                    TouristPro
                </h1>
                <h2 class="about-us__h2caption">Исполнить мечты просто!</h2>
                <p class="about-us__main-goal">Главная цель нашей компании –<br />сделать любой поход<br />
                    удобным,комфортным и безопасным</p>
            </div>
        </section>
    </div>

    <section id="slider_bl_css">
        <h1 class="title">Как забронировать поход?</h1>
        <div class="container">

            <ul class="slides">
                <input type="radio" name="radio-btn" id="img-1" checked />
                <li class="slide-container">
                    <div class="slide">
                        <img src="img/slider/icons/1.svg" alt="advantages" />
                        <p>Выберите дату<br />похода</p>
                    </div>
                    <div class="nav">
                        <label for="img-6" class="prev"><img src="img/slider/LeftArrow.png" alt="Prev"></label>
                        <label for="img-2" class="next"><img src="img/slider/RightArrow.png" alt="Next"></label>
                    </div>
                </li>

                <input type="radio" name="radio-btn" id="img-2">
                <li class="slide-container">
                    <div class="slide">
                        <img src="img/slider/icons/2.svg" alt="advantages" />
                        <p>Укажите количество<br />участников и их уровень подготовки</p>
                    </div>
                    <div class="nav">
                        <label for="img-1" class="prev"><img src="img/slider/LeftArrow.png" alt="Prev"></label>
                        <label for="img-3" class="next"><img src="img/slider/RightArrow.png" alt="Next"></label>
                    </div>
                </li>

                <input type="radio" name="radio-btn" id="img-3" />
                <li class="slide-container">
                    <div class="slide">
                        <img src="img/slider/icons/3.svg" alt="advantages" />
                        <p>Выберите желаемый<br />регион для похода</p>
                    </div>
                    <div class="nav">
                        <label for="img-2" class="prev"><img src="img/slider/LeftArrow.png" alt="Prev"></label>
                        <label for="img-4" class="next"><img src="img/slider/RightArrow.png" alt="Next"></label>
                    </div>
                </li>

                <input type="radio" name="radio-btn" id="img-4" />
                <li class="slide-container">
                    <div class="slide">
                        <img src="img/slider/icons/4.svg" alt="advantages" />
                        <p>Выберите зоны<br />обязательные для посещения</p>
                    </div>
                    <div class="nav">
                        <label for="img-3" class="prev"><img src="img/slider/LeftArrow.png" alt="Prev"></label>
                        <label for="img-5" class="next"><img src="img/slider/RightArrow.png" alt="Next"></label>
                    </div>
                </li>

                <input type="radio" name="radio-btn" id="img-5" />
                <li class="slide-container">
                    <div class="slide">
                        <img src="img/slider/icons/5.svg" alt="advantages" />
                        <p>Выберите перечень<br />дополнительных услуг</p>
                    </div>
                    <div class="nav">
                        <label for="img-4" class="prev"><img src="img/slider/LeftArrow.png" alt="Prev"></label>
                        <label for="img-6" class="next"><img src="img/slider/RightArrow.png" alt="Next"></label>
                    </div>
                </li>


                <input type="radio" name="radio-btn" id="img-6" />
                <li class="slide-container">
                    <div class="slide">
                        <img src="img/slider/icons/6.svg" alt="advantages" />
                        <p>Оформите<br />заказ</p>
                    </div>
                    <div class="nav">
                        <label for="img-5" class="prev"><img src="img/slider/LeftArrow.png" alt="Prev"></label>
                        <label for="img-7" class="next"><img src="img/slider/RightArrow.png" alt="Next"></label>
                    </div>
                </li>
                <li class="nav-dots">
                    <label for="img-1" class="nav-dot" id="img-dot-1"></label>
                    <label for="img-2" class="nav-dot" id="img-dot-2"></label>
                    <label for="img-3" class="nav-dot" id="img-dot-3"></label>
                    <label for="img-4" class="nav-dot" id="img-dot-4"></label>
                    <label for="img-5" class="nav-dot" id="img-dot-5"></label>
                    <label for="img-6" class="nav-dot" id="img-dot-6"></label>
                </li>
            </ul>
        </div>
    </section>

    <section id="feedback" class="feedback feedback-container">
        <div class="container container__feedback">
            <h1 class="feedback__caption">Отзывы</h1>
            <div class="feedback__card">
                <img class="feedback__card-img" src="img/feedback/1.png" alt="feedback_card">
                <p class="feedback__card-text">Что же можно сказать об этом туре?!<br />
                    Да хотя бы то, что это лучший тур, который можно<br />
                    представить в Крыму! Здесь сочетается супер комфортное<br />
                    проживание и нешуточные физические нагрузки, <br />
                    а ещё мягкий Крымский климат и живописные пейзажи<br />
                    круглый год. (Алустон тур)</p>
            </div>

            <div class="feedback__card">
                <img class="feedback__card-img" src="img/feedback/2.png" alt="feedback_card">
                <p class="feedback__card-text">Красивый, сбалансированный маршрут. Грамотный, терпеливый<br /> и очень
                    сильный инструктор. Хорошая,
                    ровная команда. <br />
                    Что ещё нужно для того чтобы поход удался?<br />
                    Немного везения погодой. У нас было всё - и трудности, и <br />
                    радости, и невероятная красота зимних гор! <br />
                    (Лыжный спортивный поход по Хибинам)</p>
            </div>

            <div class="feedback__card">
                <img class="feedback__card-img" src="img/feedback/3.png" alt="feedback_card">
                <p class="feedback__card-text">Такой отдых решили попробовать впервые. Поход удался на все 100%. <br />
                    Все ожидания оправдались. Тур очень насыщенный и<br />
                    исторически познавательный. Если вы надеетесь отдохнуть и расслабиться,<br />
                    то это точно не тут! (Загадки Восточной Пруссии)<br />
                </p>
            </div>

            <div class="feedback__card">
                <img class="feedback__card-img" src="img/feedback/4.png" alt="feedback_card">
                <p class="feedback__card-text">Путешествием остались очень довольны. До сих пор<br />
                    наслаждаемся послевкусием. Всего было в достатке : ярких эмоций, <br />
                    приятных неожиданностей и удивительных впечатлений! <br />
                    Организаторам спасибо за насыщенную и продуманную программу.<br />
                    Инструкторам 5+ за невероятный труд!(Термальные источники Абхазии)</p>
            </div>
            <div class="feedback__leave-feedback">
                <h2 class="feedback__leave-feedback-caption">
                    Оставить отзыв
                </h2>
                <form class="feedback__leave-feedback-form" method="get" action="" enctype="multipart/form-data">
                    <label class="feedback__lf-file-label" for="file">Загрузите ваше фото</label>
                    <input class="feedback__lf-file" type="file" name="file" id="file">
                    <label class="feedback__lf-text-caption" for="feedback">Текст отзыва</label>
                    <textarea class="feedback__lf-text" maxlength="295" name="feedback" id="feedback"></textarea>
                    <button class="feedback__lf-submit" type="submit" name="feedbackButton"
                        id="feedbackButton">Отправить</button>
                </form>
            </div>
        </div>
    </section>

    <section class="stocks stocks__wrapper" id="Stocks">
        <div class="container container__stocks">
            <h1 class="stocks__caption">Акции</h1>
            <div class="stocks__card">
                <div class="stocks__card-inner">
                    <img class="stocks__card-img" src="img/stocks/1.png" alt="stocks-card">
                    <div class="stocks__card-text-container">
                        <h1 class="stocks__card-caption">Услуги проводника за полцены!</h1>
                        <p class="stocks__card-description"> При условии бронирования похода за 3 месяца до даты начала,
                            вы
                            получаете услуги проводника за
                            полцены.
                        </p>
                        <button class="stocks__button-more" id="stocksButton1">
                            Подробнее
                        </button>
                    </div>
                </div>
                <div class="stocks__card-more stocks__card-more_hidden" id="stock1">
                    <p class="stocks__card-more-text">Для того чтобы примернить аккцию, сообщите нашему менеджеру
                        о ней в момент бронирования вашего
                        заказа. Акция не суммируется с другими акциями представленными на сайте, или с другими закрытыми
                        акциями.</p>
                </div>
            </div>

            <div class="stocks__card">
                <div class="stocks__card-inner">
                    <img class="stocks__card-img" src="img/stocks/2.png" alt="stocks-card">
                    <div class="stocks__card-text-container">
                        <h1 class="stocks__card-caption">Трансфер до места начала похода - в подарок!</h1>
                        <p class="stocks__card-description">При условии бронирования похода на 3 человек одновременно,
                            вы
                            получаете трансфер в подарок.
                        </p>
                        <button class="stocks__button-more" id="stocksButton2">
                            Подробнее
                        </button>
                    </div>
                </div>
                <div class="stocks__card-more stocks__card-more_hidden" id="stock2">
                    <p class="stocks__card-more-text">Для того чтобы примернить аккцию, сообщите нашему менеджеру
                        о ней в момент бронирования вашего
                        заказа. Акция не суммируется с другими акциями представленными на сайте, или с другими закрытыми
                        акциями.</p>
                </div>
            </div>

            <div class="stocks__card">
                <div class="stocks__card-inner">
                    <img class="stocks__card-img" src="img/stocks/3.png" alt="stocks-card">
                    <div class="stocks__card-text-container">
                        <h1 class="stocks__card-caption">Скидка 20% на следующее бронирование</h1>
                        <p class="stocks__card-description">Мы рады предложить вам скидку на следующее бронирование,
                            потому
                            что дорожим нашими клиентами.
                        </p>
                        <button class="stocks__button-more" id="stocksButton3">
                            Подробнее
                        </button>
                    </div>
                </div>
                <div class="stocks__card-more stocks__card-more_hidden" id="stock3">
                    <p class="stocks__card-more-text">Для того чтобы примернить аккцию, сообщите нашему менеджеру
                        о ней в момент бронирования вашего
                        заказа. Акция не суммируется с другими акциями представленными на сайте, или с другими закрытыми
                        акциями.</p>
                </div>
            </div>

            <div class="stocks__card">
                <div class="stocks__card-inner">
                    <img class="stocks__card-img" src="img/stocks/4.png" alt="stocks-card">
                    <div class="stocks__card-text-container">
                        <h1 class="stocks__card-caption">Скидка 10% на аренду туристического оборудования</h1>
                        <p class="stocks__card-description">Скидка на аренду туристического оборудования предоставляется
                            всем нашим постоянным клиентам,
                            совершившим с нами хотя бы один поход.
                        </p>
                        <button class="stocks__button-more" id="stocksButton4">
                            Подробнее
                        </button>
                    </div>
                </div>
                <div class="stocks__card-more stocks__card-more_hidden" id="stock4">
                    <p class="stocks__card-more-text">Для того чтобы примернить аккцию, сообщите нашему менеджеру
                        о ней в момент бронирования вашего
                        заказа. Акция не суммируется с другими акциями представленными на сайте, или с другими закрытыми
                        акциями.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="substocks substocks__wrapper" id="SubStocks">
        <div class="container container-substocks">
            <h1 class="substocks__caption">Подписка на закрытые акции</h1>
            <form class="substocks__form" method="post" action="index.php">
                <input class="substocks__form-input" minlength="2" maxlength="60" required type="email" name="email" placeholder="E-mail">
                <button class="substocks__submit" name="substocks-submit">Подписаться!</button>
            </form>
        </div>
    </section>

    <section class="search search__wrapper" id="Search">
        <div class="container">
            <h1 class="search__caption">Поиск маршрутов</h1>
            <form class="search__form" method="get" action="search/search.php">
                <select class="search__form-selects" size="1" name="region">
                    <option value="" selected>Выберите регион</option>
                    <option value="Абхазский">Абхазский</option>
                    <option value="Калининградский">Калининградский</option>
                    <option value="Мурманский">Мурманский</option>
                    <option value="Алтайский">Алтайский</option>
                    <option value="Крым">Крым</option>
                </select>
                <select class="search__form-selects" size="1" name="date">
                    <option value="" selected>
                        Выберите предполагаемую дату похода
                    </option>
                    <option value="2022-06-20">20.06.2022</option>
                    <option value="2022-06-24">24.06.2022</option>
                    <option value="2022-07-10">10.07.2022</option>
                    <option value="2022-12-30">30.12.2022</option>
                </select>
                <select class="search__form-selects" size="1" name="peopleNum">
                    <option value="" selected>
                        Выберите количество участников
                    </option>
                    <option value="5 и меньше">5 и меньше</option>
                    <option value="10 и меньше">10 и меньше</option>
                    <option value="20 и меньше">20 и меньше</option>
                    <option value="30 и меньше">30 и меньше</option>
                </select>
                <select class="search__form-selects" size="1" name="level">
                    <option value="" selected>
                        Выберите уровень подготовки участников
                    </option>
                    <option value="Сложность 1">Без подготовки</option>
                    <option value="Сложность 2">Малый</option>
                    <option value="Сложность 3">Средний</option>
                    <option value="Сложность 4">Близкий к высокому</option>
                    <option value="Сложность 5">Высокий</option>
                </select>
                <button class="search__form-submit" type="submit" name="search">Найти!</button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="container container__footer">
            <div class="footer__left-text">
                <ul class="footer__nav">
                    <li class="footer__li-list">
                        <a class="footer__link" href="index.php">
                            Главная
                        </a>
                    </li>

                    <li class="footer__li-list">
                        <a class="footer__link" href="<?php echo $booking;?>">
                            Бронирование
                        </a>
                    </li>

                    <li class="footer__li-list">
                        <a class="footer__link" href="#search">
                            Поиск маршрутов
                        </a>
                    </li>

                    <li class="footer__li-list">
                        <a class="footer__link" href="feedback/feedback.php">
                            Обратная связь
                        </a>
                    </li>

                    <li class="footer__li-list">
                        <a class="footer__link" href="#feedback">
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
            <img class="up-button__img" src="img/arrrow.svg" alt="up-button">
        </a>
    </div>
    <script src="js/script.js"></script>
    <script src="js/stocksScript.js"></script>
</body>

</html>