//Вывод дополнительного текста для акций на главной странице

//Обьявление кнопок акций
let stocksButton1 = document.getElementById("stocksButton1");
let stocksButton2 = document.getElementById("stocksButton2");
let stocksButton3 = document.getElementById("stocksButton3");
let stocksButton4 = document.getElementById("stocksButton4");

//По клику кнопку  определенной акции появляется текст
stocksButton1.onclick = function () {
    let stocksWrapper1 = document.getElementById("stock1");
    stocksWrapper1.classList.toggle("stocks__card-more_visible");
    stocksWrapper1.classList.toggle("stocks__card-more_hidden");
    if (stocksWrapper1.classList.contains("stocks__card-more_visible")) {
        stocksButton1.textContent = "Скрыть";
    } else {
        stocksButton1.textContent = "Подробнее";
    }
};
stocksButton2.onclick = function () {
    let stocksWrapper2 = document.getElementById("stock2");
    stocksWrapper2.classList.toggle("stocks__card-more_visible");
    stocksWrapper2.classList.toggle("stocks__card-more_hidden");
    if (stocksWrapper2.classList.contains("stocks__card-more_visible")) {
        stocksButton2.textContent = "Скрыть";
    } else {
        stocksButton2.textContent = "Подробнее";
    }
};
stocksButton3.onclick = function () {
    let stocksWrapper3 = document.getElementById("stock3");
    stocksWrapper3.classList.toggle("stocks__card-more_visible");
    stocksWrapper3.classList.toggle("stocks__card-more_hidden");
    if (stocksWrapper3.classList.contains("stocks__card-more_visible")) {
        stocksButton3.textContent = "Скрыть";
    } else {
        stocksButton3.textContent = "Подробнее";
    }
};
stocksButton4.onclick = function () {
    let stocksWrapper4 = document.getElementById("stock4");
    stocksWrapper4.classList.toggle("stocks__card-more_visible");
    stocksWrapper4.classList.toggle("stocks__card-more_hidden");
    if (stocksWrapper4.classList.contains("stocks__card-more_visible")) {
        stocksButton4.textContent = "Скрыть";
    } else {
        stocksButton4.textContent = "Подробнее";
    }
};
