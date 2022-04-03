-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 28 2022 г., 07:40
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `3_bagrova`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users_bagrova`
--

CREATE TABLE `users_bagrova` (
  `id` int NOT NULL,
  `login` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users_bagrova`
--

INSERT INTO `users_bagrova` (`id`, `login`, `email`, `password`) VALUES
(1, '1@1.1', '', '1'),
(2, '2', '2@2.2', '2'),
(3, '2', '2@2.2', '2'),
(4, '3', '3@3.3', '3'),
(5, '4', '4@4.4', '4'),
(6, '4', '4@4.4', '4'),
(7, '4', '4@4.4', '4'),
(8, '4', '4@4.4', '4'),
(9, '4', '4@4.4', '4'),
(10, '4', '4@4.4', '4'),
(11, '4', '4@4.4', '4'),
(12, '4', '4@4.4', '4'),
(13, '4', '4@4.4', '4'),
(14, '4', '4@4.4', '4'),
(15, '4', '4@4.4', '4'),
(16, '4', '4@4.4', '4'),
(17, '4', '4@4.4', '4'),
(18, 'Alex', 'alexcaja@gmail.com', 'gfhjkm'),
(19, 'Alex', 'alexcaja@gmail.com', 'gfhjkm'),
(20, 'Alex', 'alexcaja@gmail.com', 'gfhjkm'),
(21, 'ssefesf', 'sfssefs@bgtgth.rgr', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users_bagrova`
--
ALTER TABLE `users_bagrova`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users_bagrova`
--
ALTER TABLE `users_bagrova`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
