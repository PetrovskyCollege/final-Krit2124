-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 16 2023 г., 20:54
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
-- База данных: `bestiary`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ability`
--

CREATE TABLE `ability` (
  `id` int NOT NULL,
  `description` text NOT NULL COMMENT 'Описание особенности',
  `id_npc` int NOT NULL COMMENT 'Существо, к которому оно привязано'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Таблица особенностей существа';

--
-- Дамп данных таблицы `ability`
--

INSERT INTO `ability` (`id`, `description`, `id_npc`) VALUES
(1, 'Перевёртыш. Квазит может Действием принять звериный облик, напоминающий летучую мышь (скорость 10 фт. летая 40 фт.), многоножку (40 фт., лазая 40 фт.), или жабу (40 фт., плавая 40 фт.), или принять свой истинный облик. Во всех обликах его характеристики остаются теми же самыми, исключая указанные изменения скорости. Всё несомое и носимое им снаряжение не превращается. Он принимает свой истинный облик, если умирает.', 1),
(2, 'Сопротивление магии. Квазит совершает с преимуществом спасброски от заклинаний и прочих магических эффектов.', 1),
(4, 'Осадное чудовище. Трент причиняет двойной урон предметам и строениям.', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `access_type`
--

CREATE TABLE `access_type` (
  `id` int NOT NULL,
  `type` varchar(63) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'Тип доступа пользователя (в коде используется id, это поле для пояснения)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Типы доступа пользователей';

--
-- Дамп данных таблицы `access_type`
--

INSERT INTO `access_type` (`id`, `type`) VALUES
(1, 'Администратор'),
(2, 'Пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `action`
--

CREATE TABLE `action` (
  `id` int NOT NULL,
  `description` text NOT NULL COMMENT 'Описание действия',
  `id_npc` int NOT NULL COMMENT 'Существо, к которому привязано действие'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Таблица действий существа';

--
-- Дамп данных таблицы `action`
--

INSERT INTO `action` (`id`, `description`, `id_npc`) VALUES
(1, 'Когти (в зверином облике Укус). Рукопашная атака оружием: +4 к попаданию, досягаемость 5 фт., одна цель. Попадание: Колющий урон 5 (1к4 + 3), и цель должна преуспеть в спасброске Телосложения со Сл 10, иначе получит урон ядом 5 (2к4) и станет отравленной на 1 минуту.\r\n\r\nЦель может повторять этот спасбросок в конце каждого своего хода, оканчивая эффект на себе при успехе.', 1),
(2, 'Испуг (1/день). Одно существо на выбор квазита в пределах 20 футов от него должно преуспеть в спасброске Мудрости Сл 10, иначе станет испуганным на 1 минуту. Цель может повторять этот спасбросок в конце каждого своего хода, с помехой, если квазит находится в пределах линии обзора, оканчивая эффект на себе при успехе.', 1),
(12, 'Невидимость. Квазит магическим образом становится невидимым, пока не атакует или не использует Испуг, или пока не окончится его концентрация (как при концентрации на заклинании). Все снаряжение, которое квазит несет или носит, становится невидимым вместе с ним.', 1),
(13, 'Мультиатака.\r\nТрент совершает два Размашистых удара.', 3),
(14, 'Размашистый удар.\r\nРукопашная атака оружием: +10 к попаданию, досягаемость 5 фт., одна цель. Попадание: Дробящий урон 16 (3к6 + 6).', 3),
(15, 'Камень.\r\nДальнобойная атака оружием: +10 к попаданию, дистанция 60/180 фт., одна цель. Попадание: Дробящий урон 28 (4к10 + 6).', 3),
(16, 'Оживление деревьев (1/день).\r\nТрент магическим образом оживляет до двух деревьев, которые видит в пределах 60 футов от себя. Деревья обладают статистикой трента, за исключением того, что у них Интеллект 1 и Харизма 1, они не могут говорить, и у них только один вариант действия — Размашистый удар.\r\nОживлённые деревья действуют как союзники трента. Дерево перестаёт быть живым через 1 день, когда умирает, когда трент умирает или отдаляется от него более чем на 120 футов, а также когда трент бонусным действием снова делает его неживым. Став снова неживым, дерево, при возможности, пускает корни.', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `characteristic_for_saving_throw`
--

CREATE TABLE `characteristic_for_saving_throw` (
  `id` int NOT NULL,
  `characteristic` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Характеристики для спасбросков';

--
-- Дамп данных таблицы `characteristic_for_saving_throw`
--

INSERT INTO `characteristic_for_saving_throw` (`id`, `characteristic`) VALUES
(1, 'Сила'),
(2, 'Ловкость'),
(3, 'Телосложение'),
(4, 'Интеллект'),
(5, 'Мудрость'),
(6, 'Харизма');

-- --------------------------------------------------------

--
-- Структура таблицы `condition_type`
--

CREATE TABLE `condition_type` (
  `id` int NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Возможные состояния существ';

--
-- Дамп данных таблицы `condition_type`
--

INSERT INTO `condition_type` (`id`, `type`) VALUES
(1, 'Ослепление'),
(2, 'Очарование'),
(3, 'Глухота'),
(4, 'Истощение'),
(5, 'Испуг'),
(6, 'Захват'),
(7, 'Паралич'),
(8, 'Окаменение'),
(9, 'Отравление'),
(10, 'Сбивание с ног'),
(11, 'Опутанность'),
(12, 'Ошеломление'),
(13, 'Бессознательность');

-- --------------------------------------------------------

--
-- Структура таблицы `damage_type`
--

CREATE TABLE `damage_type` (
  `id` int NOT NULL,
  `type` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Типы урона';

--
-- Дамп данных таблицы `damage_type`
--

INSERT INTO `damage_type` (`id`, `type`) VALUES
(1, 'Огонь'),
(2, 'Холод'),
(3, 'Электричество'),
(4, 'Яд'),
(5, 'Кислота'),
(6, 'Звук'),
(7, 'Некротическая энергия'),
(8, 'Психическая энергия'),
(9, 'Дробящий'),
(10, 'Рубящий'),
(11, 'Колющий'),
(12, 'Силовой'),
(13, 'Излучение');

-- --------------------------------------------------------

--
-- Структура таблицы `description`
--

CREATE TABLE `description` (
  `id` int NOT NULL,
  `description` text NOT NULL COMMENT 'Описание существа',
  `id_npc` int NOT NULL COMMENT 'Существо, к которому привязано описание'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Описание существа';

--
-- Дамп данных таблицы `description`
--

INSERT INTO `description` (`id`, `description`, `id_npc`) VALUES
(1, 'Квазиты водятся на Нижних Планах. Физически слабые, они держатся в тени, чтобы плести интриги и ложь. Более мощные демоны используют квазитов для почтовых пересылок и шпионажа, когда не пожирают их и не растаскивают их друг от друга, чтобы скоротать время. Квазит может предстать в животном облике, но в истинном виде он выглядит как 2-футовый зелёный гуманоид с колючим хвостом и рогами. Когти на руках и ногах квазита содержат раздражающий яд. Нападая, он предпочитает быть невидимым.', 1),
(2, 'Тренты — пробудившиеся деревья, живущие в древних лесах. Они предпочитают проводить дни, недели и годы в тихих раздумьях, но яростно обороняют свои лесные владения от внешних угроз.', 3),
(3, 'Спящее дерево пробуждается. Дерево, которому суждено стать трентом, в течение многих сезонов находится в медитативном состоянии, живя десятки или даже сотни лет, и лишь потом осознавая свой потенциал. Деревья пробуждаются только при особых обстоятельствах, и только в насыщенных природной магией местах. Тренты и могущественные друиды чувствуют, когда у дерева есть искра потенциала для пробуждения, и защищают такие деревья в потаённых рощах, пока момент пробуждения не наступит. В течение длительного процесса пробуждения на коре дерева проступают черты лица, нижняя часть ствола раздваивается, формируя ноги, а длинные ветви сгибаются вниз, становясь руками. Когда дерево готово, оно высвобождает свои ноги из земли и присоединяется к товарищам в охране своего лесного дома.', 3),
(4, 'Легендарные стражи. После пробуждения трент продолжает расти точно так же, как когда он был обычным деревом. Пробудившиеся из самых крупных деревьев тренты могут достигать неимоверных размеров и развивать внутренние магические способности по управлению растениями и животными. Такие тренты могут оживлять растения, используя их как ловушки и силки против незваных гостей. Они могут призывать диких животных как помощников, или чтобы те переносили сообщения на дальние расстояния.', 3),
(5, 'Защитники дикой природы. Даже после пробуждения тренты проводят значительную часть времени как обычные деревья. Укоренившийся в одном месте трент по-прежнему остаётся в курсе того, что его окружает, и может воспринимать эффекты происходящих на расстоянии многих миль от него событий, исходя из незначительных изменений окружающей трента местности.', 3),
(6, 'Дровосеки, которые стараются не рубить здоровые живые деревья, и охотники, получающие от леса только необходимое, вряд ли вызовут гнев трента. А вот беспечно обращающиеся с огнём существа, те, кто отравляют лес, и кто уничтожает большие деревья, особенно если те близки к пробуждению, почувствуют на себе ярость трента.', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `habitat_type`
--

CREATE TABLE `habitat_type` (
  `id` int NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Виды мест обитания существ';

--
-- Дамп данных таблицы `habitat_type`
--

INSERT INTO `habitat_type` (`id`, `type`) VALUES
(1, 'Полярная тундра'),
(2, 'Побережье'),
(3, 'Под водой'),
(4, 'Равнина/луг'),
(5, 'Подземелье'),
(6, 'Город'),
(7, 'Деревня'),
(8, 'Руины'),
(9, 'Лес'),
(10, 'Холмы'),
(11, 'Горы'),
(12, 'Болото'),
(13, 'Пустыня'),
(14, 'Тропики'),
(15, 'Нижние планы'),
(16, 'Верхние планы');

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE `language` (
  `id` int NOT NULL,
  `name` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Виды внутриигровых языков';

--
-- Дамп данных таблицы `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(1, 'Общий'),
(2, 'Великаний'),
(3, 'Гномий'),
(4, 'Гоблинский'),
(5, 'Дварфский'),
(6, 'Орочий'),
(7, 'Полуросликов'),
(8, 'Эльфийский'),
(9, 'Бездны'),
(10, 'Глубинная речь'),
(11, 'Драконий'),
(12, 'Инфернальный'),
(13, 'Небесный'),
(14, 'Первичный'),
(15, 'Акван'),
(16, 'Ауран'),
(17, 'Игнан'),
(18, 'Терран'),
(19, 'Подземный'),
(20, 'Сильван'),
(21, 'Воровской жаргон'),
(22, 'Друидический язык');

-- --------------------------------------------------------

--
-- Структура таблицы `legendary_action`
--

CREATE TABLE `legendary_action` (
  `id` int NOT NULL,
  `description` text NOT NULL COMMENT 'Описание легендарного действия существа',
  `id_npc` int NOT NULL COMMENT 'Существо, к которому привязано легендарное действие'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Таблица легендарных действий существа';

-- --------------------------------------------------------

--
-- Структура таблицы `list_of_favorite_npc`
--

CREATE TABLE `list_of_favorite_npc` (
  `id` int NOT NULL,
  `id_npc` int NOT NULL,
  `id_user` int NOT NULL,
  `created_at` date NOT NULL COMMENT 'Дата добавления в список избранных'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Список избранных существ';

-- --------------------------------------------------------

--
-- Структура таблицы `npc`
--

CREATE TABLE `npc` (
  `id` int NOT NULL,
  `name_ru` varchar(63) NOT NULL COMMENT 'Название существа на русском',
  `name_eng` varchar(63) NOT NULL COMMENT 'Название существа на английском',
  `image` varchar(255) DEFAULT NULL COMMENT 'Ссылка на изображение',
  `danger_level` varchar(7) NOT NULL COMMENT 'Уровень опасности',
  `armor_class` int NOT NULL COMMENT 'Класс брони',
  `average_hits` int NOT NULL COMMENT 'Среднее количество хитов',
  `hit_dice_amount` int NOT NULL COMMENT 'Количество костей хитов',
  `hit_dice_type` int NOT NULL COMMENT 'Тип костей хитов (4, 6, 8, 10, 12, 20)',
  `hit_dice_modifier` int NOT NULL COMMENT 'Модификатор хитов (бонус к броску костей хитов)',
  `skill_bonus` int NOT NULL COMMENT 'Бонус мастерства',
  `strength` int NOT NULL COMMENT 'Значение силы',
  `dexterity` int NOT NULL COMMENT 'Значение ловкости',
  `constitution` int NOT NULL COMMENT 'Значение телосложения',
  `intelligence` int NOT NULL COMMENT 'Значение интеллекта',
  `wisdom` int NOT NULL COMMENT 'Значение мудрости',
  `charisma` int NOT NULL COMMENT 'Значение харизмы',
  `id_size` int NOT NULL COMMENT 'Размер',
  `id_species` int NOT NULL COMMENT 'Вид',
  `id_subspecies` int DEFAULT NULL COMMENT 'Подвид',
  `id_worldview` int NOT NULL COMMENT 'Мировоззрение',
  `id_created_by` int DEFAULT NULL COMMENT 'Создатель (пользователь)',
  `is_approved_by_admin` bit(1) NOT NULL COMMENT 'Должно ли отображаться существо только при выборе пользовательских существ',
  `is_named` bit(1) NOT NULL COMMENT 'Является ли существо именованным'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Существа';

--
-- Дамп данных таблицы `npc`
--

INSERT INTO `npc` (`id`, `name_ru`, `name_eng`, `image`, `danger_level`, `armor_class`, `average_hits`, `hit_dice_amount`, `hit_dice_type`, `hit_dice_modifier`, `skill_bonus`, `strength`, `dexterity`, `constitution`, `intelligence`, `wisdom`, `charisma`, `id_size`, `id_species`, `id_subspecies`, `id_worldview`, `id_created_by`, `is_approved_by_admin`, `is_named`) VALUES
(1, 'Квазит', 'Quasit', 'https://img.ttg.club/creatures/Quasit.webp', '1', 13, 7, 3, 4, 0, 2, 5, 17, 10, 7, 10, 10, 1, 8, 31, 9, 1, b'1', b'0'),
(2, 'Аспект Тиамат', 'Aspect of Tiamat', 'https://img.ttg.club/creatures/aspect_of_tiamat.webp', '30', 13, 574, 28, 20, 280, 9, 30, 14, 30, 21, 20, 26, 6, 5, 25, 9, NULL, b'1', b'0'),
(3, 'Трент', 'Treant', 'https://img.ttg.club/creatures/Treant.webp', '9', 16, 138, 12, 12, 60, 4, 23, 8, 21, 12, 16, 12, 5, 12, 24, 3, 2, b'1', b'0');

-- --------------------------------------------------------

--
-- Структура таблицы `npc_has_condition_immunity`
--

CREATE TABLE `npc_has_condition_immunity` (
  `id` int NOT NULL,
  `id_npc` int NOT NULL,
  `id_condition_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `npc_has_condition_immunity`
--

INSERT INTO `npc_has_condition_immunity` (`id`, `id_npc`, `id_condition_type`) VALUES
(1, 1, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `npc_has_damage_immunity`
--

CREATE TABLE `npc_has_damage_immunity` (
  `id` int NOT NULL,
  `id_npc` int NOT NULL,
  `id_damage_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Таблица, хранящая иммунитеты существ к определённому урону';

--
-- Дамп данных таблицы `npc_has_damage_immunity`
--

INSERT INTO `npc_has_damage_immunity` (`id`, `id_npc`, `id_damage_type`) VALUES
(1, 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `npc_has_damage_resistance`
--

CREATE TABLE `npc_has_damage_resistance` (
  `id` int NOT NULL,
  `id_npc` int NOT NULL,
  `id_damage_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Таблица, хранящая устойчивости существ к определённому урону';

--
-- Дамп данных таблицы `npc_has_damage_resistance`
--

INSERT INTO `npc_has_damage_resistance` (`id`, `id_npc`, `id_damage_type`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 9),
(5, 1, 10),
(6, 1, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `npc_has_damage_vulnerability`
--

CREATE TABLE `npc_has_damage_vulnerability` (
  `id` int NOT NULL,
  `id_npc` int NOT NULL,
  `id_damage_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Таблица, хранящая уязвимости существ к определённому урону';

--
-- Дамп данных таблицы `npc_has_damage_vulnerability`
--

INSERT INTO `npc_has_damage_vulnerability` (`id`, `id_npc`, `id_damage_type`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `npc_has_habitat`
--

CREATE TABLE `npc_has_habitat` (
  `id` int NOT NULL,
  `id_npc` int NOT NULL,
  `id_habitat_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Таблица, хранящая места обитания существ';

--
-- Дамп данных таблицы `npc_has_habitat`
--

INSERT INTO `npc_has_habitat` (`id`, `id_npc`, `id_habitat_type`) VALUES
(1, 1, 15),
(2, 3, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `npc_has_language`
--

CREATE TABLE `npc_has_language` (
  `id` int NOT NULL,
  `id_npc` int NOT NULL,
  `id_language` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Таблица, хранящая языки, которыми обладают существа';

--
-- Дамп данных таблицы `npc_has_language`
--

INSERT INTO `npc_has_language` (`id`, `id_npc`, `id_language`) VALUES
(1, 1, 1),
(2, 1, 12),
(3, 3, 22),
(4, 3, 1),
(5, 3, 20),
(6, 3, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `npc_has_saving_throw`
--

CREATE TABLE `npc_has_saving_throw` (
  `id` int NOT NULL,
  `id_npc` int NOT NULL,
  `id_characteristic` int NOT NULL,
  `multiplier` double NOT NULL COMMENT 'Модификатор спасброска (значение, на которое умножается бонус мастерства)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Таблица, показывающая владения спасбросками существ';

-- --------------------------------------------------------

--
-- Структура таблицы `npc_has_sense`
--

CREATE TABLE `npc_has_sense` (
  `id` int NOT NULL,
  `id_npc` int NOT NULL,
  `id_sense_type` int NOT NULL,
  `distance` int NOT NULL COMMENT 'Дистанция действия чувства'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Таблица, показывающая чувства существ';

--
-- Дамп данных таблицы `npc_has_sense`
--

INSERT INTO `npc_has_sense` (`id`, `id_npc`, `id_sense_type`, `distance`) VALUES
(1, 1, 1, 120);

-- --------------------------------------------------------

--
-- Структура таблицы `npc_has_skill`
--

CREATE TABLE `npc_has_skill` (
  `id` int NOT NULL,
  `id_npc` int NOT NULL,
  `id_skill_type` int NOT NULL,
  `multiplier` double NOT NULL COMMENT 'Модификатор навыка (значение, на которое умножается бонус мастерства)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Таблица, показывающая владения навыками существ';

--
-- Дамп данных таблицы `npc_has_skill`
--

INSERT INTO `npc_has_skill` (`id`, `id_npc`, `id_skill_type`, `multiplier`) VALUES
(1, 1, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `npc_has_speed`
--

CREATE TABLE `npc_has_speed` (
  `id` int NOT NULL,
  `id_npc` int NOT NULL,
  `id_speed_type` int NOT NULL,
  `value` int NOT NULL COMMENT 'Скорость'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Таблица, хранящая скорости существ';

--
-- Дамп данных таблицы `npc_has_speed`
--

INSERT INTO `npc_has_speed` (`id`, `id_npc`, `id_speed_type`, `value`) VALUES
(1, 1, 6, 40),
(4, 3, 6, 30);

-- --------------------------------------------------------

--
-- Структура таблицы `sense_type`
--

CREATE TABLE `sense_type` (
  `id` int NOT NULL,
  `type` varchar(31) NOT NULL COMMENT 'Название чувства'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Типы чувств существ';

--
-- Дамп данных таблицы `sense_type`
--

INSERT INTO `sense_type` (`id`, `type`) VALUES
(1, 'Тёмное зрение'),
(2, 'Истинное зрение'),
(3, 'Слепое зрение'),
(4, 'Чувство вибрации');

-- --------------------------------------------------------

--
-- Структура таблицы `size_type`
--

CREATE TABLE `size_type` (
  `id` int NOT NULL,
  `type` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Типы размеров существ';

--
-- Дамп данных таблицы `size_type`
--

INSERT INTO `size_type` (`id`, `type`) VALUES
(1, 'Крошечный'),
(2, 'Маленький'),
(3, 'Средний'),
(4, 'Большой'),
(5, 'Огромный'),
(6, 'Громадный');

-- --------------------------------------------------------

--
-- Структура таблицы `skill_type`
--

CREATE TABLE `skill_type` (
  `id` int NOT NULL,
  `type` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Навыки';

--
-- Дамп данных таблицы `skill_type`
--

INSERT INTO `skill_type` (`id`, `type`) VALUES
(1, 'Атлетика'),
(2, 'Акробатика'),
(3, 'Ловкость рук'),
(4, 'Скрытность'),
(5, 'История'),
(6, 'Магия'),
(7, 'Природа'),
(8, 'Расследование'),
(9, 'Религия'),
(10, 'Восприятие'),
(11, 'Выживание'),
(12, 'Медицина'),
(13, 'Проницательность'),
(14, 'Уход за животными'),
(15, 'Выступление'),
(16, 'Запугивание'),
(17, 'Обман'),
(18, 'Убеждение');

-- --------------------------------------------------------

--
-- Структура таблицы `species_type`
--

CREATE TABLE `species_type` (
  `id` int NOT NULL,
  `type` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Виды существ';

--
-- Дамп данных таблицы `species_type`
--

INSERT INTO `species_type` (`id`, `type`) VALUES
(1, 'Абберация'),
(2, 'Зверь'),
(3, 'Небожитель'),
(4, 'Конструкт'),
(5, 'Дракон'),
(6, 'Элементаль'),
(7, 'Фея'),
(8, 'Исчадие'),
(9, 'Великан'),
(10, 'Гуманоид'),
(11, 'Монстр'),
(12, 'Растение'),
(13, 'Нежить'),
(14, 'Слизь'),
(15, 'Стая'),
(16, 'Объект'),
(17, 'Транспорт');

-- --------------------------------------------------------

--
-- Структура таблицы `speed_type`
--

CREATE TABLE `speed_type` (
  `id` int NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Способы перемещения существ';

--
-- Дамп данных таблицы `speed_type`
--

INSERT INTO `speed_type` (`id`, `type`) VALUES
(1, 'Летает'),
(2, 'Парит'),
(3, 'Лазает'),
(4, 'Плавает'),
(5, 'Копает'),
(6, 'Ходит');

-- --------------------------------------------------------

--
-- Структура таблицы `subspecies_type`
--

CREATE TABLE `subspecies_type` (
  `id` int NOT NULL,
  `id_species` int DEFAULT NULL COMMENT 'Вид, к которому привязан подвид',
  `type` varchar(63) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Подвиды существ';

--
-- Дамп данных таблицы `subspecies_type`
--

INSERT INTO `subspecies_type` (`id`, `id_species`, `type`) VALUES
(24, NULL, 'Без подвида'),
(25, 5, 'Цветной'),
(26, 5, 'Металлический'),
(27, 5, 'Самоцветный'),
(28, 8, 'Дьявол'),
(29, 8, 'Архидьявол'),
(30, 8, 'Юголот'),
(31, 8, 'Демон'),
(32, 8, 'Демонический повелитель'),
(33, 9, 'Титан'),
(34, 9, 'Тролль'),
(35, 10, 'Человек'),
(36, 10, 'Эльф'),
(37, 10, 'Драконорожденый'),
(38, 10, 'Гит'),
(39, 10, 'Дварф'),
(40, 10, 'Гнолл'),
(41, 10, 'Гном'),
(42, 10, 'Голиаф'),
(43, 10, 'Дженази'),
(44, 11, 'Титан'),
(45, 11, 'Крутик'),
(46, 12, 'Миконид'),
(48, 1, 'Иллитид');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(63) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(127) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(63) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` date DEFAULT NULL COMMENT 'Дата создания аккаунта',
  `id_access_type` int DEFAULT NULL COMMENT 'Тип доступа пользователя',
  `auth_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `access_token` varchar(31) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Таблица пользователей';

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `created_at`, `id_access_type`, `auth_key`, `access_token`) VALUES
(1, 'admin', 'admin@email', '81dc9bdb52d04dc20036dbd8313ed055', '2023-11-02', 1, '', NULL),
(2, 'user1', 'user@email', '81dc9bdb52d04dc20036dbd8313ed055', '2023-11-02', 2, '', NULL),
(24, 'user2', 'user2@email', '81dc9bdb52d04dc20036dbd8313ed055', '2023-11-13', 2, 'cFvvOj2O8voR0XcfOvrmn3_46exvLEqe', NULL),
(25, 'user3', 'user3@email', '81dc9bdb52d04dc20036dbd8313ed055', '2023-11-13', 2, 'Sj9DFMuVorLOSq19DRo77i8WUfG8GTqv', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `worldview_type`
--

CREATE TABLE `worldview_type` (
  `id` int NOT NULL,
  `type` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Мировоззрения существ';

--
-- Дамп данных таблицы `worldview_type`
--

INSERT INTO `worldview_type` (`id`, `type`) VALUES
(1, 'Законопослушно-добрый'),
(2, 'Нейтрально-добрый'),
(3, 'Хаотично-добрый'),
(4, 'Законопослушно-нейтральный'),
(5, 'Нейтральный'),
(6, 'Хаотично-нейтральный'),
(7, 'Законопослушно-злой'),
(8, 'Нейтрально-злой'),
(9, 'Хаотично-злой'),
(10, 'Без мировоззрения');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ability`
--
ALTER TABLE `ability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ability_ibfk_1` (`id_npc`);

--
-- Индексы таблицы `access_type`
--
ALTER TABLE `access_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `action_ibfk_1` (`id_npc`);

--
-- Индексы таблицы `characteristic_for_saving_throw`
--
ALTER TABLE `characteristic_for_saving_throw`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `condition_type`
--
ALTER TABLE `condition_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `damage_type`
--
ALTER TABLE `damage_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_npc` (`id_npc`);

--
-- Индексы таблицы `habitat_type`
--
ALTER TABLE `habitat_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `legendary_action`
--
ALTER TABLE `legendary_action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_npc` (`id_npc`);

--
-- Индексы таблицы `list_of_favorite_npc`
--
ALTER TABLE `list_of_favorite_npc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_npc` (`id_npc`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `npc`
--
ALTER TABLE `npc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_created_by` (`id_created_by`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_species` (`id_species`),
  ADD KEY `id_subspecies` (`id_subspecies`),
  ADD KEY `id_worldview` (`id_worldview`);

--
-- Индексы таблицы `npc_has_condition_immunity`
--
ALTER TABLE `npc_has_condition_immunity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_npc` (`id_npc`),
  ADD KEY `id_condition_type` (`id_condition_type`);

--
-- Индексы таблицы `npc_has_damage_immunity`
--
ALTER TABLE `npc_has_damage_immunity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_damage_type` (`id_damage_type`),
  ADD KEY `id_npc` (`id_npc`);

--
-- Индексы таблицы `npc_has_damage_resistance`
--
ALTER TABLE `npc_has_damage_resistance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_damage_type` (`id_damage_type`),
  ADD KEY `id_npc` (`id_npc`);

--
-- Индексы таблицы `npc_has_damage_vulnerability`
--
ALTER TABLE `npc_has_damage_vulnerability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_damage_type` (`id_damage_type`),
  ADD KEY `id_npc` (`id_npc`);

--
-- Индексы таблицы `npc_has_habitat`
--
ALTER TABLE `npc_has_habitat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_habitat_type` (`id_habitat_type`),
  ADD KEY `id_npc` (`id_npc`);

--
-- Индексы таблицы `npc_has_language`
--
ALTER TABLE `npc_has_language`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_language` (`id_language`),
  ADD KEY `id_npc` (`id_npc`);

--
-- Индексы таблицы `npc_has_saving_throw`
--
ALTER TABLE `npc_has_saving_throw`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_characteristic` (`id_characteristic`),
  ADD KEY `id_npc` (`id_npc`);

--
-- Индексы таблицы `npc_has_sense`
--
ALTER TABLE `npc_has_sense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sense_type` (`id_sense_type`),
  ADD KEY `id_npc` (`id_npc`);

--
-- Индексы таблицы `npc_has_skill`
--
ALTER TABLE `npc_has_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_npc` (`id_npc`),
  ADD KEY `id_skill_type` (`id_skill_type`);

--
-- Индексы таблицы `npc_has_speed`
--
ALTER TABLE `npc_has_speed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_npc` (`id_npc`),
  ADD KEY `id_speed_type` (`id_speed_type`);

--
-- Индексы таблицы `sense_type`
--
ALTER TABLE `sense_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `size_type`
--
ALTER TABLE `size_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `skill_type`
--
ALTER TABLE `skill_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `species_type`
--
ALTER TABLE `species_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `speed_type`
--
ALTER TABLE `speed_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subspecies_type`
--
ALTER TABLE `subspecies_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_species` (`id_species`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_access_type` (`id_access_type`);

--
-- Индексы таблицы `worldview_type`
--
ALTER TABLE `worldview_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ability`
--
ALTER TABLE `ability`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `access_type`
--
ALTER TABLE `access_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `action`
--
ALTER TABLE `action`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `characteristic_for_saving_throw`
--
ALTER TABLE `characteristic_for_saving_throw`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `condition_type`
--
ALTER TABLE `condition_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `damage_type`
--
ALTER TABLE `damage_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `description`
--
ALTER TABLE `description`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `habitat_type`
--
ALTER TABLE `habitat_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `language`
--
ALTER TABLE `language`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `legendary_action`
--
ALTER TABLE `legendary_action`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `list_of_favorite_npc`
--
ALTER TABLE `list_of_favorite_npc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `npc`
--
ALTER TABLE `npc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `npc_has_condition_immunity`
--
ALTER TABLE `npc_has_condition_immunity`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `npc_has_damage_immunity`
--
ALTER TABLE `npc_has_damage_immunity`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `npc_has_damage_resistance`
--
ALTER TABLE `npc_has_damage_resistance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `npc_has_damage_vulnerability`
--
ALTER TABLE `npc_has_damage_vulnerability`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `npc_has_habitat`
--
ALTER TABLE `npc_has_habitat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `npc_has_language`
--
ALTER TABLE `npc_has_language`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `npc_has_saving_throw`
--
ALTER TABLE `npc_has_saving_throw`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `npc_has_sense`
--
ALTER TABLE `npc_has_sense`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `npc_has_skill`
--
ALTER TABLE `npc_has_skill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `npc_has_speed`
--
ALTER TABLE `npc_has_speed`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `sense_type`
--
ALTER TABLE `sense_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `size_type`
--
ALTER TABLE `size_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `skill_type`
--
ALTER TABLE `skill_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `species_type`
--
ALTER TABLE `species_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `speed_type`
--
ALTER TABLE `speed_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `subspecies_type`
--
ALTER TABLE `subspecies_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `worldview_type`
--
ALTER TABLE `worldview_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ability`
--
ALTER TABLE `ability`
  ADD CONSTRAINT `ability_ibfk_1` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `description`
--
ALTER TABLE `description`
  ADD CONSTRAINT `description_ibfk_1` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `legendary_action`
--
ALTER TABLE `legendary_action`
  ADD CONSTRAINT `legendary_action_ibfk_1` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `list_of_favorite_npc`
--
ALTER TABLE `list_of_favorite_npc`
  ADD CONSTRAINT `list_of_favorite_npc_ibfk_1` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `list_of_favorite_npc_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `npc`
--
ALTER TABLE `npc`
  ADD CONSTRAINT `npc_ibfk_1` FOREIGN KEY (`id_created_by`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `npc_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `size_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `npc_ibfk_3` FOREIGN KEY (`id_species`) REFERENCES `species_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `npc_ibfk_4` FOREIGN KEY (`id_subspecies`) REFERENCES `subspecies_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `npc_ibfk_5` FOREIGN KEY (`id_worldview`) REFERENCES `worldview_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `npc_has_condition_immunity`
--
ALTER TABLE `npc_has_condition_immunity`
  ADD CONSTRAINT `npc_has_condition_immunity_ibfk_1` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `npc_has_condition_immunity_ibfk_2` FOREIGN KEY (`id_condition_type`) REFERENCES `condition_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `npc_has_damage_immunity`
--
ALTER TABLE `npc_has_damage_immunity`
  ADD CONSTRAINT `npc_has_damage_immunity_ibfk_1` FOREIGN KEY (`id_damage_type`) REFERENCES `damage_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `npc_has_damage_immunity_ibfk_2` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `npc_has_damage_resistance`
--
ALTER TABLE `npc_has_damage_resistance`
  ADD CONSTRAINT `npc_has_damage_resistance_ibfk_1` FOREIGN KEY (`id_damage_type`) REFERENCES `damage_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `npc_has_damage_resistance_ibfk_2` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `npc_has_damage_vulnerability`
--
ALTER TABLE `npc_has_damage_vulnerability`
  ADD CONSTRAINT `npc_has_damage_vulnerability_ibfk_1` FOREIGN KEY (`id_damage_type`) REFERENCES `damage_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `npc_has_damage_vulnerability_ibfk_2` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `npc_has_habitat`
--
ALTER TABLE `npc_has_habitat`
  ADD CONSTRAINT `npc_has_habitat_ibfk_1` FOREIGN KEY (`id_habitat_type`) REFERENCES `habitat_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `npc_has_habitat_ibfk_2` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `npc_has_language`
--
ALTER TABLE `npc_has_language`
  ADD CONSTRAINT `npc_has_language_ibfk_1` FOREIGN KEY (`id_language`) REFERENCES `language` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `npc_has_language_ibfk_2` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `npc_has_saving_throw`
--
ALTER TABLE `npc_has_saving_throw`
  ADD CONSTRAINT `npc_has_saving_throw_ibfk_1` FOREIGN KEY (`id_characteristic`) REFERENCES `characteristic_for_saving_throw` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `npc_has_saving_throw_ibfk_2` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `npc_has_sense`
--
ALTER TABLE `npc_has_sense`
  ADD CONSTRAINT `npc_has_sense_ibfk_1` FOREIGN KEY (`id_sense_type`) REFERENCES `sense_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `npc_has_sense_ibfk_2` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `npc_has_skill`
--
ALTER TABLE `npc_has_skill`
  ADD CONSTRAINT `npc_has_skill_ibfk_1` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `npc_has_skill_ibfk_2` FOREIGN KEY (`id_skill_type`) REFERENCES `skill_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `npc_has_speed`
--
ALTER TABLE `npc_has_speed`
  ADD CONSTRAINT `npc_has_speed_ibfk_1` FOREIGN KEY (`id_npc`) REFERENCES `npc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `npc_has_speed_ibfk_2` FOREIGN KEY (`id_speed_type`) REFERENCES `speed_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `subspecies_type`
--
ALTER TABLE `subspecies_type`
  ADD CONSTRAINT `subspecies_type_ibfk_1` FOREIGN KEY (`id_species`) REFERENCES `species_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_access_type`) REFERENCES `access_type` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
