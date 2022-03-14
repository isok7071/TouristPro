<?php 

//Класс по поиску и выводу маршрутов на страницу search.php
class search extends dbConnect
{
    public $name;
    public $difficulty;
    public $zones;
    public $date;
    public $region;
    public $people;
    public $matchedTour;

    public function __construct()
    {
        parent::__construct();
        $this->region = $_GET["region"];
        $this->date = $_GET["date"];
        $this->people = $_GET["peopleNum"];
        $this->difficulty = $_GET["level"];
    }
    //Очищает все поля от лишнего
    public function trimming()
    {
        $this->region = filter_var(trim($this->region), FILTER_SANITIZE_STRING);
        $this->date = filter_var(trim($this->date), FILTER_SANITIZE_STRING);
        $this->people = filter_var(trim($this->people), FILTER_SANITIZE_STRING);
        $this->difficulty = filter_var(trim($this->difficulty), FILTER_SANITIZE_STRING);
    }

    //Поиск в базе по параметрам
    public function toursearch()
    {   
        $this->matchedTour = $result = $this->mysqli->query("SELECT * FROM `tours` WHERE `people` LIKE '%".$this->people."%' AND `difficulty` LIKE '%".$this->difficulty."%' AND `datapohoda` LIKE '%".$this->date."%' AND `region` LIKE '%".$this->region."%'  ");
    }
    //Вывод туров
    public function touroutput()
    {
        while ($output = $this->matchedTour->fetch_assoc()) {
            echo '  <div class="results__card">
            <img class="results__img" src="' . $output['image'] . '" alt="search-card">
            <div class="results__inner">
                <h2 class="results__card-caption">' . $output['name'] . '</h2>
                <div class="results__blue-text">
                    <p class="results__blue-p">' . $output['difficulty'] . '</p>
                    <p class="results__blue-p">
                        <span class="results__blue-span">' . $output['zones'] . '</span>
                    </p>
                </div>
                <p class="results__card-descript">' . $output['description'] . '</p>
                <div class="result__form-buttons">
                    <form method="get"  action="../booking/booking.php">
                        <button type="submit" value="'. $output['name'] .'" name="selected-tour" class="results__buttons results__submit" name="select">
                            Выбрать
                        </button>
                    </form>
                    <form method="get" action="../seats/seat.php">
                        <button type="submit" class="results__buttons results__change-button" value="'. $output['name'] .'" name="change">
                            Изменить маршрут
                        </button>
                    </form>
                </div>
            </div>
        </div>
            ';
        }
    }
}

?>