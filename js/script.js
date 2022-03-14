//Кнопка вверх
let upBtn = document.querySelector('.up-button')

//Появление кнопки вверх при прокрутке 400 пикселей
function showButton() {
    if (window.pageYOffset > 200) {
        upBtn.style.opacity = '0.8';
        upBtn.style.visibility = 'visible';

    } else {
        upBtn.style.visibility = 'hidden';
        upBtn.style.opacity = '0';
    }
}

//Прокрутка до самого верха сайта
upBtn.onclick = function () {
    window.scrollTo(0, 0)
}

//Запуск функции showButton при скролле
window.onscroll = showButton;

//Кнопка Вернуться на шаг назад
function stepBack(){
    history.back();
    return false;
}

