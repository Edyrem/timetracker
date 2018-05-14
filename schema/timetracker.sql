-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 11 2018 г., 14:51
-- Версия сервера: 10.1.31-MariaDB
-- Версия PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `timetracker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `active`) VALUES
(1, 'Admin', 1),
(2, 'User', 1),
(3, 'Guest', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `work_begins` time NOT NULL,
  `work_ends` time NOT NULL,
  `date` date DEFAULT NULL,
  `is_active` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statistics`
--

INSERT INTO `statistics` (`id`, `user_id`, `work_begins`, `work_ends`, `date`, `is_active`) VALUES
(1, 1, '09:00:00', '18:00:00', '2018-05-02', 1),
(2, 1, '09:00:00', '18:00:00', '2018-05-03', 1),
(3, 2, '09:00:00', '18:00:00', '2018-05-04', 1),
(4, 3, '09:00:00', '18:00:00', '2018-05-05', 1),
(5, 3, '09:00:00', '18:00:00', '2018-05-06', 1),
(6, 4, '09:00:00', '18:00:00', '2018-05-02', 1),
(7, 5, '09:00:00', '18:00:00', '2018-05-09', 1),
(8, 5, '09:00:00', '18:00:00', '2018-05-07', 1),
(9, 1, '09:00:00', '18:00:00', '2018-05-06', 1),
(10, 2, '09:00:00', '18:00:00', '2018-05-06', 1),
(11, 3, '09:00:00', '18:00:00', '2018-05-07', 1),
(12, 4, '09:00:00', '18:00:00', '2018-05-07', 1),
(13, 1, '09:00:00', '18:00:00', '2018-05-07', 1),
(14, 2, '09:00:00', '18:00:00', '2018-05-07', 1),
(15, 5, '09:00:00', '18:00:00', '2018-05-08', 1),
(16, 1, '09:00:00', '18:00:00', '2018-05-08', 1),
(17, 4, '09:00:00', '18:00:00', '2018-05-08', 1),
(18, 2, '09:00:00', '18:00:00', '2018-05-10', 1),
(19, 3, '09:00:00', '18:00:00', '2018-05-08', 1),
(20, 5, '09:00:00', '18:00:00', '2018-05-10', 1),
(21, 1, '09:00:00', '18:00:00', '2018-05-10', 1),
(22, 2, '09:00:00', '18:00:00', '2018-05-11', 1),
(23, 3, '09:00:00', '18:00:00', '2018-05-10', 1),
(24, 4, '09:00:00', '18:00:00', '2018-05-11', 1),
(25, 5, '09:00:00', '18:00:00', '2018-05-11', 1),
(26, 1, '09:00:00', '18:00:00', '2018-05-02', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `time_tracker`
--

CREATE TABLE `time_tracker` (
  `id` int(11) NOT NULL,
  `work_begin_time` datetime NOT NULL,
  `work_end_time` datetime NOT NULL,
  `changed_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `registration` date NOT NULL,
  `permission` varchar(64) NOT NULL,
  `active` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `registration`, `permission`, `active`) VALUES
(1, 'Almaz', '$2y$08$aGxzalJUa2R2QW55MnlKQeRT3ol4gqQ.KidnWhjHbAgDqzVaY95U.', 'edyrem88@gmail.com', '2018-05-10', '1', 1),
(2, 'Stas', '$2y$08$NDRUSmFmVEN6eXNmNWtZbec5Jbj3Kkt/axEx2VfOJVyehkt1gylOe', 'stas@yandex.com', '2018-05-10', '1', 1),
(3, 'Ulan', '$2y$08$NEhydlJiWitORUc4bkJMMu.yI.Z8ODMiOLmjAAb2juAN1VLz4Zb4W', 'ulan@gmail.com', '2018-05-10', '0', 1),
(4, 'Ermek', '$2y$08$ZURKQVJJWS80NGsyWCtlSOh55ktvc7z/gvGa12QhT3ZJMSTLQ6s9u', 'ermek@ssw.com', '2018-05-10', '0', 1),
(5, 'Peter Parker', '$2y$08$SThDeWpZcWM0WEhwaW9nc.iuoVFyMh3vLu5T/ZFk8E1UuKtufZlVm', 'spider@man.com', '2018-05-10', '0', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `weekends`
--

CREATE TABLE `weekends` (
  `id` int(11) NOT NULL,
  `day_off` date NOT NULL,
  `is_weekend` smallint(6) NOT NULL,
  `is_holiday` smallint(6) NOT NULL,
  `is_regular` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `weekends`
--

INSERT INTO `weekends` (`id`, `day_off`, `is_weekend`, `is_holiday`, `is_regular`) VALUES
(1, '2018-05-05', 1, 0, 1),
(2, '2018-05-06', 1, 0, 1),
(3, '2018-05-09', 0, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `time_tracker`
--
ALTER TABLE `time_tracker`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `weekends`
--
ALTER TABLE `weekends`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `time_tracker`
--
ALTER TABLE `time_tracker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `weekends`
--
ALTER TABLE `weekends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
