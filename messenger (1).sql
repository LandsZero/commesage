-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 08 2022 г., 08:08
-- Версия сервера: 8.0.27
-- Версия PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `messenger`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chatlist`
--

CREATE TABLE `chatlist` (
  `chat_id` int NOT NULL,
  `chatName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `user_Id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `chatlist`
--

INSERT INTO `chatlist` (`chat_id`, `chatName`, `user_Id`) VALUES
(1, 'Test', 1),
(2, 'test2', 2),
(3, 'Тестовый чат', 7),
(4, 'ИванИПетр', 3),
(5, 'Общий чат', 10),
(6, 'Собрание новичков', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `contents`
--

CREATE TABLE `contents` (
  `message_id` int NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `contents`
--

INSERT INTO `contents` (`message_id`, `content`) VALUES
(1, 'Боже я устал'),
(43, 'Привет, Вовчик, как поживаешь?'),
(44, 'Привет, слушай, да нормально, устал немного'),
(45, 'Ох, я надеюсь все нормально'),
(46, 'А я вот мессенджер разрабатываю, устал немного'),
(47, 'Надеюсь скоро закончу, а то очень много времени уже вложено в это'),
(48, 'А конца работе так и не видно'),
(49, 'Грустно это'),
(50, 'Но мне весело вроде бы'),
(51, 'А у тебя как дела?'),
(52, 'чем занимаешься'),
(53, 'Слушай да ничем просто сижу чилю'),
(54, 'Ребята, получается очень классный чат.....'),
(55, 'Уф, Вова, наверное устал делать?'),
(56, 'Привет мужичелло'),
(57, 'хопа и скролл вниз'),
(58, 'Привет, Вовчик, я тебя люблю <3'),
(59, 'ребят, что по математике задавали?????'),
(60, 'а ты меня????????'),
(61, 'Ребята я устал'),
(62, 'Хоба и упали вниз'),
(63, 'ой, я не знаю, я сам не записывал'),
(64, 'хм, а кто нибудь собирается курсовой сдавать завтра????'),
(65, 'Привет всем, как дела?'),
(66, 'Привет, Иван, как твои дела?'),
(67, 'Привет, Петр, спасибо, что спросил:)'),
(68, 'Все хорошо:)))'),
(69, 'Ребята, я добавил всех пользователей в один чат, чтобы мы все могли общаться, это последняя проверка перед отправкой на флешку...'),
(70, 'Ого...Звучит жутко, ты уверен что ты готов?'),
(71, 'Я так скоро с ума сойду общаясь сам с собой...Нужно что то делать....'),
(72, 'Привет, Марина, как твои дела?'),
(73, 'Привет, Владос, да ништяк все:)))'),
(74, 'Привет, ребятки');

-- --------------------------------------------------------

--
-- Структура таблицы `messagelist`
--

CREATE TABLE `messagelist` (
  `message_id` int NOT NULL,
  `chat_id` int NOT NULL,
  `user_id` int NOT NULL,
  `dateCreated` date NOT NULL,
  `timeCreated` time NOT NULL,
  `status` tinytext COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `messagelist`
--

INSERT INTO `messagelist` (`message_id`, `chat_id`, `user_id`, `dateCreated`, `timeCreated`, `status`) VALUES
(1, 1, 1, '2022-03-24', '12:00:00', 'real'),
(43, 1, 2, '2031-05-20', '19:01:34', ''),
(44, 1, 1, '2031-05-20', '19:02:12', ''),
(45, 1, 1, '2031-05-20', '19:47:36', ''),
(46, 1, 1, '2031-05-20', '19:47:49', ''),
(47, 1, 1, '2031-05-20', '19:48:01', ''),
(48, 1, 1, '2031-05-20', '19:48:06', ''),
(49, 1, 1, '2031-05-20', '19:48:10', ''),
(50, 1, 1, '2031-05-20', '19:49:43', ''),
(51, 1, 1, '2031-05-20', '19:49:51', ''),
(52, 1, 1, '2031-05-20', '19:49:53', ''),
(53, 1, 2, '2031-05-20', '19:51:36', ''),
(54, 2, 2, '2031-05-20', '20:28:56', ''),
(55, 2, 2, '2031-05-20', '20:31:28', ''),
(56, 2, 1, '2031-05-20', '22:09:58', ''),
(57, 2, 1, '2031-05-20', '22:10:41', ''),
(58, 1, 2, '2022-06-02', '14:54:56', ''),
(59, 2, 2, '2022-06-02', '14:55:11', ''),
(60, 1, 2, '2022-06-02', '14:55:28', ''),
(61, 1, 1, '2022-06-02', '18:29:11', ''),
(62, 1, 1, '2022-06-03', '02:45:23', ''),
(63, 2, 1, '2022-06-07', '18:05:35', ''),
(64, 1, 1, '2022-06-07', '18:05:54', ''),
(65, 3, 1, '2022-06-08', '03:28:04', ''),
(66, 4, 7, '2022-06-08', '04:02:13', ''),
(67, 4, 3, '2022-06-08', '04:02:45', ''),
(68, 4, 3, '2022-06-08', '04:02:49', ''),
(69, 5, 10, '2022-06-08', '04:06:16', ''),
(70, 5, 7, '2022-06-08', '04:06:32', ''),
(71, 5, 2, '2022-06-08', '04:07:05', ''),
(72, 6, 11, '2022-06-08', '04:09:38', ''),
(73, 6, 10, '2022-06-08', '04:09:48', ''),
(74, 5, 1, '2022-06-08', '04:22:16', '');

-- --------------------------------------------------------

--
-- Структура таблицы `partylist`
--

CREATE TABLE `partylist` (
  `iddd` int NOT NULL,
  `chat_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `partylist`
--

INSERT INTO `partylist` (`iddd`, `chat_id`, `user_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(9, 1, 7),
(3, 2, 1),
(4, 2, 2),
(5, 2, 3),
(6, 3, 1),
(7, 3, 2),
(11, 4, 3),
(10, 4, 7),
(12, 5, 1),
(13, 5, 2),
(14, 5, 3),
(15, 5, 7),
(16, 5, 10),
(18, 6, 10),
(19, 6, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `text`
--

CREATE TABLE `text` (
  `text` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `Name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Surname` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `userlogin` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `Name`, `Surname`, `userlogin`, `mail`, `pass`) VALUES
(1, 'Vladimir', 'Zuenok', 'landszero', 'vovazu485@gmail.com', 'admin'),
(2, 'Anfisa', 'Markova', 'fisolda', 'anfisaudodo@gmail.com', 'anfis'),
(3, 'Ivan', 'Ivanov', 'ivan', 'ivan@mail.ru', 'ivanvanvan'),
(7, 'Петр', 'Петрович', 'petro', 'petrpetrovich@mail.ru', 'qweqwe'),
(10, 'Марина', 'Семенова', 'marusha', 'marisha@mail.ru', 'marinka222'),
(11, 'Влад', 'Горотков', 'vladick', 'yadaun@mail.ru', 'superdd');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chatlist`
--
ALTER TABLE `chatlist`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `user_Id` (`user_Id`);

--
-- Индексы таблицы `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`message_id`);

--
-- Индексы таблицы `messagelist`
--
ALTER TABLE `messagelist`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `chat_id` (`chat_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `partylist`
--
ALTER TABLE `partylist`
  ADD PRIMARY KEY (`iddd`),
  ADD KEY `chat_id` (`chat_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chatlist`
--
ALTER TABLE `chatlist`
  MODIFY `chat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `contents`
--
ALTER TABLE `contents`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT для таблицы `messagelist`
--
ALTER TABLE `messagelist`
  MODIFY `message_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT для таблицы `partylist`
--
ALTER TABLE `partylist`
  MODIFY `iddd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `chatlist`
--
ALTER TABLE `chatlist`
  ADD CONSTRAINT `chatlist_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `users` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `messagelist`
--
ALTER TABLE `messagelist`
  ADD CONSTRAINT `messagelist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `messagelist_ibfk_2` FOREIGN KEY (`chat_id`) REFERENCES `chatlist` (`chat_id`);

--
-- Ограничения внешнего ключа таблицы `partylist`
--
ALTER TABLE `partylist`
  ADD CONSTRAINT `partylist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `partylist_ibfk_2` FOREIGN KEY (`chat_id`) REFERENCES `chatlist` (`chat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
