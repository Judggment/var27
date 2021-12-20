-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 20 2021 г., 21:32
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
-- База данных: `cirk`
--

-- --------------------------------------------------------

--
-- Структура таблицы `exit_log`
--

CREATE TABLE `exit_log` (
  `id` int NOT NULL,
  `artist_id` int NOT NULL,
  `datas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `exit_log`
--

INSERT INTO `exit_log` (`id`, `artist_id`, `datas`) VALUES
(1, 1, '2010-09-20'),
(2, 2, '2026-11-20'),
(3, 3, '2028-11-20');

-- --------------------------------------------------------

--
-- Структура таблицы `kategorii`
--

CREATE TABLE `kategorii` (
  `id` int NOT NULL,
  `kategoria` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `kategorii`
--

INSERT INTO `kategorii` (`id`, `kategoria`) VALUES
(1, 'клоун'),
(2, 'воздушный гимнаст'),
(3, 'танцор');

-- --------------------------------------------------------

--
-- Структура таблицы `sale_ticket`
--

CREATE TABLE `sale_ticket` (
  `id` int NOT NULL,
  `id_ploshadki` int NOT NULL,
  `datas` date NOT NULL,
  `prodannie` int NOT NULL,
  `kas_sbor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `sale_ticket`
--

INSERT INTO `sale_ticket` (`id`, `id_ploshadki`, `datas`, `prodannie`, `kas_sbor`) VALUES
(1, 1, '2020-09-20', 32, '20000'),
(2, 2, '2001-10-20', 56, '36000'),
(3, 3, '2015-11-20', 66, '48000');

-- --------------------------------------------------------

--
-- Структура таблицы `spisok_artistov`
--

CREATE TABLE `spisok_artistov` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `kategoria_id` int NOT NULL,
  `biografia` varchar(500) NOT NULL,
  `price` decimal(6,0) NOT NULL,
  `mesto_raboti_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `spisok_artistov`
--

INSERT INTO `spisok_artistov` (`id`, `first_name`, `last_name`, `kategoria_id`, `biografia`, `price`, `mesto_raboti_id`) VALUES
(1, 'Дмитрий', 'Головатенко', 1, 'Тупа крутой чувак', '15000', 1),
(2, 'Кирилл', 'Саньков', 2, 'Тупа тоже норм выступает', '16000', 2),
(3, 'Сарсембай', 'Искаков', 3, 'Самый бездарный', '1', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `spisok_cirk_ploshadok`
--

CREATE TABLE `spisok_cirk_ploshadok` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `adres` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `spisok_cirk_ploshadok`
--

INSERT INTO `spisok_cirk_ploshadok` (`id`, `name`, `adres`) VALUES
(1, 'Альфа', 'Университетский проспект 16'),
(2, 'Бета', 'Алесеево 21'),
(3, 'Гамма', 'Родниковая 1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `exit_log`
--
ALTER TABLE `exit_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Индексы таблицы `kategorii`
--
ALTER TABLE `kategorii`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sale_ticket`
--
ALTER TABLE `sale_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ploshadki` (`id_ploshadki`);

--
-- Индексы таблицы `spisok_artistov`
--
ALTER TABLE `spisok_artistov`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `spisok_cirk_ploshadok`
--
ALTER TABLE `spisok_cirk_ploshadok`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `exit_log`
--
ALTER TABLE `exit_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `kategorii`
--
ALTER TABLE `kategorii`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `sale_ticket`
--
ALTER TABLE `sale_ticket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `spisok_artistov`
--
ALTER TABLE `spisok_artistov`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `spisok_cirk_ploshadok`
--
ALTER TABLE `spisok_cirk_ploshadok`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `exit_log`
--
ALTER TABLE `exit_log`
  ADD CONSTRAINT `exit_log_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `spisok_artistov` (`id`);

--
-- Ограничения внешнего ключа таблицы `sale_ticket`
--
ALTER TABLE `sale_ticket`
  ADD CONSTRAINT `sale_ticket_ibfk_1` FOREIGN KEY (`id_ploshadki`) REFERENCES `spisok_cirk_ploshadok` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
