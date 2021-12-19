-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 19 2021 г., 21:13
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `goods_id` int NOT NULL,
  `user_login` varchar(100) NOT NULL,
  `goods_count` int NOT NULL,
  `basket_status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `goods_id`, `user_login`, `goods_count`, `basket_status`) VALUES
(6, 1, 'Admin', 1, 3),
(7, 2, 'Admin', 1, 3),
(8, 1, 'Admin', 3, 3),
(9, 1, 'Admin', 3, 3),
(24, 1, 'test', 3, 2),
(25, 2, 'test', 1, 2),
(26, 3, 'test', 5, 2),
(27, 1, 'test', 1, 1),
(28, 3, 'test', 2, 1),
(30, 1, 'Admin', 2, 2),
(31, 2, 'Admin', 2, 2),
(32, 2, 'Admin', 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `short_disc` text NOT NULL,
  `disc` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `url`, `short_disc`, `disc`, `price`, `author`) VALUES
(1, 'Наука плоского мира', 'since.jpg', '', 'Дорогой читатель! Перед тобой - не очередной нудный научный трактат. Впрочем, не будем тебя обманывать, это и не роман о Плоском мире.\r\nВ ходе захватывающего эксперимента волшебники Незримого университета случайно создали новую вселенную. В этой вселенной есть планета, которую они называют Круглый мир. (Ха! А мы используем более емкое определение - Земля ?)\r\n\"Наука Плоского мира\" - потрясающая смесь вымысла и научных фактов, созданная в результате творческого союза Терри Пратчетта и знаменитых популяризаторов науки, Йена Стюарта и Джека Коэна. В книге удивительным образом сочетаются и фирменный юмор сэра Терри, и вполне доступные объяснения основных научных принципов (теория Большого взрыва и эволюция жизни на Земле, а также значительные моменты в истории науки).\r\nИ поверь, дорогой читатель, эта книга точно изменит твой взгляд на нашу Вселенную.', '700', 'Терри Пратчетт'),
(2, 'Перекрестки сумерек', 'crossroad.jpg', '', 'Мэт, бежавший из города Эбу Дар вместе с Дочерью Девяти Лун, понимает, что не в силах ни удержать её, ни отпустить… Перрии, продолжающий поиски жены, вынужден поступиться своей честью — и, заключив союз с врагом, предать Ранда… А Ранд ал\'Тор, Дракон Возрождённый, идёт всё дальше по избранному им Пути — и ежесекундно ждёт удара в спину от любого из тех, кто зовет себя его союзниками!', '500', 'Роберт Джордан'),
(3, 'Новая весна', 'new_spring.jpg', 'Айильская война уже закончилась, все люди вернулись домой. Поэтому Морейн Дамодред и Суан Санчей так трудно найти ребенка, рожденного на склоне Драконьей горы во время битвы. Ребенка, которому, согласно пророчества, предстоит стать Возрожденным Драконом — последней надеждой людей в битве с Темным.', 'Роман, возникший из одноименной повести, вошедшей в знаменитый сборник \"Легенды\". Пролог знаменитой саги Роберта Джордана \"Колесо Времени\" - мирового бестселлера, одной из популярнейших фэнтези-эпопей за всю историю жанра. Потрясающая возможность вернуться в полюбившийся миллионам поклонников Джордана мир - и узнать, какие события послужили толчком для легендарного сериала. Три дня длится безжалостная битва у города Тар-Валон. А между тем на Драконьей горе, возвышающейся над городом, сбывается древнее пророчество - рождается ребенок, которому предстоит изменить судьбу мира. Ребенок, который должен быть найден раньше, чем его обнаружат и уничтожат силы Тьмы.', '600', 'Роберт Джордан');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `book_id` int NOT NULL,
  `author_name` varchar(70) NOT NULL,
  `comment` text NOT NULL,
  `likes` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `book_id`, `author_name`, `comment`, `likes`) VALUES
(1, 1, 'Александр', 'Отличная книга', 0),
(2, 2, 'Александр', 'Жду продолжения.', 0),
(4, 2, 'Жнец', 'Люблю фентези.', 0),
(5, 2, 'Чтец', 'Дорого', 0),
(6, 2, 'Жнец', 'Не так уж и дорого', 0),
(7, 2, 'Александр', 'asdasdasda', 0),
(8, 2, 'qweqweq', 'АФЫафывжжжфывф фывфывфыв фывфывфывф фывффыв', 0),
(9, 1, 'Александр', 'sdfgsdfgs', 0),
(10, 2, 'Александр', 'Огонь', 0),
(11, 2, 'Александр', 'asdasda', 0),
(12, 2, 'a', 'aaaa', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `name` varchar(100) NOT NULL,
  `sid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`login`, `pass`, `name`, `sid`, `is_admin`) VALUES
('1211', 'SA44jwmmw88riimcpadsadsae7248fce8990089e402b00f89dc8d14dSA44jwmmw88riimcpadsadsa', 'Александр', 'fiid0md9ocfosps1cf09b6e856upuau8', 0),
('Admin', 'SA44jwmmw88riimcpadsadsa5e1c004f01adaf0d95080b7400defa3eSA44jwmmw88riimcpadsadsa', 'Admin', 'g5utndidegdqdal7ci8p8b3qgaf7ied7', 1),
('Alex', 'SA44jwmmw88riimcpadsadsa07b432d25170b469b57095ca269bc202SA44jwmmw88riimcpadsadsa', 'Alex', 'g5utndidegdqdal7ci8p8b3qgaf7ied7', 0),
('Alex2', 'SA44jwmmw88riimcpadsadsa07b432d25170b469b57095ca269bc202SA44jwmmw88riimcpadsadsa', 'Alex', 'g5utndidegdqdal7ci8p8b3qgaf7ied7', 0),
('qweq', 'SA44jwmmw88riimcpadsadsa0176ffb99c0a72aa95779ef67d4da02cSA44jwmmw88riimcpadsadsa', 'qweq', 'g5utndidegdqdal7ci8p8b3qgaf7ied7', 0),
('qweq12', 'SA44jwmmw88riimcpadsadsae7248fce8990089e402b00f89dc8d14dSA44jwmmw88riimcpadsadsa', 'qweq', 'g5utndidegdqdal7ci8p8b3qgaf7ied7', 0),
('test', 'SA44jwmmw88riimcpadsadsa6f4b726238e4edac373d1264dcb6f890SA44jwmmw88riimcpadsadsa', 'Тест', 'ilt9ablh5mpgg773gpn3plonar8rd1lf', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_com` (`book_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `cat_com` FOREIGN KEY (`book_id`) REFERENCES `catalog` (`id`) ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
