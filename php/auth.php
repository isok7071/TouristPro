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
//Класс реализующий авторизацию пользователей
class auth extends dbConnect
{
    public $table = "users";
    public $userLogin; 
    public $userPassword; 
    public $userid;

    function __construct()
    {   parent::__construct();
        $this->userLogin = $_POST["auth-login"];
        $this->userPassword = $_POST["auth-password"];
    }

    //Очищает все поля от лишнего
    public function trimming(){
        $this->userLogin = filter_var(trim($this->userLogin), FILTER_SANITIZE_STRING);
        $this->userPassword = filter_var(trim($this->userPassword), FILTER_SANITIZE_STRING);
    }

      //Проверка длины полей 
      public function lengthCheck(){
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
        if (empty($matchedUser)) {
            echo "<h1 class='captions-php'>Пользователь по данному логину не зарегестрирован</h1><br>";
            echo "<a class='links-php' href='../auth/auth.php'>Войти в аккаунт</a>";
            exit();
        }
    }

    //Сравнивает хэш с паролем 
    public function passverify()
    {   $result = $this->mysqli->query("SELECT `password` FROM `users` WHERE login='$this->userLogin'");
        $passwordHash = $result->fetch_assoc();
        if(password_verify($this->userPassword, $passwordHash["password"])===false){
            echo "<h1 class='captions-php'>Вы ввели неправильный пароль</h1><br>";
            echo "<a class='links-php' href='#' onclick='stepBack()'>Попробовать еще</a>";
            exit();
        };   
    }
   
    //Запускает сессию для пользователя
    public function sessionGo()
    {   parent::closeDb();
        session_start();
        $_SESSION["login"] = $this->userLogin;
        echo "<h1 class='captions-php'>Вы успешно вошли в аккаунт!</h1>";
        echo "<a href='../index.php' class='links-php'>Переместиться на главную страницу</a>";
    }
}

$userauth = new auth();
$userauth->trimming();
$userauth->lengthCheck();
$userauth->userMatch();
$userauth->passverify();
$userauth->sessionGo();

 