-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: mysql:3306
-- Время создания: Дек 10 2021 г., 11:04
-- Версия сервера: 8.0.26
-- Версия PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phpmotors`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used');

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `clientId` int UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(44, 'Administrator', 'Admin', 'admin@cse340.net', '$2y$10$StTt2p3UJidz0W7.XFp1buxH5q9WbqPRgze/OoEU6McEqFh4/64DK', '3', NULL),
(51, 'Jake', 'Madsen', 'jm@gmail.com', '$2y$10$Rjt9/DIFczLS7tuSe72FjOrW7BH6rPBsDbxRmsX9fe8bQL/WuhnyG', '1', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `imgId` int NOT NULL,
  `invId` int NOT NULL,
  `imgName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgPath` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imgPrimary` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`, `imgPrimary`) VALUES
(21, 3, 'adventador.jpg', '/phpmotors/images/vehicles/adventador.jpg', '2021-11-24 12:19:12', 1),
(22, 3, 'adventador-tn.jpg', '/phpmotors/images/vehicles/adventador-tn.jpg', '2021-11-24 12:19:12', 1),
(23, 13, 'aerocar.jpg', '/phpmotors/images/vehicles/aerocar.jpg', '2021-11-24 12:20:11', 1),
(24, 13, 'aerocar-tn.jpg', '/phpmotors/images/vehicles/aerocar-tn.jpg', '2021-11-24 12:20:11', 1),
(25, 6, 'bat.jpg', '/phpmotors/images/vehicles/bat.jpg', '2021-11-24 12:20:26', 1),
(26, 6, 'bat-tn.jpg', '/phpmotors/images/vehicles/bat-tn.jpg', '2021-11-24 12:20:26', 1),
(27, 10, 'camaro.jpg', '/phpmotors/images/vehicles/camaro.jpg', '2021-11-24 12:20:40', 1),
(28, 10, 'camaro-tn.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', '2021-11-24 12:20:40', 1),
(29, 9, 'crown-vic.jpg', '/phpmotors/images/vehicles/crown-vic.jpg', '2021-11-24 12:20:51', 1),
(30, 9, 'crown-vic-tn.jpg', '/phpmotors/images/vehicles/crown-vic-tn.jpg', '2021-11-24 12:20:51', 1),
(33, 11, 'escalade.jpg', '/phpmotors/images/vehicles/escalade.jpg', '2021-11-24 12:21:26', 1),
(34, 11, 'escalade-tn.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '2021-11-24 12:21:26', 1),
(35, 8, 'fire-truck.jpg', '/phpmotors/images/vehicles/fire-truck.jpg', '2021-11-24 12:21:44', 1),
(36, 8, 'fire-truck-tn.jpg', '/phpmotors/images/vehicles/fire-truck-tn.jpg', '2021-11-24 12:21:44', 1),
(37, 2, 'ford-modelt.jpg', '/phpmotors/images/vehicles/ford-modelt.jpg', '2021-11-24 12:21:55', 1),
(38, 2, 'ford-modelt-tn.jpg', '/phpmotors/images/vehicles/ford-modelt-tn.jpg', '2021-11-24 12:21:55', 1),
(39, 12, 'hummer.jpg', '/phpmotors/images/vehicles/hummer.jpg', '2021-11-24 12:22:12', 1),
(40, 12, 'hummer-tn.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '2021-11-24 12:22:12', 1),
(41, 1, 'jeep-wrangler.jpg', '/phpmotors/images/vehicles/jeep-wrangler.jpg', '2021-11-24 12:22:25', 1),
(42, 1, 'jeep-wrangler-tn.jpg', '/phpmotors/images/vehicles/jeep-wrangler-tn.jpg', '2021-11-24 12:22:25', 1),
(43, 7, 'mm.jpg', '/phpmotors/images/vehicles/mm.jpg', '2021-11-24 12:22:48', 1),
(44, 7, 'mm-tn.jpg', '/phpmotors/images/vehicles/mm-tn.jpg', '2021-11-24 12:22:48', 1),
(45, 4, 'monster.jpg', '/phpmotors/images/vehicles/monster.jpg', '2021-11-24 12:23:00', 1),
(46, 4, 'monster-tn.jpg', '/phpmotors/images/vehicles/monster-tn.jpg', '2021-11-24 12:23:00', 1),
(47, 5, 'ms.jpg', '/phpmotors/images/vehicles/ms.jpg', '2021-11-24 12:23:13', 1),
(48, 5, 'ms-tn.jpg', '/phpmotors/images/vehicles/ms-tn.jpg', '2021-11-24 12:23:13', 1),
(49, 14, 'van.jpg', '/phpmotors/images/vehicles/van.jpg', '2021-11-24 12:23:43', 1),
(50, 14, 'van-tn.jpg', '/phpmotors/images/vehicles/van-tn.jpg', '2021-11-24 12:23:43', 1),
(55, 15, 'no-image.png', '/phpmotors/images/vehicles/no-image.png', '2021-11-24 12:34:20', 1),
(56, 15, 'no-image-tn.png', '/phpmotors/images/vehicles/no-image-tn.png', '2021-11-24 12:34:20', 1),
(57, 3, 'adventador2.jpg', '/phpmotors/images/vehicles/adventador2.jpg', '2021-11-24 12:41:12', 0),
(58, 3, 'adventador2-tn.jpg', '/phpmotors/images/vehicles/adventador2-tn.jpg', '2021-11-24 12:41:12', 0),
(59, 3, 'adventador3.jpg', '/phpmotors/images/vehicles/adventador3.jpg', '2021-11-24 12:41:25', 0),
(60, 3, 'adventador3-tn.jpg', '/phpmotors/images/vehicles/adventador3-tn.jpg', '2021-11-24 12:41:25', 0),
(61, 1, 'wrangler2.jpg', '/phpmotors/images/vehicles/wrangler2.jpg', '2021-11-24 12:41:40', 0),
(62, 1, 'wrangler2-tn.jpg', '/phpmotors/images/vehicles/wrangler2-tn.jpg', '2021-11-24 12:41:40', 0),
(63, 1, 'wrangler3.jpg', '/phpmotors/images/vehicles/wrangler3.jpg', '2021-11-24 12:41:53', 0),
(64, 1, 'wrangler3-tn.jpg', '/phpmotors/images/vehicles/wrangler3-tn.jpg', '2021-11-24 12:41:53', 0),
(65, 61, 'delorean.jpg', '/phpmotors/images/vehicles/delorean.jpg', '2021-11-24 14:27:24', 1),
(66, 61, 'delorean-tn.jpg', '/phpmotors/images/vehicles/delorean-tn.jpg', '2021-11-24 14:27:24', 1),
(69, 10, 'camaro-yellow.jpg', '/phpmotors/images/vehicles/camaro-yellow.jpg', '2021-11-25 13:35:38', 0),
(70, 10, 'camaro-yellow-tn.jpg', '/phpmotors/images/vehicles/camaro-yellow-tn.jpg', '2021-11-25 13:35:38', 0),
(71, 8, 'firetruck.jpg', '/phpmotors/images/vehicles/firetruck.jpg', '2021-11-25 13:36:26', 0),
(72, 8, 'firetruck-tn.jpg', '/phpmotors/images/vehicles/firetruck-tn.jpg', '2021-11-25 13:36:26', 0),
(73, 14, 'fbi.jpg', '/phpmotors/images/vehicles/fbi.jpg', '2021-11-25 13:36:47', 0),
(74, 14, 'fbi-tn.jpg', '/phpmotors/images/vehicles/fbi-tn.jpg', '2021-11-25 13:36:47', 0),
(75, 1, 'wrangler4.jpg', '/phpmotors/images/vehicles/wrangler4.jpg', '2021-11-25 13:37:56', 0),
(76, 1, 'wrangler4-tn.jpg', '/phpmotors/images/vehicles/wrangler4-tn.jpg', '2021-11-25 13:37:56', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `inventory`
--

CREATE TABLE `inventory` (
  `invId` int NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text NOT NULL,
  `invImage` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10,0) NOT NULL,
  `invStock` smallint NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(1, 'Jeep ', 'Wrangler', 'The Jeep Wrangler is small and compact with enough power to get you where you want to go. It is great for everyday driving as well as off-roading whether that be on the rocks or in the mud!', '/phpmotors/images/vehicles/jeep-wrangler.jpg', '/phpmotors/images/vehicles/jeep-wrangler-tn.jpg', '28045', 4, 'Orange', 1),
(2, 'Ford', 'Model T', 'The Ford Model T can be a bit tricky to drive. It was the first car to be put into production. You can get it in any color you want if it is black.', '/phpmotors/images/vehicles/ford-modelt.jpg', '/phpmotors/images/vehicles/ford-modelt-tn.jpg', '30000', 2, 'Black', 2),
(3, 'Lamborghini', 'Adventador', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws.', '/phpmotors/images/vehicles/adventador.jpg', '/phpmotors/images/vehicles/adventador-tn.jpg', '417650', 9, 'Blue', 3),
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. This beast comes with 60 inch tires giving you the traction needed to jump and roll in the mud.', '/phpmotors/images/vehicles/monster.jpg', '/phpmotors/images/vehicles/monster-tn.jpg', '150000', 3, 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. However, with a little tender loving care it will run as good a new.', '/phpmotors/images/vehicles/ms.jpg', '/phpmotors/images/vehicles/ms-tn.jpg', '100', 1, 'Rust', 5),
(6, 'Batmobile', 'Custom', 'Ever want to be a superhero? Now you can with the bat mobile. This car allows you to switch to bike mode allowing for easy maneuvering through traffic during rush hour.', '/phpmotors/images/vehicles/bat.jpg', '/phpmotors/images/vehicles/bat-tn.jpg', '65000', 1, 'Black', 3),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of their 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.', '/phpmotors/images/vehicles/mm.jpg', '/phpmotors/images/vehicles/mm-tn.jpg', '10000', 12, 'Green', 1),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000-gallon tank.', '/phpmotors/images/vehicles/fire-truck.jpg', '/phpmotors/images/vehicles/fire-truck-tn.jpg', '50000', 1, 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equipped with the siren which is convenient for college students running late to class.', '/phpmotors/images/vehicles/crown-vic.jpg', '/phpmotors/images/vehicles/crown-vic-tn.jpg', '10000', 5, 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the car you need! This car has great performance at an affordable price. Own it today!', '/phpmotors/images/vehicles/camaro.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', '25000', 10, 'Silver', 3),
(11, 'Cadillac', 'Escalade', 'This styling car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '/phpmotors/images/vehicles/escalade.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '75195', 4, 'Black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go off-roading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.', '/phpmotors/images/vehicles/hummer.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '58800', 5, 'Yellow', 5),
(13, 'Aerocar International', 'Aerocar', 'Are you sick of rush hour traffic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get this one while it lasts!', '/phpmotors/images/vehicles/aerocar.jpg', '/phpmotors/images/vehicles/aerocar-tn.jpg', '1000000', 1, 'Red', 2),
(14, 'FBI', 'Surveillance Van', 'Do you like police shows? You will feel right at home driving this van. Comes complete with surveillance equipment for an extra fee of $2,000 a month. ', '/phpmotors/images/vehicles/van.jpg', '/phpmotors/images/vehicles/van-tn.jpg', '20000', 1, 'Green', 1),
(15, 'Dog ', 'Car', 'Do you like dogs? Well, this car is for you straight from the 90s from Aspen, Colorado we have the original Dog Car complete with fluffy ears.', '/phpmotors/images/vehicles/no-image.png', '/phpmotors/images/vehicles/no-image-tn.png', '35000', 1, 'Brown', 2),
(61, 'DMC', 'DeLorean', 'Back to the Future!', '/phpmotors/images/vehicles/delorean.jpg', '/phpmotors/images/vehicles/delorean-tn.jpg', '1985', 1, 'Silver', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int UNSIGNED NOT NULL,
  `reviewText` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invId` int NOT NULL,
  `clientId` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(53, 'A friend of mine wanted this car', '2021-12-07 13:24:10', 11, 51),
(54, 'Super fast (almost like lightning) and fancy car', '2021-12-07 13:51:24', 3, 51),
(55, 'In case you want to show off', '2021-12-07 13:25:45', 3, 51),
(56, 'I want the blue one', '2021-12-07 13:26:50', 3, 44),
(57, 'This one probably saved many lives', '2021-12-07 13:30:49', 8, 44),
(58, 'Why is there no image at all?', '2021-12-07 13:40:31', 15, 44),
(59, 'not painted, not beaten, did not know of accidents, Lol', '2021-12-07 13:45:50', 5, 44),
(60, 'The black one looks quite agressive, isn&#39;t it ?', '2021-12-07 13:49:29', 10, 51),
(83, 'OFF-road wheels', '2021-12-07 14:53:33', 1, 51),
(91, 'Indeed BigFoot', '2021-12-07 15:18:17', 4, 44),
(95, 'Why does not everyone have this? I really want this ... whatever this is.', '2021-12-07 17:54:08', 13, 51);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`),
  ADD UNIQUE KEY `clientEmail` (`clientEmail`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `FK_inv_images` (`invId`);

--
-- Индексы таблицы `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `FK_reviews_clients` (`clientId`),
  ADD KEY `FK_reviews_inventory` (`invId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT для таблицы `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reviews_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
