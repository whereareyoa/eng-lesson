-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 10 2025 г., 23:43
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `nikitakoro`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_date` datetime(6) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `phone`, `appointment_date`, `created_at`, `updated_at`) VALUES
(1, 'Никита', '+7912312312', '2025-04-11 23:25:00.000000', '2025-04-05 18:25:51.000000', '2025-04-05 18:25:51.000000');

-- --------------------------------------------------------

--
-- Структура таблицы `course_signup`
--

CREATE TABLE `course_signup` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `course_signup`
--

INSERT INTO `course_signup` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Никита', 'knikita438@gmail.com', '+7-912-312-3213'),
(2, 'Максим', 'maxim45@gmail.com', '+7-123-213-2132'),
(8, 'Никита ', 'knikita438@gmail.com', '+7-123-123-2131');

-- --------------------------------------------------------

--
-- Структура таблицы `forum_posts`
--

CREATE TABLE `forum_posts` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forum_posts`
--

INSERT INTO `forum_posts` (`id`, `topic_id`, `content`, `created_by`, `created_at`) VALUES
(1, 1, 'Ого!', 1, '2025-03-09 16:53:04');

-- --------------------------------------------------------

--
-- Структура таблицы `forum_topics`
--

CREATE TABLE `forum_topics` (
  `id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forum_topics`
--

INSERT INTO `forum_topics` (`id`, `title`, `created_by`, `created_at`) VALUES
(1, 'Кто то делал общий анализ?', 1, '2025-03-09 16:51:20');

-- --------------------------------------------------------

--
-- Структура таблицы `katalog`
--

CREATE TABLE `katalog` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `kurs`
--

CREATE TABLE `kurs` (
  `id` int(11) NOT NULL,
  `img` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `kurs`
--

INSERT INTO `kurs` (`id`, `img`, `name`, `body`) VALUES
(1, 'orig.png', 'Общий анализ', 'Изучите основы новой языковой грамматики и словарного запаса с помощью наших уникальных материалов.\n\n\nПройдите общий анализ и получите точную картину состояния здоровья с помощью современных методов диагностики.');

-- --------------------------------------------------------

--
-- Структура таблицы `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exercise_question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `exercise_answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `content`, `exercise_question`, `exercise_answer`) VALUES
(1, 'Немецкий язык', 'Вопрос на уровень A1', 'Как будет привет на немецком?\n1- Hello\n2 - Hallo', 2),
(2, 'Немецкий язык', 'Вопрос на уровень A1', 'Как будет яблоко по-немецки?\n1 - apple\n2 - Apfel', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(1) NOT NULL,
  `username` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `surname`, `name`, `patronymic`, `phone`, `email`, `role`) VALUES
(1, 'korotovskix', '\\\\\\\\nikita@321', 'Коротовских', 'Никита', 'Михайлович', '+7-123-123-1231', 'knikita438@gmail.com', 0),
(2, 'admin', 'admin', 'Коротовских ', 'Никита', 'Михайлович', '+7-912-579-1820', 'admin@gmail.com', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `word`
--

CREATE TABLE `word` (
  `id` int(11) NOT NULL,
  `word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_remembered` tinyint(1) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `last_reviewed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `word`
--

INSERT INTO `word` (`id`, `word`, `translation`, `is_remembered`, `created_at`, `last_reviewed_at`) VALUES
(1, 'cat', 'кошка', 1, '2025-04-01 01:27:59', '2025-04-24 01:27:59'),
(2, 'dog', 'собака', 1, '2025-04-10 23:30:31', '2025-04-10 23:30:31'),
(3, 'carrot', 'морковка', 1, '2025-04-10 23:36:41', '2025-04-10 23:36:41');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `course_signup`
--
ALTER TABLE `course_signup`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `forum_topics`
--
ALTER TABLE `forum_topics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `course_signup`
--
ALTER TABLE `course_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `forum_topics`
--
ALTER TABLE `forum_topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `word`
--
ALTER TABLE `word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
