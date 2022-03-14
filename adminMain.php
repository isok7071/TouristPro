<?php
session_start();
require "php/settings.php";
//Если администратор НЕ авторизован то его перекидывает на страницу авторизации
if (!($_SESSION["admin"])) {
    header("Location: admin.php");
}

//Класс выводящий все таблицы бд в список
class allTables extends dbConnect
{
    public $searchRes;

    public function __construct()
    {
        parent::__construct();
        $this->searchRes = $this->mysqli->query("SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='touristpro'");
    }

    //Вывод туров
    public function tablesOutput()
    {
        while ($output = $this->searchRes->fetch_assoc()) {
            echo '  <li class="admin-main__table">
                        <a class="admin-main__table-link" href="adminPanel.php?table=' . $output["TABLE_NAME"] . ' ">' . $output["TABLE_NAME"] . '</a>
                    </li>
                 ';
        }
    }
}
$tables = new allTables();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/adminStyles.css" type="text/css">
    <title>Tourist Pro</title>
</head>

<body>
    <header class="header admin-header">
        <div class="container container__admin-header">
            <a class="admin-header__step-back_disabled" onclick="stepBack()">
                Вернуться на шаг назад
            </a>
            <a class="admin-header__links" href="index.php">
                <img class="header__logo-img" src="logo/logo.svg" alt="logo">
            </a>
            <a class="admin-header__exit admin-header__links" href="php/exit.php">Выйти из панели администратора</a>
        </div>
    </header>

    <section class="admin-main">
        <div class="container container__admin-main">
            <h1 class="admin-main__caption">Выберите таблицу из списка</h1>
            <ul class="admin-main__tables-list">
                <?php $tables->tablesOutput(); ?>
            </ul>
        </div>
    </section>



    <script src="js/script.js"></script>
</body>

</html>