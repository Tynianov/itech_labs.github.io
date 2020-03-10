-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 10 2020 г., 23:03
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `itech_var8`
--

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `login` varchar(80) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `ip` varchar(80) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `name`, `login`, `password`, `ip`, `balance`) VALUES
(1, 'Denis', 'DenisMain', 'Denis123', '127.0.0.1', -25),
(2, 'Key', 'KeyKun', 'KeyKun12', '255.255.255.0', 25),
(3, 'Dima', 'Dimon', 'Dima12345', 'localhost', 56);

-- --------------------------------------------------------

--
-- Структура таблицы `seanse`
--

CREATE TABLE `seanse` (
  `id` int(11) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `in_trafic` int(11) DEFAULT NULL,
  `out_trafic` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `seanse`
--

INSERT INTO `seanse` (`id`, `start`, `end`, `in_trafic`, `out_trafic`, `client_id`) VALUES
(1, '2020-02-02', '2020-03-10', 85, 42, 2),
(2, '2020-03-02', '2020-03-10', 455, 2555, 1),
(3, '2020-01-02', '2020-02-10', 65, 44, 1),
(4, '2020-04-02', '2020-05-10', 35, 45, 1),
(5, '2020-02-02', '2020-03-10', 42, 24, 1),
(6, '2020-01-02', '2020-02-10', 322, 45546, 2),
(7, '2020-02-02', '2020-03-10', 85, 42, 2),
(8, '2020-04-02', '2020-05-10', 456, 321, 2),
(9, '2020-02-02', '2020-03-10', 456, 232, 3),
(10, '2020-01-02', '2020-02-10', 45, 453, 3),
(11, '2020-04-02', '2020-05-10', 456, 123, 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `seanse`
--
ALTER TABLE `seanse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `seanse`
--
ALTER TABLE `seanse`
  ADD CONSTRAINT `seanse_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
