-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 19 2021 г., 18:41
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `touristpro`
--

-- --------------------------------------------------------

--
-- Структура таблицы `booking`
--

CREATE TABLE `booking` (
  `id_b` int NOT NULL,
  `region` varchar(60) NOT NULL,
  `tour_name` varchar(80) NOT NULL,
  `zones` varchar(80) NOT NULL,
  `dates` varchar(10) NOT NULL,
  `people` varchar(35) NOT NULL,
  `adds` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `comment` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `price` int NOT NULL,
  `userLogin` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `booking`
--

INSERT INTO `booking` (`id_b`, `region`, `tour_name`, `zones`, `dates`, `people`, `adds`, `comment`, `email`, `price`, `userLogin`) VALUES
(1, 'Абхазский', 'Термальные источники Абхазии', 'Гейзер Кындыг, Spa Кындыр', '2022-06-20', '30 и меньше', 'Услуги проводника\r\n', NULL, 'oasda@asd.com', 33333, 'igor2222');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `photo` varchar(100) NOT NULL,
  `text` varchar(295) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `photo`, `text`) VALUES
(1, '../img/photousers/1.png', 'Лучший тур в моей жизни');

-- --------------------------------------------------------

--
-- Структура таблицы `feedbackform`
--

CREATE TABLE `feedbackform` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `feedbackform`
--

INSERT INTO `feedbackform` (`id`, `name`, `number`) VALUES
(1, 'Игорь', '89118235766'),
(2, 'Игорь', '89118235766');

-- --------------------------------------------------------

--
-- Структура таблицы `rightstable`
--

CREATE TABLE `rightstable` (
  `id_r` int NOT NULL,
  `name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `rightstable`
--

INSERT INTO `rightstable` (`id_r`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `subs`
--

CREATE TABLE `subs` (
  `id` int NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `subs`
--

INSERT INTO `subs` (`id`, `email`) VALUES
(1, 'Isok7071@gmail.com'),
(2, 'dar-gub@yandex.ru'),
(5, 'asdasd@sdfasdf');

-- --------------------------------------------------------

--
-- Структура таблицы `tours`
--

CREATE TABLE `tours` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(80) NOT NULL,
  `description` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `difficulty` varchar(30) NOT NULL,
  `zones` varchar(25) NOT NULL,
  `datapohoda` varchar(10) NOT NULL,
  `region` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `people` varchar(30) NOT NULL,
  `tourprice` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `tours`
--

INSERT INTO `tours` (`id`, `name`, `image`, `description`, `difficulty`, `zones`, `datapohoda`, `region`, `people`, `tourprice`) VALUES
(1, 'Термальные источники Абхазии', '../img/SearchResults/1.png', 'Горячие сероводородные источники, прогулки по самшитовым лесам,\r\nлесное озеро малая Рица, заброшенная деревня Акармара и величественные\r\nводопады, посещение старинных храмов, столицы Абхазии-города\r\nСухум и его цветочного ботанического сада.', 'Сложность 1', '1 зона', '2022-06-20', 'Абхазский', '30 и меньше', 30000),
(2, 'Загадки Восточной Пруссии', '../img/SearchResults/2.png', 'Кенигсберг – г. Тильзит – г. Рагнит - г. Инстербург – г. Гумбиннен –\r\nг . Пиллау - Балтийская коса - г. Кранц - Куршская коса', 'Сложность 1', '9 зон', '2022-06-24', 'Калининградский', '20 и меньше', 50000),
(3, 'Лыжный спортивный поход по Хибинам', '../img/SearchResults/3.png', 'ст. Апатиты - Умбозеро - г. Намуайв (н/к) -\r\nпер. Северный Рисчорр (1А) - пер. Южный Чорргор (1А)\r\n– пер. Аку-Аку (н/к) – оз. Большая Имандра - пер. Рамзая (н/к)\r\n- г. Кировск - ст. Апатиты', 'Сложность 4', '4 зоны', '2022-12-30', 'Мурманский', '10 и меньше', 80000),
(4, 'Алустон тур', '../img/SearchResults/4.png', 'плато Чатыр Дага (с посещением пещеры), Демерджи\r\n( с \"Долиной приведений\") и верхнее плато.\r\nРадиальный выход на Медведь гору.Экскурсия в парк\r\nАйвазовского и экскурсия с дегустацией( по желанию) в Массандру.\r\nПрогулка к водопаду Джур-джур, и вверх по его течению.', 'Сложность 4', '4 зоны', '2022-06-20', 'Крым', '5 и меньше', 70000),
(5, 'Восхождение в массиве Белухи', '../img/SearchResults/5.png', 'подножие Белухи – у самой Ак-Кемской стены', 'Сложность 5', '2 зоны', '2022-07-10', 'Алтайский', '10 и меньше', 50000),
(6, 'Пеший поход по горам Алтая - к подножию Белухи', '../img/SearchResults/6.png', 'Барнаул – Тюнгур – река Аккем – озеро Горных Духов – долина Семи озёр\r\n– перевал Кара-Тюрек – Кучерлинское озеро – Тюнгур – Барнаул', 'Сложность 3', '7 зон', '2022-07-10', 'Алтайский', '10 и меньше', 30000),
(7, 'Путешествие к сердцу Алтая. Исцеление тела и духа', '../img/SearchResults/7.png', 'Барнаул – Тюнгур – Ак-кем – Долина Ярлу –\r\nДолина Семи озер – Подножие Белухи – Верхний Уймон – Барнаул', 'Сложность 3', '8 зон', '2022-12-30', 'Алтайский', '30 и меньше', 80000),
(8, 'Сплав по рекам Чуя и Катунь', '../img/SearchResults/8.png', 'пос. Чибит – пор. Сумрачный, пор. Буревестник, пор. Бегемот, пор. Классический,\r\nпор. Слаломный, пор. Городовой, пор. Иодринский, пор. Турбинный, пор. Турклуб Горизонт, пор. Игульмень,\r\nпор. Кадринская Труба, пор. Шабаш, пор. Каянча, пор. Аяла, пор. Тельдекпень 1 и 2, пор. Еландинский', 'Сложность 5', '14 зон', '2022-06-20', 'Алтайский', '5 и меньше', 80000),
(9, 'Шавинские озера', '../img/SearchResults/9.png', 'Барнаул – пос.Чибит – пер.Оройский – плато Ештыкель – р.Шабага – р.Шавла\r\n– оз.Шавлинское – гора Пирамида – оз.В.Шавлинсоке – оз.Сорокинское\r\n– пер.Ниж.Шавлинский – плато Ештыкель – пос.Чибит - Барнаул', 'Сложность 2', '9 зон', '2022-06-24', 'Алтайский', '10 и меньше', 30000);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `surname` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `rights` int NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `surname`, `login`, `password`, `rights`) VALUES
(1, 'sokolov2@yandex.ru', 'Игорь', 'Соколов', 'igor2222', '$2y$10$H63fLaksaV.7YC0tget4u.YreCiWTqtS/MNJ7zyPQvCaOuAV2ehTu', 1),
(2, 'kotik@yandex.ru', 'Игорь', 'Соколов', 'kotik3333', '$2y$10$d34YM/pPDVbS/ogueQJBv.tVQ16xBtLHetvbPXgBIxmMg1XeJlSEq', 1),
(3, 'Roma@fff', 'Романчик', 'Алешиков', 'romai4r_228', '$2y$10$LUb4MIVIeE83.yM0rRAfKeC3mf4OSf3u9GmkAdeHxcR9HMDaNC2JK', 2),
(4, 'sobaka@yandex.ru', 'Собака', 'Собаковна', 'sobaka', '$2y$10$tGb.ZwSaaVG2vpKJ.IxHru.nDioCeb/7N867WXz5Xscm3bxVD1owe', 2),
(5, 'aleks@lll.com', 'Alex', 'Amber', 'alexkrut2', '$2y$10$WeyA44CuWl0gxuQNTNOGTuvw0HGO5DFJaaOe8oWiSvU3c0hhEyBdG', 2),
(6, 'allah@yaaay.ccc', 'Кишка', 'Двенадцатиперстная', 'kishka', '$2y$10$a0sSe6jKf/BU0SdEIFkiDO3O8zEq1/eRnjdaQR9CKMbQHD9Suve5S', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `zone`
--

CREATE TABLE `zone` (
  `id_z` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(80) NOT NULL,
  `id_t` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `zone`
--

INSERT INTO `zone` (`id_z`, `name`, `image`, `id_t`) VALUES
(1, 'Кенигсберг', '../img/zones/1.png', 2),
(2, 'Тильзит', '../img/zones/2.png', 2),
(3, 'Рагнит', '../img/zones/3.png', 2),
(4, 'Подножие белухи', '../img/zones/4.png', 6),
(5, 'Гейзер Кындыг', '../img/zones/6.png', 1),
(6, 'Spa Кындыр', '../img/zones/7.png', 1),
(7, 'База отдыха Заячья поляна', '../img/zones/8.png', 5),
(8, 'Перевал гезевцек', '../img/zones/9.png', 5),
(9, 'Пик Делоне', '../img/zones/10.png', 5),
(10, 'Озеро Сорокино', '../img/zones/12.png', 9),
(11, 'Озеро Джангысколь ', '../img/zones/13.png', 9),
(12, 'Долина Привидений', '../img/zones/14.png', 4),
(13, 'Петропавловск-Камчатский', '../img/zones/15.png', 3),
(14, 'Озеро Ештыкель', '../img/zones/11.png', 9),
(15, 'Долина Ярлу', '../img/zones/18.png', 7),
(16, 'Поселок Чибит', '../img/zones/19.png', 8);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_b`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedbackform`
--
ALTER TABLE `feedbackform`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rightstable`
--
ALTER TABLE `rightstable`
  ADD PRIMARY KEY (`id_r`);

--
-- Индексы таблицы `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rights` (`rights`);

--
-- Индексы таблицы `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id_z`),
  ADD KEY `id_t` (`id_t`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `booking`
--
ALTER TABLE `booking`
  MODIFY `id_b` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `feedbackform`
--
ALTER TABLE `feedbackform`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `rightstable`
--
ALTER TABLE `rightstable`
  MODIFY `id_r` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subs`
--
ALTER TABLE `subs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `zone`
--
ALTER TABLE `zone`
  MODIFY `id_z` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rights`) REFERENCES `rightstable` (`id_r`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `zone`
--
ALTER TABLE `zone`
  ADD CONSTRAINT `zone_ibfk_1` FOREIGN KEY (`id_t`) REFERENCES `tours` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
