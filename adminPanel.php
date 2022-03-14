<?php
session_start();
require("php/settings.php");
//Если администратор НЕ авторизован то его перекидывает на страницу авторизации
if (!($_SESSION["admin"])) {
    header("Location: admin.php");
}

//Класс для вывода таблиц в панели администратора
class tablesSearch extends dbConnect
{
    public $searchRes;
    public $tableName;


    public function __construct()
    {
        parent::__construct();
        $this->tableName = $_GET["table"];
        if ($this->tableName === "users") {
            $this->searchRes = $this->mysqli->query("SELECT * FROM `users`");
        } elseif ($this->tableName === "booking") {
            $this->searchRes = $this->mysqli->query("SELECT * FROM `booking`");
        } elseif ($this->tableName === "comments") {
            $this->searchRes = $this->mysqli->query("SELECT * FROM `comments`");
        } elseif ($this->tableName === "feedbackform") {
            $this->searchRes = $this->mysqli->query("SELECT * FROM `feedbackform`");
        } elseif ($this->tableName === "rightstable") {
            $this->searchRes = $this->mysqli->query("SELECT * FROM `rightstable`");
        } elseif ($this->tableName === "zone") {
            $this->searchRes = $this->mysqli->query("SELECT * FROM `zone`");
        }elseif ($this->tableName === "tours") {
            $this->searchRes = $this->mysqli->query("SELECT * FROM `tours`");
        }elseif ($this->tableName === "subs") {
            $this->searchRes = $this->mysqli->query("SELECT * FROM `subs`");
        }

    }

    //Вывод таблиц
    public function tablesOutput()
    {
        if ($this->tableName === "users") {
            //users
            echo '   
        <tr class="adminpanel-table-row">
        <td>
            <input class="adminpanel__inputs" type="checkbox" name="select-row">
        </td>
        <td>id</td>
        <td>name</td>
        <td>surname</td>
        <td>email</td>
        <td>password</td>
        <td>rights</td>
        <td>Действия</td>
        </tr>';
            while ($output = $this->searchRes->fetch_assoc()) {
                echo '  
            <tr class="adminpanel-table-row">
            <td>
                <input class="adminpanel__inputs" type="checkbox" name="select-row">
            </td>
            <td>' . $output["id"] . '</td>
            <td>' . $output["name"] . '</td>
            <td>' . $output["surname"] . '</td>
            <td>' . $output["login"] . '</td>
            <td>' . $output["password"] . '</td>
            <td>' . $output["rights"] . '</td>
            <td>
            <a class="adminpanel__change-row adminpanel__change adminpanel__rights" href="#change-row">Изменить</a>
                        <br>
            <a class="adminpanel__delete-row adminpanel__delete adminpanel__rights" href="#change-row">Удалить</a>
            </td>
        </tr>
                 ';
            }
        } elseif ($this->tableName === "booking") {

            //booking
            echo '   
        <tr class="adminpanel-table-row">
        <td>
            <input class="adminpanel__inputs" type="checkbox" name="select-row">
        </td>
        <td>id_b</td>
        <td>region</td>
        <td>tour_name</td>
        <td>zones</td>
        <td>dates</td>
        <td>people</td>
        <td>adds</td>
        <td>comment</td>
        <td>email</td>
        <td>price</td>
        <td>userLogin</td>
        <td>Действия</td>
        </tr>';

            while ($output = $this->searchRes->fetch_assoc()) {
                echo '  
            <tr class="adminpanel-table-row">
            <td>
                <input class="adminpanel__inputs" type="checkbox" name="select-row">
            </td>
            <td>' . $output["id_b"] . '</td>
            <td>' . $output["region"] . '</td>
            <td>' . $output["tour_name"] . '</td>
            <td>' . $output["zones"] . '</td>
            <td>' . $output["dates"] . '</td>
            <td>' . $output["people"] . '</td>
            <td>' . $output["adds"] . '</td>
            <td>' . $output["comment"] . '</td>
            <td>' . $output["email"] . '</td>
            <td>' . $output["price"] . '</td>
            <td>' . $output["userLogin"] . '</td>
            <td>
            <a class="adminpanel__change-row adminpanel__change adminpanel__rights" href="#change-row">Изменить</a>
                        <br>
            <a class="adminpanel__delete-row adminpanel__delete adminpanel__rights" href="#change-row">Удалить</a>
            </td>
        </tr>
                 ';
            }
        } elseif ($this->tableName === "comments") {
            
               //comments
               echo '   
               <tr class="adminpanel-table-row">
               <td>
                   <input class="adminpanel__inputs" type="checkbox" name="select-row">
               </td>
               <td>id</td>
               <td>photo</td>
               <td>text</td>
               <td>Действия</td>
               </tr>';
                   while ($output = $this->searchRes->fetch_assoc()) {
                       echo '  
                   <tr class="adminpanel-table-row">
                   <td>
                       <input class="adminpanel__inputs" type="checkbox" name="select-row">
                   </td>
                   <td>' . $output["id"] . '</td>
                   <td>' . $output["photo"] . '</td>
                   <td>' . $output["text"] . '</td>
                   <td>
                   <a class="adminpanel__change-row adminpanel__change adminpanel__rights" href="#change-row">Изменить</a>
                               <br>
                   <a class="adminpanel__delete-row adminpanel__delete adminpanel__rights" href="#change-row">Удалить</a>
                   </td>
               </tr>
                        ';
                   }

        } elseif ($this->tableName === "feedbackform") {

                  //feedback
               echo '   
               <tr class="adminpanel-table-row">
               <td>
                   <input class="adminpanel__inputs" type="checkbox" name="select-row">
               </td>
               <td>id</td>
               <td>name</td>
               <td>number</td>
               <td>Действия</td>
               </tr>';
                   while ($output = $this->searchRes->fetch_assoc()) {
                       echo '  
                   <tr class="adminpanel-table-row">
                   <td>
                       <input class="adminpanel__inputs" type="checkbox" name="select-row">
                   </td>
                   <td>' . $output["id"] . '</td>
                   <td>' . $output["name"] . '</td>
                   <td>' . $output["number"] . '</td>
                   <td>
                   <a class="adminpanel__change-row adminpanel__change adminpanel__rights" href="#change-row">Изменить</a>
                               <br>
                   <a class="adminpanel__delete-row adminpanel__delete adminpanel__rights" href="#change-row">Удалить</a>
                   </td>
               </tr>
                        ';
                   }
        } elseif ($this->tableName === "rightstable") {

                   //rightstable
               echo '   
               <tr class="adminpanel-table-row">
               <td>
                   <input class="adminpanel__inputs" type="checkbox" name="select-row">
               </td>
               <td>id_r</td>
               <td>name</td>
               <td>Действия</td>
               </tr>';
                   while ($output = $this->searchRes->fetch_assoc()) {
                       echo '  
                   <tr class="adminpanel-table-row">
                   <td>
                       <input class="adminpanel__inputs" type="checkbox" name="select-row">
                   </td>
                   <td>' . $output["id_r"] . '</td>
                   <td>' . $output["name"] . '</td>
                   <td>
                   <a class="adminpanel__change-row adminpanel__change adminpanel__rights" href="#change-row">Изменить</a>
                               <br>
                   <a class="adminpanel__delete-row adminpanel__delete adminpanel__rights" href="#change-row">Удалить</a>
                   </td>
               </tr>
                        ';
                   }
        } elseif ($this->tableName === "zone") {
            
                 //zone
               echo '   
               <tr class="adminpanel-table-row">
               <td>
                   <input class="adminpanel__inputs" type="checkbox" name="select-row">
               </td>
               <td>id_z</td>
               <td>name</td>
               <td>image</td>
               <td>id_t</td>
               <td>Действия</td>
               </tr>';
                   while ($output = $this->searchRes->fetch_assoc()) {
                       echo '  
                   <tr class="adminpanel-table-row">
                   <td>
                       <input class="adminpanel__inputs" type="checkbox" name="select-row">
                   </td>
                   <td>' . $output["id_z"] . '</td>
                   <td>' . $output["name"] . '</td>
                   <td>' . $output["image"] . '</td>
                   <td>' . $output["id_t"] . '</td>
                   <td>
                   <a class="adminpanel__change-row adminpanel__change adminpanel__rights" href="#change-row">Изменить</a>
                               <br>
                   <a class="adminpanel__delete-row adminpanel__delete adminpanel__rights" href="#change-row">Удалить</a>
                   </td>
               </tr>
                        ';
                   }
        }
        elseif ($this->tableName === "tours") {
            
            
             //tours
             echo '   
             <tr class="adminpanel-table-row">
             <td>
                 <input class="adminpanel__inputs" type="checkbox" name="select-row">
             </td>
             <td>id</td>
             <td>name</td>
             <td>image</td>
             <td>description</td>
             <td>difficulty</td>
             <td>zones</td>
             <td>datapohoda</td>
             <td>region</td>
             <td>people</td>
             <td>tourprice</td>
             <td>Действия</td>
             </tr>';
                 while ($output = $this->searchRes->fetch_assoc()) {
                     echo '  
                 <tr class="adminpanel-table-row">
                 <td>
                     <input class="adminpanel__inputs" type="checkbox" name="select-row">
                 </td>
                 <td>' . $output["id"] . '</td>
                 <td>' . $output["name"] . '</td>
                 <td>' . $output["image"] . '</td>
                 <td>' . $output["description"] . '</td>
                 <td>' . $output["difficulty"] . '</td>
                 <td>' . $output["zones"] . '</td>
                 <td>' . $output["datapohoda"] . '</td>
                 <td>' . $output["region"] . '</td>
                 <td>' . $output["people"] . '</td>
                 <td>' . $output["tourprice"] . '</td>
                 <td>
                 <a class="adminpanel__change-row adminpanel__change adminpanel__rights" href="#change-row">Изменить</a>
                             <br>
                 <a class="adminpanel__delete-row adminpanel__delete adminpanel__rights" href="#change-row">Удалить</a>
                 </td>
             </tr>
                      ';
                 }
        }
        elseif ($this->tableName === "subs") {
            
            //subs
            echo '   
            <tr class="adminpanel-table-row">
            <td>
                <input class="adminpanel__inputs" type="checkbox" name="select-row">
            </td>
            <td>id</td>
            <td>email</td>
            <td>Действия</td>
            </tr>';
                while ($output = $this->searchRes->fetch_assoc()) {
                    echo '  
                <tr class="adminpanel-table-row">
                <td>
                    <input class="adminpanel__inputs" type="checkbox" name="select-row">
                </td>
                <td>' . $output["id"] . '</td>
                <td>' . $output["email"] . '</td>
                <td>
                <a class="adminpanel__change-row adminpanel__change adminpanel__rights" href="#change-row">Изменить</a>
                            <br>
                <a class="adminpanel__delete-row adminpanel__delete adminpanel__rights" href="#change-row">Удалить</a>
                </td>
            </tr>
                     ';
                }
       }
    }
}
$tableout = new tablesSearch();

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
            <a class="admin-header__step-back_enabled admin-header__links" href="adminMain.php" onclick="stepBack()">
                Вернуться на шаг назад
            </a>
            <a class="admin-header__links" href="index.php">
                <img class="header__logo-img" src="logo/logo.svg" alt="logo">
            </a>
            <a class="admin-header__exit admin-header__links" href="php/exit.php">Выйти из панели администратора</a>
        </div>
    </header>

    <section class="adminpanel">
        <div class="container container__adminpanel">
            <h1 class="adminpanel-main__caption">Таблица <?php echo $_GET["table"] ?> </h1>
            <a class="adminpanel__delete adminpanel__links-main" href="#del">Удалить</a>
            <a class="adminpanel__change adminpanel__links-main" href="#change">Изменить</a>
            <table class="container adminpanel__table">
                <?php $tableout->tablesOutput() ?>
            </table>

            <form class="adminpanel__form" method="post" action="adminMain.php">
                <button class="adminpanel__submit" type="submit" name="admin-save">Сохранить изменения</button>
            </form>
        </div>
    </section>



    <script src="js/script.js"></script>
</body>

</html>