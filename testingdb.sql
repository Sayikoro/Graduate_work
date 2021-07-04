-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 04 2021 г., 17:00
-- Версия сервера: 8.0.23-0ubuntu0.20.04.1
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
-- База данных: `testingdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Аудитория`
--

CREATE TABLE `Аудитория` (
  `ИД_аудитории` int NOT NULL,
  `Наименование_аудитории` text NOT NULL,
  `ИД_корпуса` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Группа`
--

CREATE TABLE `Группа` (
  `ИД_группы` int NOT NULL,
  `Наименование_Группы` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Дисциплина`
--

CREATE TABLE `Дисциплина` (
  `ИД_дисциплины` int NOT NULL,
  `Наименование_дисциплины` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Занятие`
--

CREATE TABLE `Занятие` (
  `ИД_занятия` int NOT NULL,
  `Время_начала` text NOT NULL,
  `Время_окончания` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Корпус`
--

CREATE TABLE `Корпус` (
  `ИД_корпуса` int NOT NULL,
  `Идентификационный_символ` varchar(2) NOT NULL,
  `Наименование_корпуса` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Пользователь`
--

CREATE TABLE `Пользователь` (
  `ИД_пользователя` int NOT NULL,
  `Имя` text NOT NULL,
  `Логин` text NOT NULL,
  `Пароль` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Преподаватель`
--

CREATE TABLE `Преподаватель` (
  `ИД_преподавателя` int NOT NULL,
  `Фамилия_Инициалы_Преподавателя` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Расписание`
--

CREATE TABLE `Расписание` (
  `ИД_строки` int NOT NULL,
  `ИД_занятия` int NOT NULL,
  `ИД_аудитории` int NOT NULL,
  `ИД_группы` int NOT NULL,
  `ИД_дисциплины` int NOT NULL,
  `ИД_преподавателя` int NOT NULL,
  `Дата_занятия` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Специальность`
--

CREATE TABLE `Специальность` (
  `ИД_специальности` int NOT NULL,
  `Код_специальности` int NOT NULL,
  `Наименование_специальности` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Файлы`
--

CREATE TABLE `Файлы` (
  `ИД_файла` int NOT NULL,
  `Имя_файла` text NOT NULL,
  `Дата_загрузки` text NOT NULL,
  `Время_Загрузки` text NOT NULL,
  `Утвержден` tinyint(1) NOT NULL,
  `Ссылка` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Форма_Обучения`
--

CREATE TABLE `Форма_Обучения` (
  `ИД_формы_бучения` int NOT NULL,
  `Наименование_Формы_обучения` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Аудитория`
--
ALTER TABLE `Аудитория`
  ADD PRIMARY KEY (`ИД_аудитории`);

--
-- Индексы таблицы `Группа`
--
ALTER TABLE `Группа`
  ADD PRIMARY KEY (`ИД_группы`);

--
-- Индексы таблицы `Дисциплина`
--
ALTER TABLE `Дисциплина`
  ADD PRIMARY KEY (`ИД_дисциплины`);

--
-- Индексы таблицы `Занятие`
--
ALTER TABLE `Занятие`
  ADD PRIMARY KEY (`ИД_занятия`);

--
-- Индексы таблицы `Корпус`
--
ALTER TABLE `Корпус`
  ADD PRIMARY KEY (`ИД_корпуса`);

--
-- Индексы таблицы `Пользователь`
--
ALTER TABLE `Пользователь`
  ADD PRIMARY KEY (`ИД_пользователя`);

--
-- Индексы таблицы `Преподаватель`
--
ALTER TABLE `Преподаватель`
  ADD PRIMARY KEY (`ИД_преподавателя`);

--
-- Индексы таблицы `Расписание`
--
ALTER TABLE `Расписание`
  ADD PRIMARY KEY (`ИД_строки`);

--
-- Индексы таблицы `Специальность`
--
ALTER TABLE `Специальность`
  ADD PRIMARY KEY (`ИД_специальности`);

--
-- Индексы таблицы `Файлы`
--
ALTER TABLE `Файлы`
  ADD PRIMARY KEY (`ИД_файла`);

--
-- Индексы таблицы `Форма_Обучения`
--
ALTER TABLE `Форма_Обучения`
  ADD PRIMARY KEY (`ИД_формы_бучения`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Аудитория`
--
ALTER TABLE `Аудитория`
  MODIFY `ИД_аудитории` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Группа`
--
ALTER TABLE `Группа`
  MODIFY `ИД_группы` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Дисциплина`
--
ALTER TABLE `Дисциплина`
  MODIFY `ИД_дисциплины` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Занятие`
--
ALTER TABLE `Занятие`
  MODIFY `ИД_занятия` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Корпус`
--
ALTER TABLE `Корпус`
  MODIFY `ИД_корпуса` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Пользователь`
--
ALTER TABLE `Пользователь`
  MODIFY `ИД_пользователя` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Преподаватель`
--
ALTER TABLE `Преподаватель`
  MODIFY `ИД_преподавателя` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Расписание`
--
ALTER TABLE `Расписание`
  MODIFY `ИД_строки` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Специальность`
--
ALTER TABLE `Специальность`
  MODIFY `ИД_специальности` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Файлы`
--
ALTER TABLE `Файлы`
  MODIFY `ИД_файла` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Форма_Обучения`
--
ALTER TABLE `Форма_Обучения`
  MODIFY `ИД_формы_бучения` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
