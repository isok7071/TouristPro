<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>TouristPro</title>
    <script src="../js/script.js"></script>
</head>
<body>
    
</body>
</html>
<?php
require "settings.php";

//Класс реализующий регистрацию пользователей
class reg extends dbConnect
{
    public $userEmail;
    public $userName;
    public $userSurname;
    public $userLogin; 
    public $userPassword; 

    function __construct()
    {   parent::__construct();
        $this->userEmail = $_POST["reg-email"];
        $this->userName = $_POST["reg-name"];
        $this->userSurname = $_POST["reg-surname"];
        $this->userLogin = $_POST["reg-login"];
        $this->userPassword = $_POST["reg-password"];
        
    }

    //Очищает все поля от лишнего
    public function trimming(){
        $this->userEmail = filter_var(trim($this->userEmail), FILTER_SANITIZE_STRING);
        $this->userName = filter_var(trim($this->userName), FILTER_SANITIZE_STRING);
        $this->userSurname = filter_var(trim($this->userSurname), FILTER_SANITIZE_STRING);
        $this->userLogin = filter_var(trim($this->userLogin), FILTER_SANITIZE_STRING);
        $this->userPassword = filter_var(trim($this->userPassword), FILTER_SANITIZE_STRING);
    }

    //Создает хэш из пароля
    public function passhash()
    {
        $this->userPassword = password_hash($this->userPassword, PASSWORD_DEFAULT);
    }

    //Проверка длины полей 
    public function lengthCheck(){
        if(mb_strlen($this->userEmail)<4 || mb_strlen($this->userEmail)>40){
            echo "<h1 class='captions-php'>Недопустимая длина электронной почты</h1>";
            echo "<a class='links-php' onclick='stepBack()'>Вернуться назад</a>";
            exit();
        }
        if(mb_strlen($this->userName)<2 || mb_strlen($this->userName)>30){
            echo "<h1 class='captions-php'>Недопустимая длина имени</h1>";
            echo "<a class='links-php' onclick='stepBack()'>Вернуться назад</a>";
            exit();
        }
        if(mb_strlen($this->userSurname)<2 || mb_strlen($this->userSurname)>30){
            echo "<h1 class='captions-php'>Недопустимая длина фамилии</h1>";
            echo "<a class='links-php' onclick='stepBack()'>Вернуться назад</a>";
            exit();
        }
        if(mb_strlen($this->userLogin)<4 || mb_strlen($this->userLogin)>20){
            echo "<h1 class='captions-php'>Недопустимая длина логина</h1>";
            echo "<a class='links-php' onclick='stepBack()'>Вернуться назад</a>";
            exit();
        }
        if(mb_strlen($this->userPassword)<4 || mb_strlen($this->userPassword)>20){
            echo "<h1 class='captions-php'>Недопустимая длина пароля</h1>";
            echo "<a class='links-php' onclick='stepBack()'>Вернуться назад</a>";
            exit();
        }
    }
    
    //Проверяет есть ли уже человек с таким логином 
    public function userMatch(){
        $result=$this->mysqli->query("SELECT * FROM `users` WHERE login = '$this->userLogin'");
        $matchedUser = $result->fetch_assoc();
        if (!empty($matchedUser)) {
            echo "<h1 class='captions-php'>Данный логин уже используется!</h1><br>";
            echo "<a class='links-php' href='../auth/auth.php'>Войти в аккаунт</a>";
            exit();
        }
    }
    //Записывает данные о пользователе в таблиц users
    public function registration()
    {  
        $this->mysqli->query("INSERT INTO `users` (`email`, `name`, `surname`, `login`, `password`) VALUES('$this->userEmail','$this->userName','$this->userSurname','$this->userLogin','$this->userPassword')");        
        echo "<div>
                <h1 class='captions-php'>Вы успешно зарегестрировались!</h1>
                <a class='links-php' href='../auth/auth.php'>Авторизоваться</a>
              </div>";
        parent::closeDb();
    }

}

$userreg = new reg();
$userreg->trimming();
$userreg->lengthCheck();
$userreg->userMatch();
$userreg->passhash();
$userreg->registration();

