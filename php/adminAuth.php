<?php
require "settings.php";
session_start();
//Если администратор авторизован то его перекидывает на главную страницу админпанели
if (isset($_SESSION["admin"])) {
    header("Location: ../adminMain.php");
}

//Класс реализующий авторизацию администратора
class adminAuth extends dbConnect
{
    public $login; 
    public $password;
    //В бд 1 это айди прав админа
    public $rights = 1;
    function __construct()
    {   parent::__construct();
        $this->login = $_POST["admin-auth-login"];
        $this->password = $_POST["admin-auth-password"];
        
    }

    //Очищает все поля от лишнего
    public function trimming(){
        $this->login = filter_var(trim($this->login), FILTER_SANITIZE_STRING);
        $this->password = filter_var(trim($this->password), FILTER_SANITIZE_STRING);
    }

     //Проверяет есть ли уже человек с таким логином 
     public function userMatch(){
        $result=$this->mysqli->query("SELECT * FROM `users` WHERE `login` LIKE '" . $this->login . "' AND `rights` LIKE  '" . $this->rights . "'");
        $matchedUser = $result->fetch_assoc();
        if (empty($matchedUser)) {
            echo "<h1 class='captions-php'>Администраторов по данному логину не существует</h1><br>";
            echo "<a class='links-php' href='../admin.php'>Попробовать еще раз</a>";
            exit();
        }
    }

    //Сравнивает хэш с паролем 
    public function passverify()
    {   $result = $this->mysqli->query("SELECT `password` FROM `users` WHERE `login` LIKE '" . $this->login . "' AND `rights` LIKE  '" . $this->rights . "'");
        $passwordHash = $result->fetch_assoc();
        if(password_verify($this->password, $passwordHash["password"])===false){
            echo "<h1 class='captions-php'>Вы ввели неправильный пароль</h1><br>";
            echo "<a class='links-php' href='../admin.php'>Попробовать еще</a>";
            exit();
        };   
    }
   
    //Запускает сессию для администратора
    public function adminSessionGo()
    {   parent::closeDb();
        session_start();
        $_SESSION["admin"] = $this->login;
        echo "<h1 class='captions-php'>Вы успешно вошли в аккаунт!</h1>";
        echo "<a href='../adminMain.php' class='links-php'>Переместиться на главную страницу панели администратора</a>";
    }
}

$adminAuth = new adminAuth();
$adminAuth->trimming();
$adminAuth->userMatch();
$adminAuth->passverify();
$adminAuth->adminSessionGo();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/adminStyles.css" type="text/css">
    <title>Tourist Pro</title>
</head>

<body>

</body>

</html>