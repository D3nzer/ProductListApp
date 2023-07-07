-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 08 Kwi 2023, 12:05
-- Wersja serwera: 10.5.16-MariaDB
-- Wersja PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `id20567262_juniortest`
--
CREATE DATABASE IF NOT EXISTS `id20567262_juniortest` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id20567262_juniortest`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `type`, `value`) VALUES
(107, 'bk-pl-oks', 'Cooking Book', 20, 'Book', 'Weight: 2 Kg'),
(108, 'dvd-asc-oksw', 'Horror film', 15, 'DVD', 'Size: 3000 MB'),
(109, 'frn-chr-ab', 'Chair', 50, 'Furniture', 'Dimensions: 91 x 43 x 45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
