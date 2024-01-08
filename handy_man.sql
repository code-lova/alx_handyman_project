-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2024 at 07:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handy_man`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `replied` tinyint(4) NOT NULL DEFAULT 0,
  `replied_message` longtext DEFAULT NULL,
  `date_replied` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `replied`, `replied_message`, `date_replied`, `created_at`, `updated_at`) VALUES
(1, 'Marther Filland', 'martha445@gmail.com', 'need a hand', 'i did like to know if i am going to need payment to opena an account.', 1, 'No you do not need a payment to open an account. This is free of charge with no cost.\r\nThanks', '2024-01-04 10:03:33', '2024-01-04 07:46:52', '2024-01-04 09:03:33'),
(2, 'John Marsh', 'kenjoejoe38@gmail.com', 'i have a lil problem in opening an account.', 'i have not gotten a confirmation message from you telling that my account is active.', 1, 'we are sorting the problem now be rest assure that we will fix it in no time. \r\nThanks for your patience.', '2024-01-04 09:48:42', '2024-01-04 08:12:26', '2024-01-04 08:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `symbol` varchar(100) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `status` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `country`, `currency`, `name`, `symbol`, `rate`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Albania', 'Leke', 'ALL', 'Lek', NULL, 0, '2024-01-08 00:09:19', '2024-01-07 23:09:19'),
(2, 'America', 'Dollars', 'USD', '$', 1, 0, '2024-01-03 12:31:51', '2024-01-03 11:31:51'),
(3, 'Afghanistan', 'Afghanis', 'AFN', '؋', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(4, 'Argentina', 'Pesos', 'ARS', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(5, 'Aruba', 'Guilders', 'AWG', 'ƒ', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(6, 'Australia', 'Dollars', 'AUD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(7, 'Azerbaijan', 'New Manats', 'AZN', 'ман', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(8, 'Bahamas', 'Dollars', 'BSD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(9, 'Barbados', 'Dollars', 'BBD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(10, 'Belarus', 'Rubles', 'BYR', 'p.', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(11, 'Belgium', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(12, 'Beliz', 'Dollars', 'BZD', 'BZ$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(13, 'Bermuda', 'Dollars', 'BMD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(14, 'Bolivia', 'Bolivianos', 'BOB', '$b', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(15, 'Bosnia and Herzegovina', 'Convertible Marka', 'BAM', 'KM', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(16, 'Botswana', 'Pula', 'BWP', 'P', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(17, 'Bulgaria', 'Leva', 'BGN', 'лв', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(18, 'Brazil', 'Reais', 'BRL', 'R$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(19, 'Britain (United Kingdom)', 'Pounds', 'GBP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(20, 'Brunei Darussalam', 'Dollars', 'BND', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(21, 'Cambodia', 'Riels', 'KHR', '៛', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(22, 'Canada', 'Dollars', 'CAD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(23, 'Cayman Islands', 'Dollars', 'KYD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(24, 'Chile', 'Pesos', 'CLP', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(25, 'China', 'Yuan Renminbi', 'CNY', '¥', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(26, 'Colombia', 'Pesos', 'COP', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(27, 'Costa Rica', 'Colón', 'CRC', '₡', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(28, 'Croatia', 'Kuna', 'HRK', 'kn', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(29, 'Cuba', 'Pesos', 'CUP', '₱', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(30, 'Cyprus', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(31, 'Czech Republic', 'Koruny', 'CZK', 'Kč', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(32, 'Denmark', 'Kroner', 'DKK', 'kr', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(33, 'Dominican Republic', 'Pesos', 'DOP ', 'RD$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(34, 'East Caribbean', 'Dollars', 'XCD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(35, 'Egypt', 'Pounds', 'EGP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(36, 'El Salvador', 'Colones', 'SVC', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(37, 'England (United Kingdom)', 'Pounds', 'GBP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(38, 'Euro', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(39, 'Falkland Islands', 'Pounds', 'FKP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(40, 'Fiji', 'Dollars', 'FJD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(41, 'France', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(42, 'Ghana', 'Cedis', 'GHC', '¢', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(43, 'Gibraltar', 'Pounds', 'GIP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(44, 'Greece', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(45, 'Guatemala', 'Quetzales', 'GTQ', 'Q', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(46, 'Guernsey', 'Pounds', 'GGP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(47, 'Guyana', 'Dollars', 'GYD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(48, 'Holland (Netherlands)', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(49, 'Honduras', 'Lempiras', 'HNL', 'L', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(50, 'Hong Kong', 'Dollars', 'HKD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(51, 'Hungary', 'Forint', 'HUF', 'Ft', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(52, 'Iceland', 'Kronur', 'ISK', 'kr', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(53, 'India', 'Rupees', 'INR', 'Rp', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(54, 'Indonesia', 'Rupiahs', 'IDR', 'Rp', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(55, 'Iran', 'Rials', 'IRR', '﷼', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(56, 'Ireland', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(57, 'Isle of Man', 'Pounds', 'IMP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(58, 'Israel', 'New Shekels', 'ILS', '₪', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(59, 'Italy', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(60, 'Jamaica', 'Dollars', 'JMD', 'J$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(61, 'Japan', 'Yen', 'JPY', '¥', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(62, 'Jersey', 'Pounds', 'JEP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(63, 'Kazakhstan', 'Tenge', 'KZT', 'лв', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(64, 'Korea (North)', 'Won', 'KPW', '₩', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(65, 'Korea (South)', 'Won', 'KRW', '₩', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(66, 'Kyrgyzstan', 'Soms', 'KGS', 'лв', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(67, 'Laos', 'Kips', 'LAK', '₭', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(68, 'Latvia', 'Lati', 'LVL', 'Ls', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(69, 'Lebanon', 'Pounds', 'LBP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(70, 'Liberia', 'Dollars', 'LRD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(71, 'Liechtenstein', 'Switzerland Francs', 'CHF', 'CHF', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(72, 'Lithuania', 'Litai', 'LTL', 'Lt', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(73, 'Luxembourg', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(74, 'Macedonia', 'Denars', 'MKD', 'ден', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(75, 'Malaysia', 'Ringgits', 'MYR', 'RM', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(76, 'Malta', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(77, 'Mauritius', 'Rupees', 'MUR', '₨', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(78, 'Mexico', 'Pesos', 'MXN', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(79, 'Mongolia', 'Tugriks', 'MNT', '₮', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(80, 'Mozambique', 'Meticais', 'MZN', 'MT', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(81, 'Namibia', 'Dollars', 'NAD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(82, 'Nepal', 'Rupees', 'NPR', '₨', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(83, 'Netherlands Antilles', 'Guilders', 'ANG', 'ƒ', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(84, 'Netherlands', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(85, 'New Zealand', 'Dollars', 'NZD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(86, 'Nicaragua', 'Cordobas', 'NIO', 'C$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(87, 'Nigeria', 'Nairas', 'NGN', '₦', 390, 1, '2024-01-08 00:09:19', '2024-01-07 23:09:19'),
(88, 'North Korea', 'Won', 'KPW', '₩', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(89, 'Norway', 'Krone', 'NOK', 'kr', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(90, 'Oman', 'Rials', 'OMR', '﷼', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(91, 'Pakistan', 'Rupees', 'PKR', '₨', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(92, 'Panama', 'Balboa', 'PAB', 'B/.', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(93, 'Paraguay', 'Guarani', 'PYG', 'Gs', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(94, 'Peru', 'Nuevos Soles', 'PEN', 'S/.', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(95, 'Philippines', 'Pesos', 'PHP', 'Php', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(96, 'Poland', 'Zlotych', 'PLN', 'zł', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(97, 'Qatar', 'Rials', 'QAR', '﷼', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(98, 'Romania', 'New Lei', 'RON', 'lei', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(99, 'Russia', 'Rubles', 'RUB', 'руб', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(100, 'Saint Helena', 'Pounds', 'SHP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(101, 'Saudi Arabia', 'Riyals', 'SAR', '﷼', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(102, 'Serbia', 'Dinars', 'RSD', 'Дин.', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(103, 'Seychelles', 'Rupees', 'SCR', '₨', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(104, 'Singapore', 'Dollars', 'SGD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(105, 'Slovenia', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(106, 'Solomon Islands', 'Dollars', 'SBD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(107, 'Somalia', 'Shillings', 'SOS', 'S', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(108, 'South Africa', 'Rand', 'ZAR', 'R', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(109, 'South Korea', 'Won', 'KRW', '₩', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(110, 'Spain', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(111, 'Sri Lanka', 'Rupees', 'LKR', '₨', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(112, 'Sweden', 'Kronor', 'SEK', 'kr', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(113, 'Switzerland', 'Francs', 'CHF', 'CHF', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(114, 'Suriname', 'Dollars', 'SRD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(115, 'Syria', 'Pounds', 'SYP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(116, 'Taiwan', 'New Dollars', 'TWD', 'NT$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(117, 'Thailand', 'Baht', 'THB', '฿', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(118, 'Trinidad and Tobago', 'Dollars', 'TTD', 'TT$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(119, 'Turkey', 'Lira', 'TRY', 'TL', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(120, 'Turkey', 'Liras', 'TRL', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(121, 'Tuvalu', 'Dollars', 'TVD', '$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(122, 'Ukraine', 'Hryvnia', 'UAH', '₴', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(123, 'United Kingdom', 'Pounds', 'GBP', '£', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(124, 'United States of America', 'Dollars', 'USD', '$', NULL, 0, '2020-04-23 14:02:54', '2020-04-23 13:02:54'),
(125, 'Uruguay', 'Pesos', 'UYU', '$U', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(126, 'Uzbekistan', 'Sums', 'UZS', 'лв', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(127, 'Vatican City', 'Euro', 'EUR', '€', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(128, 'Venezuela', 'Bolivares Fuertes', 'VEF', 'Bs', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(129, 'Vietnam', 'Dong', 'VND', '₫', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(130, 'Yemen', 'Rials', 'YER', '﷼', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(131, 'Zimbabwe', 'Zimbabwe Dollars', 'ZWD', 'Z$', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00'),
(132, 'India', 'Rupees', 'INR', '₹', NULL, 0, '2020-03-31 08:28:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_policies`
--

CREATE TABLE `insurance_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `policy_name` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_location` varchar(255) NOT NULL COMMENT 'Optional',
  `job_type` int(255) NOT NULL,
  `job_category` int(255) NOT NULL,
  `job_description` longtext NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `filled` tinyint(22) NOT NULL DEFAULT 0 COMMENT '1:filled\r\n0:not filled',
  `image` varchar(255) DEFAULT NULL COMMENT 'Optional',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `userId`, `email`, `job_title`, `job_location`, `job_type`, `job_category`, `job_description`, `url`, `expires_at`, `status`, `filled`, `image`, `created_at`, `updated_at`) VALUES
(1, 5, 'kenjoejoe38@gmail.com', 'Cleaner', 'Ugbowo, UBTH', 20, 2, 'We are the cleaning service and we make it look more easy than it is when we maintain your surrounding and home. Giving you cutting edge quality maintenance.', 'https://www.thecleaner.com', '2024-02-06 07:44:57', 1, 1, 'image_1704649727.vxyZwa0CAnJqNOF5ztwIArjIFgJ5aSfiMBT1onE9.png', '2024-01-06 06:44:57', '2024-01-07 19:48:21'),
(2, 5, 'kenjoejoe38@gmail.com', 'Home Cleaning', 'Egor, Uselu shell', 17, 4, 'we give affordable home cleaning and maintenance for your home with good quality and assurance.', 'https://www.making.com', '2024-02-06 08:26:09', 1, 1, 'image_1704529569.Per5GZOW7ZyyVSWRdaKw3Hszcm2DokD6QKox4OQg.jpg', '2024-01-06 07:26:09', '2024-01-07 23:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=hidden,1=visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `name`, `slug`, `meta_title`, `meta_keyword`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Installation', 'installation', 'installation', 'installation, handyman installation, fixing and installing of handyman services, handyman services, handyman service installation.', 'Handyman Installation of services.', 1, '2024-01-05 14:07:53', '2024-01-05 14:20:46'),
(2, 'Cleaning', 'cleaning', 'handyman cleaning services', 'cleaning, handyman cleaning, handyman  cleaning services, handyman services, handyman service cleaning.', 'HandyMan cleaning services', 1, '2024-01-05 14:24:45', '2024-01-05 14:24:45'),
(3, 'Repair', 'repair', 'Handyman repair services', 'repair, handyman repair, fixing and repair of handyman services, handyman services, handyman service repair, handyman repair services', 'Handyman repair services', 1, '2024-01-05 14:26:07', '2024-01-05 14:26:07'),
(4, 'Maintenance', 'maintenance', 'handyman maintaining services', 'maintaining, handyman maintenance, handyman maintenance services, handyman services, handyman service maintenance, handyman maintenance services', 'handyman maintaining services', 1, '2024-01-05 14:28:17', '2024-01-05 14:28:17'),
(5, 'Replacement', 'replacement', 'handyman changing services', 'changing, handyman replacement, handyman replacement services, handyman replacement services, handyman replacement, handyman changing services', 'handyman replacement services', 1, '2024-01-05 14:29:55', '2024-01-05 19:04:05');

-- --------------------------------------------------------

--
-- Table structure for table `job_contacteds`
--

CREATE TABLE `job_contacteds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `job_location` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `job_category` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:Not Accepted, 1:Accepted, 2:Rejected,\r\n3:Completed',
  `end_date` datetime DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_contacteds`
--

INSERT INTO `job_contacteds` (`id`, `userId`, `name`, `email`, `details`, `job_location`, `job_type`, `job_category`, `job_title`, `status`, `end_date`, `start_date`, `created_at`, `updated_at`) VALUES
(1, 5, 'Cynthia Lynn', 'lynnghy@gmail.com', 'I want a painted my house needs back and front painting, can you do the celin alot casue i have my family coming next week, let me know how long it will tak you to do it.\r\nthanks \r\nLynn', 'Edo State, Oluku', 'Painting', 'HandiWork', 'Painter', 1, '2024-01-13 03:37:34', '2024-01-01 03:37:34', '2024-01-02 07:41:57', '2024-01-02 07:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=visible,0=hidden',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` mediumtext DEFAULT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `catId`, `name`, `slug`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tiles', 'tiles', 1, 'Tiles installation', 'tiles installation, handyman tiles installation,  installing types, handyman services for tiles installation.', 'Tiles installation', '2024-01-05 18:52:46', '2024-01-05 20:27:19'),
(2, 1, 'Air conditioner', 'air-condition', 1, 'air condition installation', 'air condition installation, handyman air condition installation,  air condition, installing types, handyman services for air condition installation.', 'handyman service for installing air condition', '2024-01-05 18:58:17', '2024-01-05 20:27:30'),
(3, 3, 'Plumbing', 'plumbing', 1, 'Plumbing repairs', 'handyman plumbing repairs', 'Plumbing repairs', '2024-01-05 18:59:21', '2024-01-05 20:27:38'),
(4, 1, 'Plumbing installation', 'plumbing-installation', 1, 'Plumbing installation', 'handyman plumbing installation', 'Plumbing installation', '2024-01-05 19:01:18', '2024-01-05 20:27:49'),
(5, 1, 'Drywall installation', 'drywall-installation', 1, 'Handyman services Drywall installation', 'handyman Drywall installation, Drywall installation by handyman', 'handy man services Drywall installation', '2024-01-05 19:02:04', '2024-01-05 20:28:53'),
(6, 3, 'Repairing damaged gutters', 'repairing-damaged-gutters', 1, 'Handyman services Repairing damaged gutters', 'handy man Repairing damaged gutters', 'Handyman services  Repairing damaged gutters', '2024-01-05 19:02:55', '2024-01-05 20:28:24'),
(7, 5, 'Fixture replacement', 'fixture-replacement', 1, 'Fixture replacement', 'handyman Fixture replacement', 'Fixture replacement', '2024-01-05 19:04:47', '2024-01-05 19:04:47'),
(8, 1, 'Patching and painting', 'patching-and-painting', 1, 'Patching and painting', 'handyman Patching and painting services', 'Patching and painting', '2024-01-05 19:06:21', '2024-01-05 20:29:57'),
(9, 3, 'Patching and paintings', 'patching-and-paintings', 1, 'Handyman Patching and painting services', 'handyman Patching and painting services', 'Handy man Patching and paintings', '2024-01-05 19:07:58', '2024-01-05 20:29:18'),
(10, 5, 'Painting', 'painting', 1, 'handy man Painting services', 'handy man painting services, paining services', 'Whether the paint on the wall has been scraped by furniture, dry wall painting frequent handymen requests.', '2024-01-05 19:10:21', '2024-01-05 20:29:28'),
(11, 1, 'Deck construction', 'deck-construction', 1, 'Deck construction', 'handyman Deck construction services', 'Deck construction', '2024-01-05 19:16:37', '2024-01-05 19:16:37'),
(12, 3, 'Deck repairs', 'deck-repairs', 1, 'Deck repairs', 'Handyman Deck repairs services', 'Deck repairs', '2024-01-05 19:17:18', '2024-01-05 20:27:03'),
(13, 1, 'Carpentry', 'carpentry', 1, 'Handy man Carpentry services', 'Handy man Carpentry services', 'handyman Carpentry services', '2024-01-05 19:19:32', '2024-01-05 19:19:32'),
(14, 2, 'House Cleaning', 'house-cleaning', 1, 'Handy man house cleaning services', 'Handy man house cleaning services', 'Handy man house cleaning services', '2024-01-05 19:20:23', '2024-01-05 20:25:03'),
(15, 5, 'Curtain replacement', 'curtain-replacement', 1, 'Handy man Curtain replacement', 'Handy man Curtain replacement', 'Handy man Curtain replacement', '2024-01-05 19:21:50', '2024-01-05 20:26:52'),
(16, 1, 'Doors installation', 'doors-installation', 1, 'Handyman door installation services', 'Handyman door installation services', 'Handyman door installation services', '2024-01-05 19:23:03', '2024-01-05 20:30:04'),
(17, 4, 'Home Surrounds', 'home-surrounds', 1, 'Handy man Home Surrounds maintenance services', 'Handy man Home Surrounds maintenance services', 'Handy man Home Surrounds maintenance services', '2024-01-05 19:24:31', '2024-01-05 20:29:49'),
(18, 1, 'Fence insallation', 'fence-insallation', 1, 'Handyman Fence installation services', 'Handyman Fence installation services', 'Handyman Fence installation services', '2024-01-05 19:25:51', '2024-01-05 20:26:28'),
(19, 1, 'Electrical Installation', 'electrical-installation', 1, 'Electrical Installation handy man services', 'Electrical Installation handy man services, handyman electrical services', 'Electrical Installation handy man services', '2024-01-05 19:26:37', '2024-01-05 20:26:20'),
(20, 2, 'Gutter Cleaning', 'gutter-cleaning', 1, 'Handyman Gutter Cleaning services', 'Handyman Gutter Cleaning services, cleaning service by handyman', 'Handyman Gutter Cleaning services', '2024-01-05 19:28:16', '2024-01-05 19:28:16'),
(21, 3, 'Soldering and Welding', 'soldering-and-welding', 1, 'handyman Soldering and Welding services', 'handyman Soldering and Welding services', 'handyman Soldering and Welding services', '2024-01-05 19:32:26', '2024-01-05 20:26:11'),
(22, 1, 'Concrete work installation', 'concrete-work-installation', 1, 'handyman Concrete work installation services', 'handyman Concrete work installation services, handyman concrete services', 'handyman Concrete work installation services', '2024-01-05 19:35:15', '2024-01-05 19:35:15'),
(23, 5, 'Electrical replacement', 'electrical-replacement', 1, 'handyman Electrical replacement services', 'handyman Electrical replacement services, electrical replacement services, handyman electrician', 'handyman Electrical replacement services', '2024-01-05 20:00:05', '2024-01-05 20:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `logo_favicons`
--

CREATE TABLE `logo_favicons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logo_favicons`
--

INSERT INTO `logo_favicons` (`id`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'logo1704335342.VfZRBC5mV6ogURRKivJyEqD1v1uw9TQkp6hctlKx.png', 'favicon1704335381.bNi3IkFWC4cyu0HPZAcAFZOFMsFfAx3MJVweeIjp.png', '2024-01-04 01:29:02', '2024-01-04 01:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `message_handymen`
--

CREATE TABLE `message_handymen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL COMMENT 'High,Low,Medium',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_handymen`
--

INSERT INTO `message_handymen` (`id`, `userId`, `subject`, `message`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'You have a message from customer', 'Please respond to you message from a customer.\r\nThanks', 'kenjoejoe38@gmail.com', 'Low Priority', '2024-01-02 17:48:17', '2024-01-02 17:48:17'),
(2, 5, 'check message', 'you have a client requesting your attention', 'kenjoejoe38@gmail.com', 'Medium Priority', '2024-01-02 18:08:39', '2024-01-02 18:08:39'),
(3, 5, 'check message', 'You have a message', 'kenjoejoe38@gmail.com', 'Low Priority', '2024-01-07 23:07:24', '2024-01-07 23:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_13_010757_add_column_to_table', 2),
(7, '2023_12_16_161336_add_column_to_table', 3),
(8, '2023_12_20_015510_add_column_to', 4),
(9, '2023_12_29_065237_add_column_to', 5),
(10, '2023_12_31_012043_create_jobs_table', 6),
(11, '2023_12_31_204316_add_column_to', 7),
(12, '2024_01_02_071443_create_job_contacteds_table', 8),
(13, '2024_01_02_142655_create_message_handymen_table', 9),
(14, '2024_01_03_022130_add_column_to', 10),
(15, '2024_01_03_035201_create_ratings_table', 11),
(16, '2024_01_03_124508_create_settings_table', 12),
(17, '2024_01_03_134132_add_column_to', 13),
(18, '2024_01_03_182620_create_payment_options_table', 14),
(19, '2024_01_04_015037_create_logo_favicons_table', 15),
(20, '2024_01_04_023852_create_contact_messages_table', 16),
(21, '2024_01_04_031042_add_column_to', 17),
(22, '2024_01_04_080744_add_column_to', 18),
(23, '2024_01_05_142650_create_job_categories_table', 19),
(24, '2024_01_05_143140_create_job_types_table', 19),
(25, '2024_01_05_203945_add_column_to', 20),
(26, '2024_01_05_204731_create_insurance_policies_table', 21);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_options`
--

CREATE TABLE `payment_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_details` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_options`
--

INSERT INTO `payment_options` (`id`, `payment_name`, `status`, `payment_details`, `created_at`, `updated_at`) VALUES
(1, 'Bank Account', 1, '<p>Bank Name: Access Bank</p><p>Account No: 0093673843</p><p>Account Name: Hand work Inc</p>', '2024-01-03 17:45:59', '2024-01-03 18:06:17'),
(2, 'PayPal', 0, '<p>PayPal ID: handyMan Inc</p>', '2024-01-03 17:47:33', '2024-01-03 18:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customerId` bigint(20) UNSIGNED NOT NULL,
  `handymanId` bigint(20) UNSIGNED NOT NULL,
  `star_rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `customerId`, `handymanId`, `star_rating`, `created_at`, `updated_at`) VALUES
(1, 9, 5, 5, '2024-01-03 04:17:05', '2024-01-03 04:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `app_desc` text NOT NULL,
  `keywords` longtext DEFAULT NULL,
  `tawk_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `working_hours` varchar(255) NOT NULL,
  `payment` tinyint(4) NOT NULL DEFAULT 1,
  `registration` tinyint(4) NOT NULL DEFAULT 1,
  `email_notify` tinyint(4) NOT NULL DEFAULT 1,
  `handyman` tinyint(4) NOT NULL DEFAULT 0,
  `pricing` int(11) NOT NULL DEFAULT 1,
  `testimony` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `app_name`, `app_desc`, `keywords`, `tawk_id`, `email`, `mobile`, `address`, `working_hours`, `payment`, `registration`, `email_notify`, `handyman`, `pricing`, `testimony`, `created_at`, `updated_at`) VALUES
(1, 'Handyman App', 'HanyMan', 'for handyman', 'work, handyman, solution', 'takw_id', 'handyman@handyman.com', '+1700 124-5678, +1700 124-5678', 'HandyMan Co., Old Town Avenue, New York, USA 23000.', 'Monday - Friday 9:00 - 21:00, Saturday - Sunday 10:00 - 16:00', 1, 1, 1, 1, 1, 1, '2024-01-03 18:17:48', '2024-01-03 17:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `job_category` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `email_status` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `x_link` varchar(255) DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `general_liability_insurance` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `verification_code` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `phone`, `location`, `state`, `job_category`, `job_type`, `job_title`, `skills`, `gender`, `experience`, `education`, `url`, `user_image`, `address`, `marital_status`, `birth_date`, `email_status`, `email_verified_at`, `password`, `description`, `linkedin_link`, `x_link`, `fb_link`, `short_description`, `general_liability_insurance`, `remember_token`, `created_at`, `updated_at`, `is_active`, `role_as`, `verification_code`, `ip_address`, `last_login`, `last_seen`) VALUES
(1, 'Adminstrator', 'admin@handyman.com', 'admin', '+2347060501776', 'Nigeria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$12$Zo6jI74Bxqj2EqxVDanXgudLcum8BsKmWurkcQ0bDGVHkXrUwNrBe', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2023-12-17 19:54:12', '2024-01-07 23:09:39', 1, 1, 'DBTAXP', '127.0.0.1', '2024-01-08 00:09:39', '2024-01-07 23:09:39'),
(5, 'Kelly Benjamin', 'kenjoejoe38@gmail.com', NULL, '+1 (854) 479-3682', 'United States', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '$2y$12$IRIQapKJNXtjehLt7sKoeO9qcRuIupcvpbVnbRuLwgt6bLLulPGni', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2023-12-18 02:14:12', '2024-01-07 23:24:06', 1, 0, 'GQMT84', '127.0.0.1', '2024-01-08 00:24:06', '2024-01-07 23:24:06'),
(6, 'Kibo Bean', 'markldamm1@gmail.com', 'jaluga', '+1 (938) 244-2683', 'South Africa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$12$LVQM0KyEfOxr85I6VsQzo.QdWz89pluhCmo9sAdICZKZhc2FO/8xq', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2023-12-18 14:15:26', '2024-01-05 11:15:17', 1, 0, 'DVSUC5', '127.0.0.1', '2024-01-05 12:15:17', '2024-01-05 11:15:17'),
(7, 'Jeanette Rollins', 'lybumemabe@mailinator.com', 'fupeva', '+1 (341) 653-9543', 'Guinea-bissau', NULL, NULL, NULL, NULL, 'paint,dry-cleaning,chair-rails,hardware replacement', 'Male', 'sinking,Crown/Base Molding,Electrician,Lighting', NULL, NULL, NULL, NULL, 'Single', NULL, 0, NULL, '$2y$12$U4CLAG7kUAprocsUehk5p.1qZ1O6BxSr/HGfJVk52QjppZGU.JmjS', 'a long description about myself and job', NULL, NULL, NULL, NULL, 0, NULL, '2023-12-18 14:19:57', '2024-01-02 04:01:32', 1, 2, '4706OT', '127.0.0.1', '2023-12-18 15:17:10', '2023-12-18 14:17:10'),
(9, 'Cynthia Lynn', 'jerryscholarsj@gmail.com', 'kudepal', '+1 (137) 725-1922', 'Philippines', NULL, NULL, NULL, NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, 'Single', '2008-02-06', 1, NULL, '$2y$12$fh.ZkzkDunqcAkpBl20WYuS9drlr91gWxGbDOV1BchxTDNh5DGMkq', NULL, NULL, NULL, NULL, 'make find and good beds', 0, NULL, '2023-12-26 11:47:41', '2023-12-30 06:20:36', 1, 2, 'O5BVPN', '127.0.0.1', '2023-12-26 12:49:56', '2023-12-26 11:49:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `insurance_policies`
--
ALTER TABLE `insurance_policies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insurance_policies_userid_foreign` (`userId`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_userid_foreign` (`userId`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_contacteds`
--
ALTER TABLE `job_contacteds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_contacteds_userid_foreign` (`userId`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_types_catid_foreign` (`catId`);

--
-- Indexes for table `logo_favicons`
--
ALTER TABLE `logo_favicons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_handymen`
--
ALTER TABLE `message_handymen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_handymen_userid_foreign` (`userId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_options`
--
ALTER TABLE `payment_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_handymanid_foreign` (`handymanId`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insurance_policies`
--
ALTER TABLE `insurance_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_contacteds`
--
ALTER TABLE `job_contacteds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `logo_favicons`
--
ALTER TABLE `logo_favicons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_handymen`
--
ALTER TABLE `message_handymen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payment_options`
--
ALTER TABLE `payment_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `insurance_policies`
--
ALTER TABLE `insurance_policies`
  ADD CONSTRAINT `insurance_policies_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_contacteds`
--
ALTER TABLE `job_contacteds`
  ADD CONSTRAINT `job_contacteds_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_types`
--
ALTER TABLE `job_types`
  ADD CONSTRAINT `job_types_catid_foreign` FOREIGN KEY (`catId`) REFERENCES `job_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `message_handymen`
--
ALTER TABLE `message_handymen`
  ADD CONSTRAINT `message_handymen_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_handymanid_foreign` FOREIGN KEY (`handymanId`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
