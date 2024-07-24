-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3333
-- Время создания: Июн 27 2024 г., 13:32
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `feedback_system`
--

-- --------------------------------------------------------

--
-- Структура таблицы `arhive`
--

CREATE TABLE `arhive` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `id_message` int NOT NULL,
  `head` varchar(128) NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `arhive`
--

INSERT INTO `arhive` (`id`, `id_user`, `id_message`, `head`, `text`, `time`) VALUES
(1, 30, 47, 'Решение не работающей камеры', 'При возникновении проблемы с подключением камеры следует внимательно проверить состояние кабеля, убедиться в надежности соединений и правильности вставки. Далее рекомендуется перезагрузить устройство, что может помочь восстановить нормальную работу камеры. Также важно убедиться, что драйверы камеры установлены и обновлены на компьютере. В случае отсутствия необходимых драйверов, рекомендуется загрузить их с официального сайта производителя устройства. После этого повторите попытку подключения камеры и проверьте работу. В случае проблемы, обратитесь к специалисту для более детальной диагностики и устранения неисправностей', '2024-06-25 12:37:14'),
(2, 36, 53, 'Восстановление работы компьютера', NULL, '2024-06-26 09:29:10'),
(3, 36, 51, 'Проблема запуска ', NULL, '2024-06-27 05:01:39'),
(4, 36, 51, 'Проблема запуска ', NULL, '2024-06-27 05:02:00'),
(5, 36, 51, 'Проблема с запуском', NULL, '2024-06-27 05:04:06'),
(6, 36, 51, 'Проблема с запуском', NULL, '2024-06-27 05:06:42'),
(7, 36, 51, 'Проблема с запуском', 'Проблемы запуска ПК', '2024-06-27 05:07:14'),
(8, 36, 51, 'Проблема с запуском', 'Проблемы запуска ПК', '2024-06-27 05:13:39'),
(9, 36, 51, 'enned nedd problem is exist', NULL, '2024-06-27 05:18:33'),
(10, 36, 51, 'enned nedd problem is exist', NULL, '2024-06-27 05:47:47'),
(11, 36, 51, 'Проблема с запуском ПК', 'Не запускается ПК вместе с 1С', '2024-06-27 05:52:22'),
(12, 36, 52, 'Тестовая запись', 'Для тегов', '2024-06-27 09:21:21');

-- --------------------------------------------------------

--
-- Структура таблицы `arhive_has_tags`
--

CREATE TABLE `arhive_has_tags` (
  `id_arhive` int NOT NULL,
  `id_tag` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `arhive_has_tags`
--

INSERT INTO `arhive_has_tags` (`id_arhive`, `id_tag`) VALUES
(12, 165),
(12, 166),
(12, 156),
(12, 167);

-- --------------------------------------------------------

--
-- Структура таблицы `arhive_has_themes`
--

CREATE TABLE `arhive_has_themes` (
  `id_arhive` int NOT NULL,
  `id_theme` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `arhive_has_themes`
--

INSERT INTO `arhive_has_themes` (`id_arhive`, `id_theme`) VALUES
(1, 3),
(2, 3),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int NOT NULL,
  `file_path` varchar(255) NOT NULL COMMENT 'logs',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `file_path`, `time`) VALUES
(1, ',mn,,.', '2024-06-07 09:51:15'),
(2, 'lnkm,', '2024-06-07 09:51:15'),
(3, '/system/php/files/3.txt', '2024-06-07 09:51:15'),
(4, '/system/php/files/4.txt', '2024-06-07 09:51:15'),
(5, '/system/php/files/5.txt', '2024-06-07 09:51:15'),
(6, '/system/php/files/6.txt', '2024-06-07 09:51:15'),
(7, '/system/php/files/7.txt', '2024-06-07 09:51:15'),
(8, '/system/php/files/8.txt', '2024-06-07 09:51:15'),
(9, '/system/php/files/9.txt', '2024-06-07 09:51:15'),
(10, '/system/php/files/10.txt', '2024-06-07 09:51:15'),
(11, '/system/php/files/11.txt', '2024-06-07 09:51:15'),
(12, '/system/php/files/12.txt', '2024-06-07 09:51:15'),
(13, '/system/php/files/13.txt', '2024-06-07 09:51:15'),
(14, '/system/php/files/14.txt', '2024-06-07 09:51:15'),
(15, '/system/php/files/15.txt', '2024-06-07 09:51:15'),
(16, '/system/php/files/16.txt', '2024-06-07 10:59:09'),
(17, '/system/php/files/17.txt', '2024-06-07 11:08:28'),
(18, '/system/php/files/18.txt', '2024-06-07 11:08:54'),
(19, '/system/php/files/19.txt', '2024-06-07 11:12:31'),
(20, '/system/php/files/20.txt', '2024-06-07 11:14:51'),
(21, '/system/php/files/21.txt', '2024-06-17 10:44:59'),
(22, '/system/php/files/22.txt', '2024-06-19 12:40:08');

-- --------------------------------------------------------

--
-- Структура таблицы `img`
--

CREATE TABLE `img` (
  `id` int NOT NULL,
  `id_msg` int NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `img`
--

INSERT INTO `img` (`id`, `id_msg`, `path`) VALUES
(1, 13, '/system/php/img/1.jpg'),
(2, 14, '/system/php/img/2.jpg'),
(3, 15, '/system/php/img/3.jpg'),
(4, 16, '/system/php/img/4.jpg'),
(5, 17, '/system/php/img/5.png'),
(6, 17, '/system/php/img/6.png'),
(7, 18, '/system/php/img/7.jpg'),
(8, 19, '/system/php/img/8.jpg'),
(9, 22, '/system/php/img/9.png'),
(10, 44, '/system/php/img/10.png'),
(11, 44, '/system/php/img/11.png'),
(12, 45, '/system/php/img/12.png'),
(13, 45, '/system/php/img/13.jpg'),
(14, 47, '/system/php/img/14.png');

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `head` varchar(128) NOT NULL,
  `msg` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `id_user`, `head`, `msg`, `status`, `time`) VALUES
(1, 30, 'jkb', 'zxc cxz', 0, '2024-06-07 09:51:50'),
(2, 30, 'jkb', 'zxc cxz', 0, '2024-06-07 09:51:50'),
(3, 31, 'jkb', 'zxc cxz', 0, '2024-06-07 09:51:50'),
(4, 31, 'jkb', 'zxc cxz', 0, '2024-06-07 09:51:50'),
(5, 31, 'jkb', 'zxc cxz', 0, '2024-06-07 09:51:50'),
(6, 29, 'jkb', 'zxc cxz', 0, '2024-06-07 09:51:50'),
(7, 29, 'jkb', 'zxc cxz', 0, '2024-06-07 09:51:50'),
(8, 29, 'jkb', 'zxc cxz', 0, '2024-06-07 09:51:50'),
(9, 29, 'jkb', 'zxc cxz', 0, '2024-06-07 09:51:50'),
(10, 29, 'jkb', 'zxc cxz', 0, '2024-06-07 09:51:50'),
(11, 29, 'qwerty', 'mn nm', 0, '2024-06-07 09:51:50'),
(12, 29, 'qwerty', 'mn nm', 0, '2024-06-07 09:51:50'),
(13, 29, 'qwerty', 'mn nm', 0, '2024-06-07 09:51:50'),
(14, 29, 'qwerty', 'mn nm', 0, '2024-06-07 09:51:50'),
(15, 29, 'qwerty', 'mn nm', 0, '2024-06-07 09:51:50'),
(16, 29, 'qwerty', 'mn nm', 0, '2024-06-07 09:51:50'),
(17, 29, 'Проблема', 'проблема опиание', 0, '2024-06-07 10:59:09'),
(18, 29, 'qwerty', 'sd gsd gs', 0, '2024-06-07 11:08:28'),
(19, 29, 'qwerty', 'sd gsd gs sflk vsd vsldk nvlsd.n lsdkn lfv lf ldfn dl vldf df sblf;ab ;ka raeb raeorb earl;kvb fka;l bo;a bfkma bm,fb ad kkvfdjab fldk bkfaj b,mb dklfl ekab a;ojba', 0, '2024-06-07 11:08:54'),
(20, 29, 'qwerty', 'dflvanfv ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 0, '2024-06-07 11:10:16'),
(21, 29, 'qwerty', 'flbdb;\r\nbdfb', 0, '2024-06-07 11:12:31'),
(22, 29, 'отвнт', 'вдаивд \r\nваиваитвалоитваоилыои идв иы и\r\nвыиваыыоптаыплыпап\r\nоапоыо\r\nпоаыопопоп по о ыа оыа апоа вп ', 0, '2024-06-07 11:14:51'),
(23, 29, 'Problem', 'enw new porblem?, ulre ', 0, '2024-06-17 03:50:56'),
(24, 29, 'Problem', 'new problem', 0, '2024-06-17 03:51:24'),
(25, 29, 'Problem', 'new problem', 0, '2024-06-17 03:58:19'),
(26, 29, 'Problem', 'new problem', 0, '2024-06-17 03:59:02'),
(27, 29, 'Problem', 'new problem', 0, '2024-06-17 03:59:26'),
(28, 29, 'Problem', 'new problem', 0, '2024-06-17 04:00:29'),
(29, 29, 'Problem', 'new problem', 0, '2024-06-17 04:01:28'),
(30, 29, 'Problem', 'new problem', 0, '2024-06-17 04:02:11'),
(31, 29, 'Problem', 'new problem', 0, '2024-06-17 04:03:15'),
(32, 29, 'Problem', 'new problem', 0, '2024-06-17 04:03:58'),
(33, 29, 'Problem', 'new problem', 0, '2024-06-17 04:04:06'),
(34, 29, 'Problem', 'new problem', 0, '2024-06-17 04:05:18'),
(35, 29, 'enned nedd problem is exist', 'Search on the site, nees', 0, '2024-06-17 04:06:54'),
(36, 29, 'Problem', 'new problem', 0, '2024-06-17 04:13:46'),
(37, 29, 'Problem', 'new problem', 0, '2024-06-17 04:14:07'),
(38, 29, 'Problem', 'new problem', 0, '2024-06-17 04:14:49'),
(39, 29, 'Problem', 'new problem', 0, '2024-06-17 04:15:45'),
(40, 29, 'Problem this beer', 'new problem is exist, need more information', 0, '2024-06-17 04:16:28'),
(41, 29, 'Problem this beer', 'new problem is exist, need more information', 0, '2024-06-17 04:17:16'),
(42, 29, 'Problem this beer', 'new problem is exist, need more information', 0, '2024-06-17 04:18:05'),
(43, 29, 'Problem isj this beer', 'new problem is exist, need more information', 1, '2024-06-17 04:18:46'),
(44, 34, 'qwerty', 'zxc', 0, '2024-06-17 10:44:59'),
(45, 29, 'bgf', 'xf vdf fd fbd', 0, '2024-06-19 12:40:08'),
(46, 34, 'Не создаются расчетки по зарплате', 'Не могу создать расчёт за последний квартал', 0, '2024-06-24 12:04:25'),
(47, 34, 'Камера не работает', 'не работает камера на сушилке', 0, '2024-06-24 12:06:26'),
(48, 34, 'Камера', 'Нет подключения к камере на смотровоцй', 0, '2024-06-24 12:08:22'),
(49, 34, 'Не подключается к базе ', 'Нет подключения к базе', 0, '2024-06-24 12:09:18'),
(50, 34, 'Компьютер перестал работать', 'Компьютер перестал работать в рубке смотрителя конвеера АДресс', 0, '2024-06-24 12:12:47'),
(51, 34, 'Нет подключения к сети', 'Не работает интернет в кабинете 32', 1, '2024-06-24 12:13:46'),
(52, 34, 'Проблема с внесением данных новый сотрудников', 'Не вносятся данные новых сотрудников в таблице с уточняющими данными', 1, '2024-06-24 12:16:30'),
(53, 34, 'Проблема с компьютером', 'У меня возникла серьезная проблема с моим компьютером. Каждый раз при попытке запустить систему, компьютер выдает синий экран с сообщением о критической ошибке и автоматически перезагружается. Я пытался восстановить систему с помощью различных методов, но проблема не исчезает. Я обнаружил, что система перестала стабильно работать после установки новых обновлений программного обеспечения. Возможно, проблема связана с аппаратным оборудованием, так как недавно я не проводил никаких изменений в конфигурации программного обеспечения. Что можно предпринять для выявления и устранения этой серьезной проблемы с компьютером?', 1, '2024-06-24 12:43:51');

-- --------------------------------------------------------

--
-- Структура таблицы `message_add`
--

CREATE TABLE `message_add` (
  `id` int NOT NULL,
  `id_message` int NOT NULL,
  `id_user` int NOT NULL,
  `desc` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `message_add`
--

INSERT INTO `message_add` (`id`, `id_message`, `id_user`, `desc`, `time`) VALUES
(1, 41, 29, 'sdfv', '2024-06-17 08:24:41'),
(2, 41, 29, 'sdfv', '2024-06-17 08:27:25'),
(3, 43, 29, 'ssds', '2024-06-17 09:16:32'),
(4, 44, 34, 'cascs', '2024-06-17 10:45:18'),
(5, 43, 34, 'dcs', '2024-06-18 07:04:02'),
(6, 43, 34, 'dcs', '2024-06-18 07:04:27'),
(7, 43, 34, 'dcs', '2024-06-18 07:05:35'),
(8, 43, 34, 'sdfvdd', '2024-06-18 07:06:24'),
(9, 43, 34, 'sdfv', '2024-06-18 07:07:40'),
(10, 44, 34, 'cascs', '2024-06-18 07:10:29'),
(11, 1, 30, 'сообщенме', '2024-06-24 10:53:02'),
(12, 45, 29, 'Добавочный ответ', '2024-06-25 06:26:07');

-- --------------------------------------------------------

--
-- Структура таблицы `message_has_files`
--

CREATE TABLE `message_has_files` (
  `id_message` int NOT NULL,
  `id_file` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `message_has_files`
--

INSERT INTO `message_has_files` (`id_message`, `id_file`) VALUES
(11, 10),
(12, 11),
(13, 12),
(14, 13),
(15, 14),
(16, 15),
(17, 16),
(18, 17),
(19, 18),
(21, 19),
(22, 20),
(44, 21),
(45, 22);

-- --------------------------------------------------------

--
-- Структура таблицы `msg_has_tags`
--

CREATE TABLE `msg_has_tags` (
  `id_msg` int NOT NULL,
  `id_tag` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `msg_has_tags`
--

INSERT INTO `msg_has_tags` (`id_msg`, `id_tag`) VALUES
(34, 1),
(34, 1),
(35, 9),
(35, 10),
(35, 1),
(35, 12),
(35, 13),
(36, 1),
(36, 1),
(37, 1),
(37, 1),
(41, 1),
(42, 1),
(42, 15),
(42, 16),
(42, 17),
(42, 18),
(42, 19),
(42, 20),
(43, 1),
(43, 15),
(43, 16),
(43, 17),
(43, 18),
(43, 19),
(43, 20),
(44, 28),
(45, 29),
(45, 30),
(45, 31),
(45, 32),
(46, 34),
(46, 35),
(46, 36),
(46, 37),
(46, 38),
(46, 39),
(46, 33),
(47, 42),
(47, 34),
(47, 44),
(47, 45),
(47, 41),
(48, 42),
(48, 49),
(48, 50),
(48, 51),
(48, 45),
(48, 47),
(49, 34),
(49, 56),
(49, 50),
(49, 58),
(49, 54),
(50, 60),
(50, 61),
(50, 62),
(50, 63),
(50, 64),
(50, 65),
(50, 66),
(50, 67),
(51, 68),
(51, 49),
(51, 50),
(51, 71),
(51, 72),
(51, 73),
(52, 74),
(52, 75),
(52, 76),
(52, 77),
(52, 78),
(52, 79),
(52, 80),
(52, 75),
(52, 82),
(52, 83),
(53, 74),
(53, 75),
(53, 86),
(53, 87),
(53, 74),
(53, 75),
(53, 90),
(53, 91),
(53, 92),
(53, 93),
(53, 94),
(53, 95),
(53, 96),
(53, 97),
(53, 60),
(53, 99),
(53, 100),
(53, 101),
(53, 75),
(53, 103),
(53, 104),
(53, 105),
(53, 106),
(53, 107),
(53, 108),
(53, 109),
(53, 110),
(53, 111),
(53, 112),
(53, 113),
(53, 75),
(53, 115),
(53, 116),
(53, 117),
(53, 118),
(53, 74),
(53, 34),
(53, 121),
(53, 110),
(53, 123),
(53, 124),
(53, 125),
(53, 126),
(53, 127),
(53, 62),
(53, 129),
(53, 130),
(53, 131),
(53, 132),
(53, 133),
(53, 134),
(53, 135),
(53, 74),
(53, 137),
(53, 75),
(53, 139),
(53, 140),
(53, 141),
(53, 142),
(53, 143),
(53, 110),
(53, 34),
(53, 146),
(53, 147),
(53, 148),
(53, 63),
(53, 150),
(53, 133),
(53, 134),
(53, 124),
(53, 154),
(53, 155),
(53, 156),
(53, 157),
(53, 107),
(53, 159),
(53, 160),
(53, 161),
(53, 162),
(53, 75),
(53, 164);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(5, 'user'),
(10, 'moder'),
(20, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `super_theme`
--

CREATE TABLE `super_theme` (
  `id` int NOT NULL,
  `theme` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `super_theme`
--

INSERT INTO `super_theme` (`id`, `theme`) VALUES
(1, '1С'),
(2, 'Сеть'),
(3, 'Интернет'),
(4, 'Аппаратура');

-- --------------------------------------------------------

--
-- Структура таблицы `super_theme_has_theme`
--

CREATE TABLE `super_theme_has_theme` (
  `id_super_theme` int NOT NULL,
  `id_theme` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `super_theme_has_theme`
--

INSERT INTO `super_theme_has_theme` (`id_super_theme`, `id_theme`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(1, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `tag` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'Problem'),
(2, 'Problem'),
(3, 'Problem'),
(4, 'Problem'),
(5, 'Problem'),
(6, 'Problem'),
(7, 'Problem'),
(8, 'problem'),
(9, 'enned'),
(10, 'nedd'),
(11, 'problem'),
(12, 'is'),
(13, 'exist'),
(14, 'Problem'),
(15, 'this'),
(16, 'beer'),
(17, 'exist,'),
(18, 'need'),
(19, 'more'),
(20, 'information'),
(21, 'Problem'),
(22, 'this'),
(23, 'beer'),
(24, 'exist,'),
(25, 'need'),
(26, 'more'),
(27, 'information'),
(28, 'qwerty'),
(29, 'bgf'),
(30, 'vdf'),
(31, 'fd'),
(32, 'fbd'),
(33, 'квартал'),
(34, 'Не'),
(35, 'создаются'),
(36, 'расчетки'),
(37, 'по'),
(38, 'зарплате'),
(39, 'последний'),
(40, 'квартал'),
(41, 'сушилке'),
(42, 'Камера'),
(43, 'не'),
(44, 'работает'),
(45, 'на'),
(46, 'сушилке'),
(47, 'смотровоцй'),
(48, 'Камера'),
(49, 'подключения'),
(50, 'к'),
(51, 'камере'),
(52, 'на'),
(53, 'смотровоцй'),
(54, ''),
(55, 'Не'),
(56, 'подключается'),
(57, 'к'),
(58, 'базе'),
(59, ''),
(60, 'Компьютер'),
(61, 'перестал'),
(62, 'работать'),
(63, 'в'),
(64, 'рубке'),
(65, 'смотрителя'),
(66, 'конвеера'),
(67, 'АДресс'),
(68, 'Нет'),
(69, 'подключения'),
(70, 'к'),
(71, 'сети'),
(72, 'кабинете'),
(73, '32'),
(74, 'Проблема'),
(75, 'с'),
(76, 'внесением'),
(77, 'данных'),
(78, 'новый'),
(79, 'сотрудников'),
(80, 'таблице'),
(81, 'с'),
(82, 'уточняющими'),
(83, 'данными'),
(84, 'Проблема'),
(85, 'с'),
(86, 'компьютером'),
(87, 'серьезная'),
(88, 'проблема'),
(89, 'с'),
(90, 'моим'),
(91, 'компьютером.'),
(92, 'Каждый'),
(93, 'раз'),
(94, 'при'),
(95, 'попытке'),
(96, 'запустить'),
(97, 'систему,'),
(98, 'компьютер'),
(99, 'выдает'),
(100, 'синий'),
(101, 'экран'),
(102, 'с'),
(103, 'сообщением'),
(104, 'о'),
(105, 'критической'),
(106, 'ошибке'),
(107, 'и'),
(108, 'автоматически'),
(109, 'перезагружается.'),
(110, 'Я'),
(111, 'пытался'),
(112, 'восстановить'),
(113, 'систему'),
(114, 'с'),
(115, 'помощью'),
(116, 'различных'),
(117, 'методов,'),
(118, 'но'),
(119, 'проблема'),
(120, 'не'),
(121, 'исчезает.'),
(122, 'Я'),
(123, 'обнаружил,'),
(124, 'что'),
(125, 'система'),
(126, 'перестала'),
(127, 'стабильно'),
(128, 'работать'),
(129, 'после'),
(130, 'установки'),
(131, 'новых'),
(132, 'обновлений'),
(133, 'программного'),
(134, 'обеспечения.'),
(135, 'Возможно,'),
(136, 'проблема'),
(137, 'связана'),
(138, 'с'),
(139, 'аппаратным'),
(140, 'оборудованием,'),
(141, 'так'),
(142, 'как'),
(143, 'недавно'),
(144, 'я'),
(145, 'не'),
(146, 'проводил'),
(147, 'никаких'),
(148, 'изменений'),
(149, 'в'),
(150, 'конфигурации'),
(151, 'программного'),
(152, 'обеспечения.'),
(153, 'Что'),
(154, 'можно'),
(155, 'предпринять'),
(156, 'для'),
(157, 'выявления'),
(158, 'и'),
(159, 'устранения'),
(160, 'этой'),
(161, 'серьезной'),
(162, 'проблемы'),
(163, 'с'),
(164, 'компьютером?'),
(165, 'Тестовая'),
(166, 'запись'),
(167, 'тегов');

-- --------------------------------------------------------

--
-- Структура таблицы `themes`
--

CREATE TABLE `themes` (
  `id` int NOT NULL,
  `theme` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `themes`
--

INSERT INTO `themes` (`id`, `theme`) VALUES
(1, 'Проблема запуска 1С'),
(2, 'Нет связи с принтером'),
(3, 'Нет связи со сканером'),
(4, 'Разрыв соеденения'),
(5, 'Проблемы с запуском');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `id_role` int NOT NULL DEFAULT '5',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `FName` varchar(45) NOT NULL,
  `SName` varchar(45) NOT NULL,
  `TName` varchar(45) DEFAULT NULL,
  `date_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `id_role`, `email`, `password`, `FName`, `SName`, `TName`, `date_reg`) VALUES
(28, 5, 'kike@yandex.run', '$2y$10$EKgl1x8pyhDVBjhGcwk3VO3EFSG7B2ZkburTbzfaaJ05gdjMilI4W', 'Амир', 'Усуп', 'Петрович', '2024-06-05 10:21:58'),
(29, 5, 'kike@yandex.ru', '$2y$10$P8qjSMWqM.Ru8h43L1pAbuBXTtygnd.gNuGQX3ILZMdiz44m21P7.', 'Михаил', 'Зубенко', 'Петрович', '2024-06-05 10:24:41'),
(30, 5, 'admin@admin.ru', '$2y$10$.4SQmEzdpy3UrrHlQX6oaOFGmvhW7HwRh0IyHnirTnSzqf9cOF/fq', 'Василий', 'Админский', 'Воротов', '2024-06-05 10:25:39'),
(31, 5, 'ksi@ksi.ru', '$2y$10$HwaQVpxAe3coXw7MFQHsyOcIj4cZYflcfrKHNaDpVq8dQjqncxtwe', 'Роб', 'Оствинцев', NULL, '2024-06-05 10:27:24'),
(32, 5, 'ki@yandex.ru', '$2y$10$hw3Ft8v6VT0l97ZaIqJqXe6oriOTJP1BbOl1o0qQ9A69PN2xdNe4y', 'Билл', 'Касл', NULL, '2024-06-05 10:28:44'),
(33, 5, 'ksi@ksi.ruo', '$2y$10$.YGCeRwM1iPlKWkwHTPFFuYqKWKeXvIhsaY72pPByCodczHCQGJD2', 'Холден', 'Колфилд', NULL, '2024-06-05 10:35:55'),
(34, 10, 'lara@lara', '$2y$10$/.MWED09xYxW4cOGQMZnUOBZ0HWLcGbPmEjM4TEyn63GERmxO/N5W', 'Лара', 'Крофт', NULL, '2024-06-05 10:54:49'),
(35, 5, 'ki@yandex.ruu', '$2y$10$TnbNCjyJ7GR/U6T2A7/dCOXyYF6k35EQ/9r4xtb1gn1C04W9riHmS', 'Кириней', 'Перов', 'Адольфович', '2024-06-05 11:15:47'),
(36, 20, 'kikue@yandex.ru', '$2y$10$rpYPBCj5fcnsVV0EvI6PqubIllfQilWYGn9ub5ZcsGQELdouzVIUG', 'Какёин', 'кёёёкёин', 'крыса', '2024-06-06 03:58:48'),
(37, 5, 'kn@kn', '$2y$10$8mgotCe.0w.I27vjNLpioOll68b2n/CBF62kavXQUuNc4Y9ixyDe6', 'Какёин', 'кёкёин', NULL, '2024-06-19 11:18:31');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `arhive`
--
ALTER TABLE `arhive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_message` (`id_message`);

--
-- Индексы таблицы `arhive_has_tags`
--
ALTER TABLE `arhive_has_tags`
  ADD KEY `id_arhive` (`id_arhive`),
  ADD KEY `id_tag` (`id_tag`);

--
-- Индексы таблицы `arhive_has_themes`
--
ALTER TABLE `arhive_has_themes`
  ADD KEY `id_arhive` (`id_arhive`),
  ADD KEY `id_theme` (`id_theme`);

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_msg` (`id_msg`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `message_add`
--
ALTER TABLE `message_add`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_message` (`id_message`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `message_has_files`
--
ALTER TABLE `message_has_files`
  ADD KEY `id_message` (`id_message`),
  ADD KEY `id_file` (`id_file`);

--
-- Индексы таблицы `msg_has_tags`
--
ALTER TABLE `msg_has_tags`
  ADD KEY `id_msg` (`id_msg`),
  ADD KEY `id_tag` (`id_tag`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `super_theme`
--
ALTER TABLE `super_theme`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `super_theme_has_theme`
--
ALTER TABLE `super_theme_has_theme`
  ADD KEY `id_super_theme` (`id_super_theme`),
  ADD KEY `id_theme` (`id_theme`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `arhive`
--
ALTER TABLE `arhive`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `img`
--
ALTER TABLE `img`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `message_add`
--
ALTER TABLE `message_add`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `super_theme`
--
ALTER TABLE `super_theme`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT для таблицы `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `arhive`
--
ALTER TABLE `arhive`
  ADD CONSTRAINT `arhive_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `arhive_ibfk_2` FOREIGN KEY (`id_message`) REFERENCES `message` (`id`);

--
-- Ограничения внешнего ключа таблицы `arhive_has_tags`
--
ALTER TABLE `arhive_has_tags`
  ADD CONSTRAINT `arhive_has_tags_ibfk_1` FOREIGN KEY (`id_arhive`) REFERENCES `arhive` (`id`),
  ADD CONSTRAINT `arhive_has_tags_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id`);

--
-- Ограничения внешнего ключа таблицы `arhive_has_themes`
--
ALTER TABLE `arhive_has_themes`
  ADD CONSTRAINT `arhive_has_themes_ibfk_1` FOREIGN KEY (`id_arhive`) REFERENCES `arhive` (`id`),
  ADD CONSTRAINT `arhive_has_themes_ibfk_2` FOREIGN KEY (`id_theme`) REFERENCES `themes` (`id`);

--
-- Ограничения внешнего ключа таблицы `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `img_ibfk_1` FOREIGN KEY (`id_msg`) REFERENCES `message` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `message_add`
--
ALTER TABLE `message_add`
  ADD CONSTRAINT `message_add_ibfk_1` FOREIGN KEY (`id_message`) REFERENCES `message` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_add_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `message_has_files`
--
ALTER TABLE `message_has_files`
  ADD CONSTRAINT `message_has_files_ibfk_1` FOREIGN KEY (`id_file`) REFERENCES `files` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_has_files_ibfk_2` FOREIGN KEY (`id_message`) REFERENCES `message` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `msg_has_tags`
--
ALTER TABLE `msg_has_tags`
  ADD CONSTRAINT `msg_has_tags_ibfk_1` FOREIGN KEY (`id_msg`) REFERENCES `message` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `msg_has_tags_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `super_theme_has_theme`
--
ALTER TABLE `super_theme_has_theme`
  ADD CONSTRAINT `super_theme_has_theme_ibfk_1` FOREIGN KEY (`id_super_theme`) REFERENCES `super_theme` (`id`),
  ADD CONSTRAINT `super_theme_has_theme_ibfk_2` FOREIGN KEY (`id_theme`) REFERENCES `themes` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
