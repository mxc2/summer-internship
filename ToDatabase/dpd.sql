-- phpMyAdmin SQL Dump
-- version 5.1.1-1.el7.remi
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2021 at 05:58 PM
-- Server version: 10.2.25-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if20_marcus_praktika`
--

-- --------------------------------------------------------

--
-- Table structure for table `dpd`
--

CREATE TABLE `dpd` (
  `dpd_id` int(4) NOT NULL,
  `lat` float(6,4) NOT NULL,
  `lon` float(6,4) NOT NULL,
  `maakond` varchar(55) COLLATE utf8_estonian_ci NOT NULL,
  `valla_nimi` varchar(75) COLLATE utf8_estonian_ci DEFAULT NULL,
  `linn` varchar(60) COLLATE utf8_estonian_ci NOT NULL,
  `aadress` varchar(75) COLLATE utf8_estonian_ci NOT NULL,
  `postiindeks` int(9) NOT NULL,
  `kauplus` varchar(50) COLLATE utf8_estonian_ci NOT NULL,
  `lisainfo` varchar(100) COLLATE utf8_estonian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `dpd`
--

INSERT INTO `dpd` (`dpd_id`, `lat`, `lon`, `maakond`, `valla_nimi`, `linn`, `aadress`, `postiindeks`, `kauplus`, `lisainfo`) VALUES
(1, 59.4496, 26.8669, 'Lääne-Virumaa', NULL, 'Aseri', 'Tehase 23', 43401, 'Aseri Grossi Kauplus', NULL),
(2, 58.1252, 25.3415, 'Viljandimaa', NULL, 'Abja-Paluoja', 'Pärnu mnt 13', 69403, 'Abja-Paluoja Konsum', NULL),
(3, 59.2870, 25.6106, 'Harjumaa', NULL, 'Aegviidu', 'Piibe maantee 13', 74501, 'Aegviidu raamatukogu', NULL),
(4, 58.2088, 27.0751, 'Põlvamaa', NULL, 'Ahja', 'Tartu mnt 24a', 63710, 'Ahja Konsum', NULL),
(5, 59.3380, 27.4202, 'Ida-Virumaa', NULL, 'Ahtme', 'Puru tee 77', 31023, 'Ahtme Maxima XX', NULL),
(6, 58.6025, 27.1247, 'Tartumaa', NULL, 'Alatskivi', 'Lossi 1a', 60218, 'Alatskivi Konsum', NULL),
(7, 57.7667, 26.9333, 'Võrumaa', NULL, 'Antsla', 'F. R. Kreutzwaldi tn 4a', 66404, 'Antsla Konsum', NULL),
(8, 59.3706, 25.0781, 'Harjumaa', NULL, 'Aruküla', 'Tallinna mnt 8', 75201, 'Aruküla Konsum', NULL),
(9, 58.9860, 26.8702, 'Jõgevamaa', NULL, 'Avinurme', 'Võidu 18', 42101, 'Avinurme Konsum', NULL),
(10, 59.3650, 24.8988, 'Harjumaa', NULL, 'Lehmja ', 'Taevavärava tee 1', 75306, 'DPD Eesti peakontor', NULL),
(11, 58.2206, 26.4044, 'Tartumaa', NULL, 'Elva', 'Valga maantee 5', 61504, 'Elva Maxima X', NULL),
(12, 58.9395, 23.5416, 'Läänemaa', NULL, 'Haapsalu', 'Posti 41', 90507, 'Haapsalu Kaubamaja Konsum', NULL),
(13, 58.9369, 23.5645, 'Läänemaa', NULL, 'Haapsalu', 'Kuuse 30', 90509, 'Haapsalu Kastani keskus', NULL),
(14, 59.4350, 26.2525, 'Lääne-Virumaa', NULL, 'Haljala ', 'Võsu maantee 5', 45301, 'Haljala Grossi kauplus', NULL),
(15, 58.3508, 26.7890, 'Tartumaa', NULL, 'Ihaste', 'Kasesalu tee 51', 62220, 'Ihaste Konsum', NULL),
(16, 59.0950, 27.3146, 'Ida-Virumaa', NULL, 'Iisaku', 'Tartu mnt 55', 41101, 'Iisaku Grossi kauplus', NULL),
(17, 58.9167, 25.6667, 'Järvamaa', NULL, 'Imavere', 'Rukkilille', 72401, 'Imavere Meie kauplus', NULL),
(18, 58.7431, 26.3752, 'Jõgevamaa', NULL, 'Jõgeva', 'Aia 33', 48304, 'Jõgeva Pae Konsum', NULL),
(19, 59.3621, 27.4014, 'Ida-Virumaa', NULL, 'Jõhvi', 'Rakvere 29', 41533, 'Jõhvi Maxima XX', NULL),
(20, 59.3583, 27.4142, 'Ida-Virumaa', NULL, 'Jõhvi', 'Keskväljak 4', 41531, 'Jõhvi Tsentraal', NULL),
(21, 58.7744, 24.8182, 'Rapla maakond', NULL, 'Järvakandi', 'Turu 1', 79101, 'Järvakandi Grossi kauplus', NULL),
(22, 59.0382, 25.8843, 'Järva maakond', NULL, 'Järva-Jaani', 'Lai 23', 73301, 'Järva - Jaani Grossi kauplus', NULL),
(23, 59.3538, 24.8925, 'Harjumaa', NULL, 'Jüri', 'Aruküla tee 7', 75306, 'Jüri Grossi kauplus', NULL),
(24, 58.9624, 26.0281, 'Järvamaa', NULL, 'Koeru', 'Pärna pst 2', 73001, 'Koeru Konsum', NULL),
(25, 59.4072, 27.2849, 'Ida-Virumaa', NULL, 'Kohtla-Järve', 'Põhja allee 4', 30323, 'Kohtla-Järve mini-Rimi', NULL),
(26, 59.3413, 26.1308, 'Lääne-Viru maakond', NULL, 'Kadrina', 'Viru 9', 45201, 'Kadrina Grossi kauplus', NULL),
(27, 58.2351, 26.6949, 'Tartumaa', NULL, 'Kambja', 'Kesk 2a', 62034, 'Kambja Konsum', NULL),
(28, 57.9858, 26.7595, 'Põlvamaa', NULL, 'Kanepi', 'A. Weizenbergi 19', 63101, 'Kanepi Kauplus', NULL),
(29, 58.1043, 25.5482, 'Viljandimaa', NULL, 'Karksi-Nuia', 'Rahumäe 1', 69103, 'Karksi-Nuia Konsum', NULL),
(30, 59.3346, 25.3332, 'Harjumaa', NULL, 'Kehra', 'Kose mnt 7', 74307, 'Kehra Grossi kauplus', NULL),
(31, 58.9259, 24.8718, 'Rapla maakond', NULL, 'Kehtna', 'Lasteaia 12', 79001, 'Kehtna kauplus', NULL),
(32, 59.3106, 24.4326, 'Harjumaa', NULL, 'Keila', 'Tallinna mnt 25', 76608, 'Keila Maxima X', NULL),
(33, 59.3132, 24.4220, 'Harjumaa', NULL, 'Keila', 'Piiri 12', 76610, 'Keila Selver', NULL),
(34, 59.3100, 24.8343, 'Harjumaa', NULL, 'Kiili', 'Vaela tee 4', 75401, 'Kiili Maxima X', NULL),
(35, 58.1476, 24.9494, 'Pärnumaa', NULL, 'Kilingi-Nõmme', 'Pärnu 37', 86303, 'Kilingi-Nõmme Konsum', NULL),
(36, 59.3574, 26.9762, 'Ida-Virumaa', NULL, 'Kiviõli', 'Metsa 2', 43125, 'Kiviõli K5 keskus', NULL),
(37, 59.3200, 24.2350, 'Harjumaa', NULL, 'Klooga', 'Aedlinna tee 3', 76703, 'Klooga Kultuurikeskus', NULL),
(38, 59.1636, 24.7575, 'Raplamaa', NULL, 'Kohila', 'Viljandi mnt 3a', 79805, 'Kohila Grossi kauplus', NULL),
(39, 59.3979, 27.2853, 'Ida-Virumaa', NULL, 'Kohtla-Järve', 'Järveküla tee 50', 30321, 'Kohtla-Järve Vironia keskus', NULL),
(40, 59.4029, 27.2892, 'Ida-Viru maakond', NULL, 'Kohtla-Järve', 'Keskallee 1', 30325, 'Kohtla-Järve Virula kaubakeskus', NULL),
(41, 59.1795, 25.1660, 'Harjumaa', NULL, 'Kose', 'Kodu 2', 75101, 'Kose Grossi pood', NULL),
(42, 59.5005, 26.5185, 'Lääne-Virumaa', NULL, 'Kunda', 'Kasemäe 12', 44107, 'Kunda Grossi pood', NULL),
(43, 58.2526, 22.4863, 'Saaremaa', NULL, 'Kuressaare', 'Raekoja 10', 93814, 'Kuressaare Rae Konsum', NULL),
(44, 58.2632, 22.5081, 'Saaremaa', NULL, 'Kuressaare', 'Tallinna 67', 93815, 'Kuressaare Selver', NULL),
(45, 59.4499, 25.4331, 'Harjumaa', NULL, 'Kuusalu', 'Kuusalu tee 13', 74619, 'Kuusalu Konsum', NULL),
(46, 58.8275, 22.7768, 'Hiiu maakond', NULL, 'Käina', 'Hiiu mnt 9', 92101, 'Käina Konsum', NULL),
(47, 58.9907, 22.7649, 'Hiiumaa', NULL, 'Kärdla', 'Rehemäe', 92422, 'Kärdla Selver', NULL),
(48, 59.3434, 24.6154, 'Harjumaa', NULL, 'Laagri', 'Pärnu mnt 556a', 76401, 'Laagri Rimi', NULL),
(49, 59.3575, 24.6021, 'Harjumaa', NULL, 'Laagri', 'Instituudi tee 132', 76401, 'Laagri Veskimöldre keskus', NULL),
(50, 59.3781, 24.2388, 'Harjumaa', NULL, 'Laulasmaa', 'Kloogaranna tee 26', 76702, 'Laulasmaa Selver', NULL),
(51, 58.5718, 22.6822, 'Saaremaakond', NULL, 'Leisi', 'Mustjala mnt. 5', 94202, 'Leisi kauplus', NULL),
(52, 58.6867, 23.8337, 'Pärnumaa', NULL, 'Lihula', 'Tallinna maantee 29', 90303, 'Lihula Ehituskeskus', NULL),
(53, 59.5792, 25.7280, 'Harjumaa', NULL, 'Loksa', 'Rohuaia 6', 74806, 'Loksa Grossi kauplus', NULL),
(54, 59.4358, 24.9422, 'Harjumaa', NULL, 'Loo', 'Saha tee 9', 74201, 'Loo Grossi kauplus', NULL),
(55, 59.4735, 25.0198, 'Harjumaa', NULL, 'Maardu', 'Keemikute 2', 74116, 'Maardu Maxima XX', NULL),
(56, 58.6052, 23.2367, 'Saaremaa', NULL, 'Muhu', 'Liiva küla', 94701, 'Muhu Liiva Konsum', NULL),
(57, 59.4549, 24.4440, 'Harjumaa', NULL, 'Muraste', 'Lee tee 1', 76905, 'Muraste Konsum', NULL),
(58, 58.2352, 25.8655, 'Viljandimaa', NULL, 'Mustla', 'Posti 52a', 69701, 'Mustla Konsum', NULL),
(59, 58.8493, 26.9452, 'Jõgevamaa', NULL, 'Mustvee', 'Tähe 9', 49603, 'Mustvee Grossi kauplus', NULL),
(60, 58.9077, 24.4360, 'Raplamaa', NULL, 'Märjamaa', 'Kasti tee 1/3', 78302, 'Märjamaa Maxima X', NULL),
(61, 59.3809, 28.1767, 'Ida-Virumaa', NULL, 'Narva', 'Tallinna mnt 41', 20605, 'Narva Astri keskus', NULL),
(62, 59.3867, 28.1791, 'Ida-Virumaa', NULL, 'Narva', 'Kangelaste prospekt 29', 20607, 'Narva Kangelaste Prisma', NULL),
(63, 59.3642, 28.1868, 'Ida-Virumaa', NULL, 'Narva', 'Kreenholmi 52', 20104, 'Narva Kreenholmi Maxima XX', NULL),
(64, 59.2500, 27.4167, 'Ida-Virumaa', NULL, 'Narva', 'Tiimanni 20', 21004, 'Narva Tiimanni Maxima', NULL),
(65, 59.3872, 28.1674, 'Ida-Virumaa', NULL, 'Narva', 'Pähklimäe 6', 20605, 'Narva Pähklimäe 6a Grossi kaubad', NULL),
(66, 59.3855, 28.1842, 'Ida-Virumaa', NULL, 'Narva', 'Rakvere 71', 20607, 'Narva Megamarket', NULL),
(67, 59.3785, 28.1893, 'Ida-Virumaa', NULL, 'Narva', 'Fama Põik 10', 20303, 'Narva Fama keskus', NULL),
(68, 59.2500, 27.4167, 'Ida-Virumaa', NULL, 'Narva -Jõesuu', 'J. Poska 26', 29023, 'Narva-Jõesuu Konsum', NULL),
(69, 58.2773, 26.5363, 'Tartumaa', NULL, 'Nõo', 'Tartu 3a', 61601, 'Nõo Konsum', NULL),
(70, 58.5587, 23.0824, 'Saaremaakond', NULL, 'Orissaare', 'Kuivastu mnt 28', 94601, 'Orissaare Konsum', NULL),
(71, 58.0588, 26.4973, 'Valgamaa', NULL, 'Otepää', 'Valga maantee 1b', 67403, 'Otepää Maxima X', NULL),
(72, 58.8868, 25.5691, 'Järvamaa', NULL, 'Paide', 'Keskväljak 15', 72711, 'Paide Konsum', NULL),
(73, 58.3736, 24.6178, 'Pärnumaa', NULL, 'Paikuse', 'Pärnade pst 1', 86602, 'Paikuse Konsum', NULL),
(74, 59.3518, 24.0515, 'Harjumaa', NULL, 'Paldiski', 'Sadama 13', 76805, 'Paldiski Konsum', NULL),
(75, 59.3978, 24.8055, 'Harjumaa', NULL, 'Peetri', 'Küti tee 4', 75312, 'Peetri Keskus', NULL),
(76, 59.4024, 24.8109, 'Harjumaa', NULL, 'Peetri', 'Veesaare 2', 75312, 'Peetri Selver', NULL),
(77, 58.3351, 26.3103, 'Tartumaa', NULL, 'Puhja', 'Nooruse 2', 61301, 'Puhja Konsum', NULL),
(78, 58.5768, 26.2894, 'Jõgevamaa', NULL, 'Puurmani', 'Tallinna mnt 2', 49014, 'Puurmani Tallinna mnt 2', NULL),
(79, 58.6539, 25.9779, 'Jõgevamaa', NULL, 'Põltsamaa', 'Kesk 2', 48105, 'Põltsamaa Konsum', NULL),
(80, 58.0638, 27.0710, 'Põlvamaa', NULL, 'Põlva', 'Jaama 12', 63303, 'Põlva Selver', NULL),
(81, 57.7292, 26.9174, 'Võrumaa', NULL, 'Rõuge', 'Võru mnt 10', 66210, 'Rõuge A ja O', NULL),
(82, 58.3700, 24.5508, 'Pärnumaa', NULL, 'Pärnu', 'Papiniidu 8', 80010, 'Pärnu Kaubamajakas', NULL),
(83, 58.3874, 24.5014, 'Pärnumaa', NULL, 'Pärnu', 'Lai 5', 80010, 'Pärnu Keskus', NULL),
(84, 58.3956, 24.4580, 'Pärnumaa', NULL, 'Pärnu', 'Haapsalu mnt 43', 88317, 'Pärnu Maksimarket', NULL),
(85, 58.3588, 24.5725, 'Pärnumaa', NULL, 'Pärnu', 'Riia maantee 131', 80042, 'Pärnu Maxima XXX', NULL),
(86, 58.4085, 24.4944, 'Pärnumaa', NULL, 'Pärnu', 'Tallinna mnt 93a', 80041, 'Pärnu Ülejõe Selver', NULL),
(87, 58.6091, 24.5050, 'Pärnumaa', NULL, 'Pärnu-Jaagupi', 'Uus 20a', 87201, 'Pärnu-Jaagupi Grossi kauplus', NULL),
(88, 59.5025, 24.8678, 'Harjumaa', NULL, 'Pärnamäe', 'Pärnamäe tee 4a', 74008, 'Pärnamäe Keskus', NULL),
(89, 59.3599, 27.0368, 'Ida-Virumaa', NULL, 'Püssi', 'Kooli 14a', 43222, 'Püssi Kauplus', NULL),
(90, 59.3696, 25.1830, 'Harjumaa', NULL, 'Raasiku', 'Tallinna mnt 19/3', 75203, 'Raasiku Konsum', NULL),
(91, 59.2500, 26.3333, 'Lääne-Virumaa', NULL, 'Rakvere', 'E. Vilde tee 8', 44310, 'Rakvere kesklinna Rimi', NULL),
(92, 59.3640, 26.3405, 'Lääne-Virumaa', NULL, 'Rakvere', 'Haljala tee 4', 44415, 'Rakvere Põhjakeskus', NULL),
(93, 59.0108, 24.7933, 'Raplamaa', NULL, 'Rapla', 'Tallinna maantee 4', 79511, 'Rapla Selver', NULL),
(94, 58.1422, 26.2477, 'Tartumaa', NULL, 'Rõngu', 'Valga mnt 4', 61001, 'Rõngu Pagar', NULL),
(95, 58.0974, 27.4635, 'Põlvamaa', NULL, 'Räpina', 'Pargi 1', 64504, 'Räpina Maxima X', NULL),
(96, 59.1043, 24.3128, 'Harjumaa', NULL, 'Riisipere', 'Metsa 2', 76202, 'Riisipere Meie kauplus', NULL),
(97, 59.2932, 24.6574, 'Harjumaa', NULL, 'Saku', 'Üksnurme tee 2', 75501, 'Saku Selver', NULL),
(98, 59.3241, 24.5479, 'Harjumaa', NULL, 'Saue', 'Ladva 1a', 76506, 'Saue Maxima X', NULL),
(99, 58.4288, 24.4978, 'Pärnumaa', NULL, 'Sauga', 'Kuldnoka 1', 85008, 'Sauga Konsum', NULL),
(100, 59.3909, 27.7744, 'Ida-Virumaa', NULL, 'Sillamäe', 'Pavlovi 1', 40232, 'Sillamäe Maxima XX', NULL),
(101, 58.4048, 24.6517, 'Pärnumaa', NULL, 'Sindi', 'Jaama 8', 86705, 'Sindi Konsum', NULL),
(102, 58.5363, 25.4654, 'Viljandimaa', NULL, 'Suure-Jaani', 'Pärnu 3', 71502, 'Suure-Jaani Konsum', NULL),
(103, 59.1646, 26.1126, 'Lääne-Virumaa', NULL, 'Tamsalu', 'Koidu 16', 46107, 'Tamsalu Maxima X', NULL),
(104, 59.4299, 24.5436, 'Harjumaa', NULL, 'Tabasalu', 'Klooga maantee 10b', 76901, 'Tabasalu Rimi', NULL),
(105, 59.4028, 24.6561, 'Harjumaa', NULL, 'Tallinn', 'Akadeemia tee 35', 12618, 'Tallinna Akadeemia Konsum', NULL),
(106, 59.4519, 24.7177, 'Harjumaa', NULL, 'Tallinn', 'Erika 14', 10416, 'Tallinna Arsenali keskus', NULL),
(107, 59.4405, 24.7384, 'Harjumaa', NULL, 'Tallinn', 'Toompuiestee 37', 10133, 'Tallinna Balti jaam', NULL),
(108, 59.4313, 24.6290, 'Harjumaa', NULL, 'Tallinn', 'Haabersti 1', 13516, 'Tallinna Haabersti Rimi', NULL),
(109, 59.3826, 24.6637, 'Harjumaa', NULL, 'Tallinn', 'Pärnu mnt 386', 11612, 'Tallinna Hiiu Rimi', NULL),
(110, 59.4317, 24.8235, 'Harjumaa', NULL, 'Tallinn', 'Punane 16b', 13619, 'Tallinna Idakeskus', NULL),
(111, 59.3732, 24.6650, 'Harjumaa', NULL, 'Tallinn', 'Vabaduse pst 128', 10918, 'Tallinna Jannseni Maxima', NULL),
(112, 59.3934, 24.7193, 'Harjumaa', NULL, 'Tallinn', 'Pärnu mnt 238', 11624, 'Tallinna Järve keskus', NULL),
(113, 59.4032, 24.6693, 'Harjumaa', NULL, 'Tallinn', 'E. Vilde tee 124', 12914, 'Tallinna Kaja Maxima X', NULL),
(114, 59.4125, 24.6667, 'Harjumaa', NULL, 'Tallinn', 'Kadaka tee 56a', 12915, 'Tallinna Kadaka Selver', NULL),
(115, 59.4380, 24.8296, 'Harjumaa', NULL, 'Tallinn', 'Kalevipoja põik 12', 13625, 'Tallinna Kalevipoja Rimi', NULL),
(116, 59.4282, 24.6269, 'Harjumaa', NULL, 'Tallinn', 'Rannamõisa tee 6', 13516, 'Tallinna Kakumäe Selver', NULL),
(117, 59.4284, 24.7762, 'Harjumaa', NULL, 'Tallinn', 'Tartu mnt 49', 10115, 'Tallinna Keskturu Maxima X', NULL),
(118, 59.4204, 24.7292, 'Harjumaa', NULL, 'Tallinn', 'Kotka 12', 11315, 'Tallinna Kotka Selver', NULL),
(119, 59.4407, 24.7066, 'Harjumaa', NULL, 'Tallinn', 'Sõle 31', 10321, 'Tallinna Kolde Selver', NULL),
(120, 59.4270, 24.7215, 'Harjumaa', NULL, 'Tallinn', 'Endla 45', 10615, 'Tallinna Kristiine keskus', NULL),
(121, 59.4450, 24.8832, 'Harjumaa', NULL, 'Tallinn', 'Kärberi 20', 13812, 'Tallinna Kärberi keskus', NULL),
(122, 59.4406, 24.8628, 'Harjumaa', NULL, 'Tallinn', 'Mustakivi tee 13', 13912, 'Tallinna Lasnamäe Centrum', NULL),
(123, 59.4464, 24.8637, 'Harjumaa', NULL, 'Tallinn', 'Mustakivi tee 17', 13912, 'Tallinna Lasnamäe Prisma', NULL),
(124, 59.4502, 24.8812, 'Harjumaa', NULL, 'Tallinn', 'Linnamäe tee 57', 13911, 'Tallinna Linnamäe Maxima XXX', NULL),
(125, 59.4529, 24.8746, 'Harjumaa', NULL, 'Tallinn', 'Läänemere tee 28', 13913, 'Tallinna Läänemere Selver', NULL),
(126, 59.4161, 24.7399, 'Harjumaa', NULL, 'Tallinn', 'Pärnu mnt 106', 11312, 'Tallinna Magdaleena', NULL),
(127, 59.4023, 24.6972, 'Harjumaa', NULL, 'Tallinn', 'Sõpruse pst 201/203', 13419, 'Tallinna Magistrali keskus', NULL),
(128, 59.4089, 24.6817, 'Harjumaa', NULL, 'Tallinn', 'A. H. Tammsaare tee 104a', 12918, 'Tallinna Mustamäe keskus', NULL),
(129, 59.4422, 24.8736, 'Harjumaa', NULL, 'Tallinn', 'Mahtra 1', 13811, 'Tallinna Mustakivi keskus', NULL),
(130, 59.4228, 24.6964, 'Harjumaa', NULL, 'Tallinn', 'Mustamäe tee 16', 10617, 'Tallinna Marienthali Selver', NULL),
(131, 59.4068, 24.6831, 'Harjumaa', NULL, 'Tallinn', 'Tammsaare tee 116', 12918, 'Tallinna Mustika keskus', NULL),
(132, 59.3722, 24.7166, 'Harjumaa', NULL, 'Tallinn', 'Männiku tee 100', 11215, 'Tallinna Männiku Rimi', NULL),
(133, 59.4386, 24.7704, 'Harjumaa', NULL, 'Tallinn', 'Narva mnt 23', 10120, 'Tallinna Narva mnt Selver', NULL),
(134, 59.4135, 24.6551, 'Harjumaa', NULL, 'Tallinn', 'Õismäe tee 1b', 13514, 'Tallinna Nurmenuku keskus', NULL),
(135, 59.4296, 24.7923, 'Harjumaa', NULL, 'Tallinn', 'Pallasti 18', 11414, 'Tallinna Pallasti Maxima X', NULL),
(136, 59.4484, 24.8451, 'Harjumaa', NULL, 'Tallinn', 'Paasiku 2a', 13915, 'Tallinna Paasiku Grossi kauplus', NULL),
(137, 59.4351, 24.8111, 'Harjumaa', NULL, 'Tallinn', 'Paepargi 57', 11417, 'Tallinna Paepargi Maxima XX', NULL),
(138, 59.4450, 24.7006, 'Harjumaa', NULL, 'Tallinn', 'Sõle 51', 10318, 'Tallinna Pelgulinna Selver', NULL),
(139, 59.4890, 24.8372, 'Harjumaa', NULL, 'Tallinn', 'Merivälja tee 24', 12112, 'Tallinna Pirita keskus', NULL),
(140, 59.4623, 24.8284, 'Harjumaa', NULL, 'Tallinn', 'Rummu tee 4', 11911, 'Tallinna Pirita Selver', NULL),
(141, 59.4346, 24.8349, 'Harjumaa', NULL, 'Tallinn', 'Punane 46', 13619, 'Tallinna Punane Selver', NULL),
(142, 59.4442, 24.7430, 'Harjumaa', NULL, 'Tallinn', 'Põhja pst 17', 10414, 'Tallinna Põhja Rimi', NULL),
(143, 59.3663, 24.7599, 'Harjumaa', NULL, 'Tallinn', 'Viljandi mnt 41a', 11218, 'Tallinna Raudalu Konsum', NULL),
(144, 59.4358, 24.7209, 'Harjumaa', NULL, 'Tallinn', 'Telliskivi 24', 10611, 'Tallinna Ristiku Selver', NULL),
(145, 59.4072, 24.8073, 'Harjumaa', NULL, 'Tallinn', 'Tartu mnt 87', 10112, 'Tallinna Sikupilli keskus', NULL),
(146, 59.4349, 24.8305, 'Harjumaa', NULL, 'Tallinn', 'J. Smuuli tee 9', 13628, 'Tallinna Smuuli Maxima XX', NULL),
(147, 59.4472, 24.6929, 'Harjumaa', NULL, 'Tallinn', 'Tuulemaa 20', 10315, 'Tallinna Stroomi keskus', NULL),
(148, 59.4316, 24.7604, 'Harjumaa', NULL, 'Tallinn', 'Liivalaia 53', 10145, 'Tallinna Stockmann', NULL),
(149, 59.4146, 24.7076, 'Harjumaa', NULL, 'Tallinn', 'Sõpruse pst 174', 13424, 'Tallinna Sõpruse Rimi', NULL),
(150, 59.4415, 24.7299, 'Harjumaa', NULL, 'Tallinn', 'Telliskivi 61', 10412, 'Tallinna Telliskivi Rimi', NULL),
(151, 59.4285, 24.7054, 'Harjumaa', NULL, 'Tallinn', 'Mustamäe tee 3', 10616, 'Tallinna Telia WoHo', NULL),
(152, 59.4032, 24.7160, 'Harjumaa', NULL, 'Tallinn', 'A. H. Tammsaare tee 62', 11316, 'Tallinna Tondi Selver', NULL),
(153, 59.4361, 24.7782, 'Harjumaa', NULL, 'Tallinn', 'Vesivärava 37', 10126, 'Tallinna Torupilli Selver', NULL),
(154, 59.4419, 24.8500, 'Harjumaa', NULL, 'Tallinn', 'Tähesaju tee 1', 13917, 'Tallinna Tähesaju Selver', NULL),
(155, 59.4530, 24.7170, 'Harjumaa', NULL, 'Tallinn', 'Tööstuse 103', 10416, 'Tallinna Tööstuse Rimi', NULL),
(156, 59.4032, 24.6693, 'Harjumaa', NULL, 'Tallinn', 'E. Vilde tee 75/77', 12911, 'Tallinna Vilde tee Maxima XX', NULL),
(157, 59.4248, 24.7436, 'Harjumaa', NULL, 'Tallinn', 'Pärnu mnt 67a', 10134, 'Tallinna Vineeri trammipeatus', NULL),
(158, 59.4366, 24.7549, 'Harjumaa', NULL, 'Tallinn', 'Viru väljak 4', 10111, 'Tallinna Viru keskuse bussiterminal', NULL),
(159, 59.4073, 24.6408, 'Harjumaa', NULL, 'Tallinn', 'Järveotsa tee 35b', 13520, 'Tallinna Järveotsa Grossi kauplus', NULL),
(160, 59.4297, 24.7671, 'Harjumaa', NULL, 'Tallinn', 'Keldrimäe 9', 10113, 'Tallinna Keskturu parkla', NULL),
(161, 59.4488, 24.8630, 'Harjumaa', NULL, 'Tallinn', 'Linnamäe tee 3', 13912, 'Tallinna Linnamäe Konsum', NULL),
(162, 59.4189, 24.6426, 'Harjumaa', NULL, 'Tallinn', 'Õismäe tee 88', 13513, 'Tallinna Õismäe tee 88 Maxima X', NULL),
(163, 59.4115, 24.6475, 'Harjumaa', NULL, 'Tallinn', 'Õismäe tee 46', 13512, 'Tallinna Õismäe Maxima XX', NULL),
(164, 59.4211, 24.6512, 'Harjumaa', NULL, 'Tallinn', 'Ehitajate tee 148', 13517, 'Tallinna Õismäe Maxima XXX', NULL),
(165, 59.4216, 24.7958, 'Harjumaa', NULL, 'Tallinn', 'Suur-Sõjamäe 4', 11415, 'Tallinna Ülemiste keskus', NULL),
(166, 59.2649, 25.9667, 'Lääne-Virumaa', NULL, 'Tapa', 'Kalmistu 3', 45108, 'Tapa Konsum', NULL),
(167, 58.3730, 26.7544, 'Tartumaa', NULL, 'Tartu', 'Kalda tee 15', 50703, 'Tartu Anne Maxima XX', NULL),
(168, 58.3761, 26.7804, 'Tartumaa', NULL, 'Tartu', 'Nõlvaku 2', 50708, 'Tartu Anne Prisma', NULL),
(169, 58.3574, 26.7206, 'Tartumaa', NULL, 'Tartu', 'Võru 77', 50112, 'Tartu Aardla Selver', NULL),
(170, 58.3731, 26.7507, 'Tartumaa', NULL, 'Tartu', 'Kalda tee 1c', 50703, 'Tartu Eedeni keskus', NULL),
(171, 58.3700, 26.7101, 'Tartumaa', NULL, 'Tartu', 'Lembitu 2', 50406, 'Tartu Lembitu Konsum', NULL),
(172, 58.3704, 26.7216, 'Tartumaa', NULL, 'Tartu', 'Võru 55 F', 50410, 'Tartu Sõbrakeskus', NULL),
(173, 58.3725, 26.7383, 'Tartumaa', NULL, 'Tartu', 'Turu 2', 51004, 'Tartu bussijaam', NULL),
(174, 58.3586, 26.6766, 'Tartumaa', NULL, 'Tartu', 'Ringtee 75', 50501, 'Tartu Lõunakeskus', NULL),
(175, 58.3921, 26.7299, 'Tartumaa', NULL, 'Tartu', 'Narva maantee 112', 50303, 'Tartu Raadi Maxima XX', NULL),
(176, 58.4027, 26.7414, 'Tartumaa', NULL, 'Tartu', 'Kaupmehe 2', 60532, 'Tartu Raadimõisa Konsum', NULL),
(177, 58.3685, 26.7388, 'Tartumaa', NULL, 'Tartu', 'Rebase 10', 50104, 'Tartu Rebase Rimi', NULL),
(178, 58.3720, 26.7208, 'Tartumaa', NULL, 'Tartu', 'Era 2', 51010, 'Tartu Riiamäe Alexela', NULL),
(179, 58.3530, 26.6865, 'Tartumaa', NULL, 'Tartu', 'Aardla 114', 50415, 'Tartu Ringtee Selver', NULL),
(180, 58.3761, 26.6971, 'Tartumaa', NULL, 'Tartu', 'Vitamiini 1', 50412, 'Tartu Veeriku Selver', NULL),
(181, 58.0027, 25.9224, 'Valgamaa', NULL, 'Tõrva', 'Valga 3a', 68601, 'Tõrva Kevade keskus', NULL),
(182, 58.3865, 26.7238, 'Tartumaa', NULL, 'Tartu', 'Ujula 2', 51008, 'Tartu Ujula Konsum', NULL),
(183, 58.3230, 26.7107, 'Tartumaa', NULL, 'Tõrvandi', 'Müürsepa 1', 61715, 'Tõrvandi Konsum', NULL),
(184, 58.3360, 23.9931, 'Pärnumaa', NULL, 'Tõstamaa', 'Kalli mnt 1', 88101, 'Tõstamaa Food Market', NULL),
(185, 58.8085, 25.4272, 'Järvamaa', NULL, 'Türi', 'Tallinna 4', 72211, 'Türi Konsum', NULL),
(186, 58.9406, 23.5825, 'Läänemaa', NULL, 'Uuemõisa', 'Tallinna mnt 84', 90401, 'Uuemõisa Konsum', NULL),
(187, 59.2856, 24.9765, 'Harjumaa', NULL, 'Vaida', 'Vana-Vaida tee 3', 75302, 'Vaido A ja O', NULL),
(188, 59.4041, 27.5815, 'Ida-Virumaa', NULL, 'Voka', 'Narva mnt 5', 41701, 'Voka Grossi kaubad', NULL),
(189, 58.6304, 25.5581, 'Viljandimaa', NULL, 'Võhma', 'Tallinna 26', 70602, 'Võhma Konsum', NULL),
(190, 57.7778, 26.0281, 'Valgamaa', NULL, 'Valga', 'Riia 18', 68203, 'Valga Rimi', NULL),
(191, 57.7320, 27.2840, 'Võrumaa', NULL, 'Vastseliina', 'Võidu 21', 65201, 'Vastseliina Konsum', NULL),
(192, 59.3333, 24.8333, 'Harjumaa', NULL, 'Vasalemma', 'Jaama tee 3', 76101, 'Vasalemma Meie kauplus', NULL),
(193, 59.5049, 24.8300, 'Harjumaa', NULL, 'Viimsi', 'Pargi tee 22', 74001, 'Viimsi Maxima X', NULL),
(194, 59.5049, 24.8271, 'Harjumaa', NULL, 'Viimsi', 'Sõpruse tee 15', 74001, 'Viimsi Selver', NULL),
(195, 58.3549, 25.5847, 'Viljandimaa', NULL, 'Viljandi', 'Riia mnt 13', 71002, 'Viljandi Männimäe Rimi', NULL),
(196, 58.3707, 25.5832, 'Viljandimaa', NULL, 'Viljandi', 'Lääne 2', 71013, 'Viljandi Maksimarket', NULL),
(197, 58.3692, 25.5990, 'Viljandimaa', NULL, 'Viljandi', 'Ilmarise 1', 71007, 'Viljandi bussijaam', NULL),
(198, 57.8354, 27.0102, 'Võrumaa', NULL, 'Võru', 'Jüri 83', 65607, 'Võru Maksimarket', NULL),
(199, 57.8478, 27.0049, 'Võrumaa', NULL, 'Võru', 'Kooli 2', 65606, 'Võru Maxima XX', NULL),
(200, 59.1284, 26.2525, 'Lääne-Virumaa', NULL, 'Väike-Maarja', 'Pikk 12', 46202, 'Väike-Maarja Konsum', NULL),
(201, 58.6540, 25.0382, 'Pärnumaa', NULL, 'Vändra', 'Pärnu-Paide mnt 21', 87701, 'Vändra Konsum', NULL),
(202, 57.9591, 27.6316, 'Võrumaa', NULL, 'Värska', 'Järvesuu 2a', 64001, 'Värska kauplus', NULL),
(203, 59.4335, 24.3679, 'Harjumaa', NULL, 'Vääna-Jõesuu', 'Männiku', 76909, 'Vääna-Jõesuu Meie kauplus', NULL),
(204, 58.3151, 26.7221, 'Tartumaa', NULL, 'Ülenurme', 'Võru mnt 2', 61714, 'Ülenurme Konsum', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dpd`
--
ALTER TABLE `dpd`
  ADD PRIMARY KEY (`dpd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dpd`
--
ALTER TABLE `dpd`
  MODIFY `dpd_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
