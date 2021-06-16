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
-- Table structure for table `itella`
--

CREATE TABLE `itella` (
  `itella_id` int(4) NOT NULL,
  `lat` float(6,4) NOT NULL,
  `lon` float(6,4) NOT NULL,
  `maakond` varchar(75) COLLATE utf8_estonian_ci DEFAULT NULL,
  `valla_nimi` varchar(50) COLLATE utf8_estonian_ci DEFAULT NULL,
  `linn` varchar(60) COLLATE utf8_estonian_ci NOT NULL,
  `aadress` varchar(75) COLLATE utf8_estonian_ci NOT NULL,
  `postiindeks` int(9) NOT NULL,
  `kauplus` varchar(50) COLLATE utf8_estonian_ci NOT NULL,
  `lisainfo` varchar(100) COLLATE utf8_estonian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `itella`
--

INSERT INTO `itella` (`itella_id`, `lat`, `lon`, `maakond`, `valla_nimi`, `linn`, `aadress`, `postiindeks`, `kauplus`, `lisainfo`) VALUES
(1, 58.3530, 25.5843, NULL, NULL, 'Viljandi', 'Riia mnt 35', 71002, 'Viljandi Männimäe Selver', 'Selveri kassade vastas boksis'),
(2, 59.4300, 24.6984, NULL, NULL, 'Tallinn', 'Paldiski mnt 56', 10614, 'Tallinna Merimetsa Selver', 'hoone parempoolses tiivas, Merimetsa Selveri fuajees'),
(3, 59.4431, 24.8631, NULL, NULL, 'Tallinn', 'Mustakivi tee 17', 13912, 'Tallinna Lasnamäe Prisma', 'Vasakpoolse sissepääsu juures'),
(4, 58.3681, 26.7673, NULL, NULL, 'Tartu', 'Kalda tee 43', 50703, 'Tartu Anne Selver', 'Selveri infoleti kõrval koridoris'),
(5, 58.3594, 26.6773, NULL, NULL, 'Tartu', 'Ringtee 75', 50501, 'Tartu Lõunakeskuse Rimi', 'hoone liuväljapoolses tiivas Anni pesusalongi vastas'),
(6, 59.3583, 27.4141, NULL, NULL, 'Jõhvi', 'Keskväljak 4', 41531, 'Jõhvi Tsentraal', '1. korrusel Büroomaailma kõrval'),
(7, 59.3811, 28.1754, NULL, NULL, 'Narva', 'Tallinna mnt 41', 20605, 'Narva Astri Keskus', 'Selveri kassade kõrval'),
(8, 59.3487, 26.3641, NULL, NULL, 'Rakvere', 'F. G. Adoffi 11', 44310, 'Rakvere Kroonikeskus', 'Selveri müügisaali sissepääsu vastas'),
(9, 58.7460, 26.3981, NULL, NULL, 'Jõgeva', 'Aia 3', 48306, 'Jõgeva Kaubahall', '1. korrusel apteegi kõrval'),
(10, 58.8856, 25.5639, NULL, NULL, 'Paide', 'Aiavilja 4', 72712, 'Paide Selver', '1. korrusel koridori lõpus'),
(11, 58.9983, 24.7907, NULL, NULL, 'Rapla', 'Tallinna mnt 50a', 79514, 'Rapla Maxima', 'kassade vastas'),
(12, 58.9368, 23.5692, NULL, NULL, 'Haapsalu', 'Rannarootsi tee 1', 78302, 'Rannarootsi Keskus', 'Selveri infoleti kõrval koridoris'),
(13, 58.9897, 22.7632, NULL, NULL, 'Kärdla', 'Rehemäe, Linnumäe küla, Pühalepa vald', 92420, 'Kärdla Selver', 'Selveri kassade kõrval seina ääres'),
(14, 58.2632, 22.5086, NULL, NULL, 'Kuressaare', 'Tallinna 67', 93815, 'Kuressaare Saare Selver', 'Selveri kassade vastas boksis'),
(15, 58.3701, 24.5503, NULL, NULL, 'Pärnu', 'Papiniidu 8', 80042, 'Pärnu Kaubamajakas', '1. korrusel Triumph pesupoe vastas'),
(16, 57.7768, 26.0274, NULL, NULL, 'Valga', 'Raja 5', 68203, 'Valga Selver', 'kassade vastas boksis'),
(17, 57.8460, 27.0086, NULL, NULL, 'Võru', 'Kooli 6', 65606, 'Võru Kagukeskus', '1. korrusel Elisa esinduse kõrval'),
(18, 59.4404, 24.8642, NULL, NULL, 'Tallinn', 'Mustakivi tee 13', 13912, 'Tallinna Lasnamäe Centrum (RIMI)', 'Sportlandi kõrval koridoris'),
(19, 59.4239, 24.6439, NULL, NULL, 'Tallinn', 'Haabersti 1', 13516, 'Tallinna Haabersti Rimi', 'peasissepääsu kõrval'),
(20, 59.4322, 24.7803, NULL, NULL, 'Tallinn', 'Vesivärava 37', 10152, 'Tallinna Torupilli Selver', 'kassade vastas nurgapealses boksis'),
(21, 58.6540, 25.9804, NULL, NULL, 'Põltsamaa', 'Jõgeva mnt. 1a', 48105, 'Põltsamaa Selver', '1. korrusel trepi kõrval (läbi Selveri)'),
(22, 59.4626, 24.8270, NULL, NULL, 'Tallinn', 'Rummu tee 4', 11911, 'Tallinna Pirita Selver', 'Selveri infoleti kõrval'),
(23, 59.3930, 24.7207, NULL, NULL, 'Tallinn', 'Pärnu mnt. 238', 11624, 'Tallinna Järve Keskus', '2. korrusel Humana kaupluse kõrval'),
(24, 58.4083, 24.4941, NULL, NULL, 'Pärnu', 'Tallinna mnt 93a', 80041, 'Pärnu Ülejõe Selver', '1. korrusel koridori lõpus'),
(25, 58.0517, 27.0462, NULL, NULL, 'Põlva', 'Aasa 1', 63304, 'Põlva Edu Keskus', 'taaraautomaadi kõrval boksis'),
(26, 58.3870, 24.5025, NULL, NULL, 'Pärnu', 'Aida 7', 80010, 'Pärnu Keskus', '1. korrusel Sportlandi Outleti sissepääsu juures'),
(27, 59.3413, 24.6127, NULL, NULL, 'Tallinn', 'Pärnu mnt 558a', 76401, 'Laagri Maksimarket', 'kassade kõrval koridori lõpus'),
(28, 59.3133, 24.4214, NULL, NULL, 'Keila', 'Piiri 12', 76610, 'Keila Selver', 'apteegi vastas boksis'),
(29, 58.3778, 26.7304, NULL, NULL, 'Tartu', 'Turu 2', 51014, 'Tartu Tasku', 'Turu tänava sissepääsu juures 1. korrusel liftide vastas'),
(30, 58.3683, 26.7391, NULL, NULL, 'Tartu', 'Rebase 10', 50104, 'Tartu Rebase Rimi', 'parklapoolse sissepääsu juures paremal boksis'),
(31, 59.4032, 24.7143, NULL, NULL, 'Tallinn', 'Tammsaare tee 62', 11316, 'Tallinna Tondi Selver', 'Selveri infoleti kõrval'),
(32, 59.4104, 24.6826, NULL, NULL, 'Tallinn', 'Tammsaare tee 116', 12918, 'Tallinna Mustika Prisma', 'keskuse peaukse juures infoleti kõrval'),
(33, 59.5064, 24.8318, NULL, NULL, 'Viimsi', 'Randvere tee 6', 74001, 'Viimsi Kaubanduskeskus (Delice)', 'peasissepääsu juures paremal boksis'),
(34, 59.4437, 24.8228, NULL, NULL, 'Tallinn', 'Smuuli tee 9', 13628, 'Tallinna Smuuli Maxima', 'kassade vastas koridoris'),
(35, 58.6547, 25.0378, NULL, NULL, 'Vändra', 'Pärnu-Paide mnt. 21', 87701, 'Vändra Konsum', 'Konsumi kassade kõrval koridoris'),
(36, 58.8129, 25.4290, NULL, NULL, 'Türi', 'Paide 26', 72211, 'Türi mini-Rimi', 'kassade vastas'),
(37, 58.2224, 26.4109, NULL, NULL, 'Elva', 'Kesk 7', 61504, 'Elva mini-Rimi', 'kassade vastas'),
(38, 58.9053, 24.4209, NULL, NULL, 'Märjamaa', 'Pärnu mnt 62', 78304, 'Märjamaa Konsum', 'kassade kõrval'),
(39, 59.4279, 24.7236, NULL, NULL, 'Tallinn', 'Endla 45', 10701, 'Tallinna Kristiine Keskus 1.korrus', 'Prisma iseteeninduskassade vastas SEB kõrval'),
(40, 59.2654, 25.9630, NULL, NULL, 'Tapa', 'Sauna 1', 45109, 'Tapa Bussijaam', 'peaukse kõrval'),
(41, 57.9980, 25.9327, NULL, NULL, 'Tõrva', 'Tamme 2', 68605, 'Tõrva Maxima', 'kassade vastas boksis'),
(42, 58.0565, 26.4990, NULL, NULL, 'Otepää', 'Valga mnt 1B', 67403, 'Otepää Maxima', 'kassade vastas boksis'),
(43, 58.3729, 26.7509, NULL, NULL, 'Tartu', 'Kalda tee 1c', 50703, 'Tartu Eeden', '1. korrusel infoleti vastas'),
(44, 59.3606, 26.3353, NULL, NULL, 'Rakvere', 'Tõrremäe, Rakvere vald', 44415, 'Rakvere Põhjakeskus', 'Rimi infoletist vasakul pool koridoris'),
(45, 59.4264, 24.6515, NULL, NULL, 'Tallinn', 'Paldiski mnt 102', 13522, 'Tallinna Rocca Al Mare Keskus', 'Prisma Peremarket kassade vastas eskalaatorite all'),
(46, 59.4260, 24.7806, NULL, NULL, 'Tallinn', 'Tartu mnt 87', 10112, 'Tallinna Sikupilli Prisma', 'koridori lõpus loomapoe Penner taga'),
(47, 59.4337, 24.7510, NULL, NULL, 'Tallinn', 'Estonia pst. 9', 10143, 'Tallinna Solaris Keskus', '0. korrusel kaupluse Biomarket kõrval'),
(48, 59.2919, 24.6540, NULL, NULL, 'Saku', 'Üksnurme tee 2', 75501, 'Saku Selver', 'Kassade vastas boksis'),
(49, 58.2642, 22.4760, NULL, NULL, 'Kuressaare', 'Kihelkonna mnt. 3', 93810, 'Kuressaare Kihelkonna mini-Rimi', 'toidupoe kassade vastas'),
(50, 58.3746, 24.5373, NULL, NULL, 'Pärnu', 'Riia mnt 131', 80011, 'Pärnu Maxima XXX', 'Popshop kaupluse vastas'),
(51, 59.4354, 24.7567, NULL, NULL, 'Tallinn', 'Gonsiori 2', 10143, 'Tallinna Kaubamaja', 'Laikmaa tänava sissepääsu juures 1.  korrusel'),
(52, 59.4734, 25.0185, NULL, NULL, 'Maardu', 'Keemikute 2', 74116, 'Maardu Maxima', '1. korrusel kassade vastas'),
(53, 58.3700, 25.5978, NULL, NULL, 'Viljandi', 'Tallinna tn. 41', 71020, 'Viljandi Uku keskus', '1. korrusel Apollo raamatupoe kõrval'),
(54, 58.3919, 26.7279, NULL, NULL, 'Tartu', 'Narva mnt 112/Peetri 26B', 50303, 'Tartu Raadi Maxima', '1. korrusel apteegi kõrval'),
(55, 59.4024, 24.6973, NULL, NULL, 'Tallinn', 'Sõpruse pst 201/203', 13419, 'Tallinna Magistrali Keskus', '0. korrusel sissepääsu juures'),
(56, 58.3697, 26.7106, NULL, NULL, 'Tartu', 'Lembitu tn. 2', 50406, 'Tartu Lembitu Konsum', '1. korrusel kassade kõrval'),
(57, 58.9390, 23.5404, NULL, NULL, 'Haapsalu', 'Jaama 32', 90507, 'Haapsalu Rimi', '1. korrusel peasissepääsu juures'),
(58, 57.8345, 27.0102, NULL, NULL, 'Võru', 'Jüri 85', 65607, 'Võru Rimi', 'Peetri Pizza kõrval'),
(59, 58.3532, 26.6861, NULL, NULL, 'Tartu', 'Aardla 114', 50415, 'Tartu Ringtee Selver', '1. korrusel koridori lõpus kassade vastas'),
(60, 58.3769, 26.7789, NULL, NULL, 'Tartu', 'Nõlvaku tee 2', 50708, 'Tartu Anne Prisma', '1. korrusel eskalaatori kõrval'),
(61, 58.3571, 26.7203, NULL, NULL, 'Tartu', 'Võru 77', 50112, 'Tartu Aardla Selver', '1. korrusel kellassepa ja lillepoe vahel'),
(62, 58.3956, 24.4581, NULL, NULL, 'Pärnu', 'Haapsalu mnt 43', 88300, 'Pärnu Maksimarket', '1. korrusel peaukse juures'),
(63, 59.3661, 24.7595, NULL, NULL, 'Tallinn', 'Viljandi mnt. 41a', 11218, 'Raudalu Konsum', '1. korrusel koridori lõpus Peetri Pizza vastas'),
(64, 59.4529, 24.8756, NULL, NULL, 'Tallinn', 'Läänemere tee 28', 13913, 'Tallinna Läänemere Selver', '1. korrusel Apotheka apteegi kõrval'),
(65, 58.3778, 26.7278, NULL, NULL, 'Tartu', 'Riia 1', 51004, 'Tartu Kaubamaja 0 korrus', '0. korruse liftitamburis'),
(66, 59.3241, 24.5479, NULL, NULL, 'Saue', 'Ladva 1a', 76506, 'Saue Maxima', '1. korrusel kassade vastas'),
(67, 59.4739, 24.9160, NULL, NULL, 'Tallinn', 'Altmetsa 1', 74117, 'Muuga Maxima', '1. korrusel kassade vastas'),
(68, 59.4019, 24.8110, NULL, NULL, 'Tallinn', 'Veesaare tee 2', 75312, 'Peetri Selver', 'Selverisse sissepääsu juures Kika loomapoe kõrval'),
(69, 59.4300, 24.5437, NULL, NULL, 'Tabasalu', 'Klooga mnt 10b', 76901, 'Tabasalu Rimi', '1. korrusel Pitsapoiste kõrval'),
(70, 59.3865, 28.1772, NULL, NULL, 'Narva', 'Kangelaste prospekt 29', 20607, 'Narva Prisma', '1. korrusel kassade kõrval'),
(71, 58.8867, 25.5400, NULL, NULL, 'Paide', 'Ringtee 2', 72720, 'Paide Maksimarket', '1. korrusel'),
(72, 59.3583, 24.9129, NULL, NULL, 'Jüri', 'Aruküla tee 29', 75301, 'Jüri Konsum', '1. korrusel kassade vastas'),
(73, 59.3534, 27.4116, NULL, NULL, 'Jõhvi', 'Tartu mnt 15a', 41538, 'Jõhvi Grossi kpl', '1. korrusel kassade vastas'),
(74, 59.4125, 24.6669, NULL, NULL, 'Tallinn', 'Kadaka tee 56A', 12915, 'Tallinna Kadaka Selver', '1. korrusel infoleti kõrval'),
(75, 59.4227, 24.7917, NULL, NULL, 'Tallinn', 'Suur-Sõjamäe 4', 11415, 'Tallinna Ülemiste keskus', '1.k Ülemiste jaama poolse eskalaatori vastas'),
(76, 59.4473, 24.6926, NULL, NULL, 'Tallinn', 'Tuulemaa 20', 10315, 'Tallinna Stroomi Keskus', 'Maxima kassade vastas loomapoe kõrval'),
(77, 58.3688, 24.5457, NULL, NULL, 'Pärnu', 'Papiniidu 42', 80042, 'Pärnu Mai Selver', '1. korrusel apteegi vastas'),
(78, 59.0085, 24.7942, NULL, NULL, 'Rapla', 'Tallinna maantee 4', 79513, 'Rapla Selver', 'Expert tehnikapoe ees'),
(79, 58.3665, 25.5929, NULL, NULL, 'Viljandi', 'Turu 16', 71003, 'Viljandi Turu Konsum', '1. korrusel kassade vastas'),
(80, 59.5048, 24.8277, NULL, NULL, 'Viimsi', 'Sõpruse tee 15', 74001, 'Viimsi Keskus (Selver)', 'Jazz pesula poolse sissepääsu kõrval'),
(81, 59.4500, 24.8800, NULL, NULL, 'Tallinn', 'Linnamäe tee 57', 13911, 'Tallinna Priisle Maxima XXX', 'Vasakpoolse sissepääsu kõrval'),
(82, 59.4025, 24.6856, NULL, NULL, 'Tallinn', 'Vilde tee 77', 12912, 'Tallinna Vilde tee Maxima XX', '1. korrusel peasissepääsust paremal koridori lõpus'),
(83, 59.4085, 24.6903, NULL, NULL, 'Tallinn', 'A. H. Tammsaare tee 104a', 12918, 'Tallinna Mustamäe Keskus', '1. korrusel kauplus MARILYN kõrval'),
(84, 58.3763, 26.6967, NULL, NULL, 'Tartu', 'Vitamiini 1', 51014, 'Tartu Veeriku Selver', 'Hesburgeri vastas boksis'),
(85, 59.3379, 27.4203, NULL, NULL, 'Kohtla-Järve', 'Puru tee 77', 31023, 'Ahtme Maxima', '1. korrusel apteegi vastas'),
(86, 59.4454, 24.8830, NULL, NULL, 'Tallinn', 'K. Kärberi 20/20a', 13812, 'Tallinna Kärberi Selver', 'Sun Grill söögikoha vastas'),
(87, 59.4324, 24.7615, NULL, NULL, 'Tallinn', 'Liivalaia 53', 10145, 'Tallinna Stockmann', '5. korrusel Euroapteegi kõrval'),
(88, 58.3778, 26.7278, NULL, NULL, 'Tartu', 'Riia 1', 51004, 'Tartu Kaubamaja   -1 korrus', '-1. korruse liftitamburis'),
(89, 58.7432, 26.3753, NULL, NULL, 'Jõgeva', 'Aia 33', 48304, 'Jõgeva Pae Konsum', '1. korrusel Apteegi vastas'),
(90, 59.3530, 24.6283, NULL, NULL, 'Tallinn', 'Pärnu mnt. 554', 10916, 'Laagri Selver', 'Pizzapoiste vastas'),
(91, 59.4417, 24.8494, NULL, NULL, 'Tallinn', 'Tähesaju tee 1', 13917, 'Tallinna Tähesaju Selver', 'juuksurisalong Väike Dublin juures'),
(92, 59.4467, 25.4442, NULL, NULL, 'Kuusalu', 'Mäe 1', 74619, 'Kuusalu Grossi kpl', 'kassade kõrval'),
(93, 59.4220, 24.6998, NULL, NULL, 'Tallinn', 'Mustamäe tee 41', 10616, 'Tallinna Marja Grossi kpl', 'Sissepääsu kõrval'),
(94, 59.4345, 24.9473, NULL, NULL, 'Loo', 'Saha tee 9', 74201, 'Loo Grossi kpl', 'kassade vastas'),
(95, 59.4411, 24.7363, NULL, NULL, 'Tallinn', 'Kopli 1', 10411, 'Tallinna Balti Jaama Turg', '0. korrusel MyFitnessi kõrval boksis'),
(96, 58.2208, 26.4050, NULL, NULL, 'Elva', 'Valga maantee 5', 61504, 'Elva Maxima', '1. korrusel kassade vastas boksis'),
(97, 58.3773, 26.7287, NULL, NULL, 'Tartu', 'Riia 2', 51004, 'Tartu Kvartal', '0. korrusel liftide vastas'),
(98, 58.3751, 26.7564, NULL, NULL, 'Tartu', 'Anne 57', 50703, 'Tartu Saare Maxima', '1. korrusel Vsbogu OÜ kõrval boksis'),
(99, 58.4017, 26.7176, NULL, NULL, 'Tartu', 'Vahi 62', 50304, 'Tartu Vahi Selver', 'BENU apteegi kõrval boksis'),
(100, 59.4281, 24.6270, NULL, NULL, 'Tallinn', 'Rannamõisa tee 6e', 13516, 'Tallinna Kakumäe Selver', '-1. korrusel travelaatori kõrval'),
(101, 59.3828, 24.6641, NULL, NULL, 'Tallinn', 'Pärnu mnt. 386', 11612, 'Tallinna Hiiu Rimi', 'Kassade kõrval'),
(102, 59.4361, 24.7566, NULL, NULL, 'Tallinn', 'Viru väljak 4/6', 10151, 'Tallinna Viru Keskus', '-1. korrusel Toidumaailma kassade juures, eskalaatorite all'),
(103, 59.4686, 24.8349, NULL, NULL, 'Tallinn', 'Merivälja tee 24', 11911, 'Tallinna Pirita Keskus', '1. korrusel Rimi sissepääsu kõrval'),
(104, 59.3125, 24.4174, NULL, NULL, 'Keila', 'Piiri 7', 76610, 'Keila Grossi kpl', '1. korrusel peaukse kõrval'),
(105, 58.3650, 26.7193, NULL, NULL, 'Tartu', 'Võru 55F', 50111, 'Tartu Sõbrakeskus', '1. korrusel peasissepääsu juures autotarvete poe vastas'),
(106, 59.4870, 25.0192, NULL, NULL, 'Maardu', 'Nurga 3', 74113, 'Maardu Pärli Keskus', '1. korrusel Hesburgeri vastas'),
(107, 59.4280, 24.8385, NULL, NULL, 'Tallinn', 'J. Smuuli tee 43', 11415, 'Tallinna Lasnamäe Maksimarket', '1. korrusel peasissepääsu juures'),
(108, 59.3548, 26.3837, NULL, NULL, 'Rakvere', 'Lõõtspilli 2', 44313, 'Rakvere Vaala Keskus', '1. korrusel linnapoolse sissepääsu juures kauplus Apelsin kõrval'),
(109, 58.2654, 22.5161, NULL, NULL, 'Kuressaare', 'Tallinna 88', 93851, 'Auriga Keskus', '1. korrusel Koduekstra poe kõrval'),
(110, 58.3874, 24.5040, NULL, NULL, 'Pärnu', 'Lai 11', 80010, 'Pärnu Port Artur 2', '0. korrusel eskalaatorite kõrval'),
(111, 59.4509, 24.7166, NULL, NULL, 'Tallinn', 'Erika 14', 10416, 'Tallinna Arsenali Keskus', '1. korrusel Erika tänava poolse sissepääsu juures'),
(112, 59.4247, 24.7952, NULL, NULL, 'Tallinn', 'Peterburi tee 2', 11415, 'Tallinna T1 Kaubanduskeskus', '0. korrusel Ülemiste jaama poolse travelaatori kõrval'),
(113, 59.4279, 24.7236, NULL, NULL, 'Tallinn', 'Endla 45', 10701, 'Tallinna Kristiine Keskus 2.korrus', '2. korrusel Sportlandi kõrval, ligipääs liftiga'),
(114, 59.4053, 24.6163, NULL, NULL, 'Tallinn', 'Kotermaa tn 4', 13519, 'Tallinna Astangu Rimi', '1. korrusel juuksuri kõrval'),
(115, 59.2650, 25.9666, NULL, NULL, 'Tapa', 'Kalmistu 3', 45109, 'Tapa Konsum', '1. korrusel apteegi vastas'),
(116, 59.4415, 24.7615, NULL, NULL, 'Tallinn', 'Ahtri 9', 10151, 'Tallinna Nautica Keskus', '1. korrusel Salamander kaupluse kõrval'),
(117, 59.3721, 24.7165, NULL, NULL, 'Tallinn', 'Männiku tee 100', 11215, 'Tallinna Männiku Rimi', 'peasissepääsu kõrval'),
(118, 59.4398, 24.7060, NULL, NULL, 'Tallinn', 'Sõle tn 31', 10321, 'Tallinna Kolde Selver', '1. korrusel Selveri kassade kõrval'),
(119, 59.4315, 24.7431, NULL, NULL, 'Tallinn', 'Pärnu mnt 22', 10141, 'Tallinna Finest ärimaja', '0. korrusel Rimi vastas eskalaatorite all'),
(120, 59.4140, 24.6523, NULL, NULL, 'Tallinn', 'Ehitajate tee 107', 13511, 'Tallinna Nurmenuku Rimi', 'apteegi kõrval'),
(121, 58.3151, 26.7221, NULL, NULL, 'Ülenurme', 'Võru mnt. 2', 61714, 'Ülenurme Konsum', 'kassade kõrval'),
(122, 59.3569, 26.9731, NULL, NULL, 'Kiviõli', 'Metsa 3', 43125, 'Kiviõli K5 keskus', 'Rimi kassade vastas'),
(123, 58.0974, 27.4635, NULL, NULL, 'Räpina', 'Pargi 1', 64505, 'Räpina Maxima', 'kassade vastas boksis'),
(124, 59.3345, 25.3308, NULL, NULL, 'Kehra', 'Kose maantee 7', 74307, 'Kehra Grossi kpl', 'peasissepääsu kõrval'),
(125, 59.4332, 26.2680, NULL, NULL, 'Haljala', 'Võsu mnt 5', 45301, 'Haljala Grossi kpl', 'peasissepääsu vastas'),
(126, 59.3099, 24.8320, NULL, NULL, 'Kiili', 'Vaela tee 4', 75401, 'Kiili Maxima', 'kassade vastas boksis'),
(127, 59.1672, 24.7475, NULL, NULL, 'Kohila', 'Lõuna 2', 79801, 'Kohila Konsum', 'peasissepääsust vasakul'),
(128, 58.3678, 25.5963, NULL, NULL, 'Viljandi', 'Tallinna 24', 71008, 'Viljandi Centrum', 'Euronicsi vastas trepi all'),
(129, 58.4290, 24.4976, NULL, NULL, 'Sauga', 'Kuldnoka 1', 85008, 'Sauga Konsum', 'peasissepääsu kõrval'),
(130, 58.3738, 24.6176, NULL, NULL, 'Paikuse', 'Pärnade pst. 1', 86602, 'Paikuse Konsum', 'kohviku vastas'),
(131, 58.7458, 25.7652, NULL, NULL, 'Imavere', 'Paiaristi', 72401, 'Imavere Alexela', 'tanklapoes'),
(132, 58.3851, 26.6918, NULL, NULL, 'Tartu', 'Friedebert Tuglase 19', 51014, 'Tartu Tuglase Rimi', 'sissepääsu vastas'),
(133, 59.3918, 27.7759, NULL, NULL, 'Sillamäe', 'Pavlovi tn 1a', 40232, 'Sillamäe Maxima XX', 'lillepoe kõrval'),
(134, 59.4142, 24.7072, NULL, NULL, 'Tallinn', 'Sõpruse pst. 174', 13424, 'Tallinna Sõpruse Rimi', 'iseteeninduskassade kõrval'),
(135, 58.3940, 24.4612, NULL, NULL, 'Pärnu', 'Haapsalu maantee 41', 88317, 'Vana Pärnu Selver ABC', 'peasissepääsu kõrval'),
(136, 59.5049, 24.8295, NULL, NULL, 'Viimsi', 'Pargi tee 22', 74001, 'Viimsi Maxima', 'Kassade vastas boksis'),
(137, 59.3237, 24.5603, NULL, NULL, 'Saue', 'Keskuse 11', 76505, 'Saue Rimi', 'Kassade vastas'),
(138, 58.0637, 27.0689, NULL, NULL, 'Põlva', 'Jaama 12', 63303, 'Põlva Selver (valge)', 'Sissepääsu juures boksipinnal'),
(139, 58.3641, 26.7386, NULL, NULL, 'Tartu', 'Sõbra 41', 50106, 'Tartu Sõbra Selver (valge)', 'Selveri kaupluse sissepääsu kõrval'),
(140, 57.8352, 27.0076, NULL, NULL, 'Võru', 'Jüri 83', 65607, 'Võru Maksimarket (valge)', 'Sissepääsu kõrval'),
(141, 57.7320, 27.2820, NULL, NULL, 'Vastseliina', 'Võidu 21', 65201, 'Vastseliina Konsum (valge)', 'Sissepääsu kõrval'),
(142, 58.7743, 24.8154, NULL, NULL, 'Järvakandi', 'Turu 1', 79101, 'Järvakandi Grossi kpl (valge)', 'Sissepääsu kõrval'),
(143, 59.3976, 24.8026, NULL, NULL, 'Tallinn', 'Küti tee 4', 75312, 'Peetri Keskus (valge)', 'Peasissepääsust paremal'),
(144, 58.2506, 22.4563, NULL, NULL, 'Kuressaare', 'Merikotka 1', 93810, 'Kuressaare Wow keskus (valge)', 'sissepääsu kõrval, selveri kassade vastas'),
(145, 58.3230, 26.7083, NULL, NULL, 'Tõrvandi', 'Müürsepa 1', 61715, 'Tõrvandi Konsum (valge)', 'Kassade vastas'),
(146, 58.3822, 24.5072, NULL, NULL, 'Pärnu', 'Suur-Sepa 18', 80018, 'Pärnu Turg (valge)', 'R-kioski kõrval'),
(147, 58.3865, 26.7221, NULL, NULL, 'Tartu', 'Ujula 2', 51008, 'Tartu Ujula Konsum (valge)', 'Sissepääsu juures'),
(148, 58.1437, 26.2469, NULL, NULL, 'Rõngu', 'Tartu maantee 2', 61001, 'Rõngu Konsum (valge)', 'Kassade vastas'),
(149, 58.3718, 26.7738, NULL, NULL, 'Tartu', 'Mõisavahe 34c', 50708, 'Tartu Mõisavahe Konsum (valge)', 'Sissepääsu juures'),
(150, 58.3492, 26.7374, NULL, NULL, 'Tartu', 'Sepa 21', 50105, 'Tartu Sepa Rimi (valge)', 'Kassade kõrval'),
(151, 58.3619, 25.5826, NULL, NULL, 'Viljandi', 'Vaksali 11b', 71012, 'Viljandi Vaksali Maxima (valge)', 'Kassade vastas boksis'),
(152, 58.9406, 23.5803, NULL, NULL, 'Haapsalu', 'Tallinna maantee 84', 90401, 'Haapsalu Uuemõisa Konsum (valge)', 'Kassade juures'),
(153, 59.4491, 24.8612, NULL, NULL, 'Tallinn', 'Linnamäe tee 3', 13912, 'Tallinna Linnamäe Konsum (valge)', 'Läänemere tee poolse sissepääsu juures'),
(154, 58.8867, 25.5562, NULL, NULL, 'Paide', 'Pärnu 63', 72712, 'Paide Maxima (valge)', 'Sissepääsu kõrval boksis'),
(155, 58.4048, 24.6495, NULL, NULL, 'Sindi', 'Jaama 8', 86705, 'Sindi Konsum (valge)', 'Kassade kõrval'),
(156, 59.4535, 24.7028, NULL, NULL, 'Tallinn', 'Tööstuse 103', 10416, 'Tallinna Tööstuse Rimi (valge)', 'Iseteenindus kassade kõrval'),
(157, 59.4224, 24.6950, NULL, NULL, 'Tallinn', 'Mustamäe tee 16', 10617, 'Tallinna Marienthali Selver (valge)', 'Selveri infoleti kõrval boksis'),
(158, 59.5005, 26.5162, NULL, NULL, 'Kunda', 'Kasemäe 12', 44107, 'Kunda Grossi kpl (valge)', 'Sissepääsu kõrval'),
(159, 59.3413, 26.1287, NULL, NULL, 'Kadrina', 'Viru 9', 45201, 'Kadrina Grossi kpl (valge)', 'Sissepääsu juures'),
(160, 59.3786, 24.2364, NULL, NULL, 'Laulasmaa', 'Kloogaranna tee 26', 76702, 'Laulasmaa Selver ABC (valge)', 'Kassade vastas'),
(161, 59.4074, 24.7024, NULL, NULL, 'Tallinn', 'Sõpruse pst. 171', 13413, 'Tallinna Sõpruse pst Maxima (valge)', 'Sissepääsust paremal, kassade vastas'),
(162, 58.8478, 26.9426, NULL, NULL, 'Mustvee', 'Tartu 3', 49604, 'Mustvee konsum (valge)', 'Kassade vastas'),
(163, 58.1480, 24.9491, NULL, NULL, 'Kilingi-Nõmme', 'Pärnu 37', 86303, 'Kilingi-Nõmme Konsum (valge)', 'sissepääsu juures'),
(164, 59.4118, 24.6355, NULL, NULL, 'Tallinn', 'Õismäe tee 107a', 13515, 'Tallinna Kollane keskus (valge)', 'Rimi sissepääsu juures'),
(165, 59.4114, 24.6449, NULL, NULL, 'Tallinn', 'Õismäe tee 46', 13512, 'Tallinna Õismäe Maxima XX (valge)', 'Sissepääsust paremal, iseteeninduskassade vastas'),
(166, 58.6308, 25.5596, NULL, NULL, 'Võhma', 'Tallinna 28a', 70602, 'Võhma Meie pood (valge)', 'Sissepääsu kõrval'),
(167, 59.4408, 24.8438, NULL, NULL, 'Tallinn', 'Virbi 12', 13617, 'Tallinna Virbi Maxima (valge)', 'Kassade vastas'),
(168, 59.4455, 25.4336, NULL, NULL, 'Kuusalu', 'Kuusalu tee 39', 74601, 'Kuusalu Meie pood (valge)', 'Sissepääsu juures'),
(169, 58.9986, 22.7471, NULL, NULL, 'Kärdla', 'Keskväljak 1', 92413, 'Kärdla Hiiu Konsum (valge)', 'Kassade vastas'),
(170, 58.6074, 24.5016, NULL, NULL, 'Pärnu-Jaagupi', 'Pärnu maantee 18', 87201, 'Pärnu Jaagupi kauplus (valge)', 'Sissepääsu kõrval'),
(171, 58.5591, 23.0819, NULL, NULL, 'Orissaare', 'Kuivastu mnt 26a', 94601, 'Orissaare bussijaam (valge)', 'Sissepääsu kõrval'),
(172, 59.4448, 24.6981, NULL, NULL, 'Tallinn', 'Sõle 51', 10318, 'Tallinna Pelgulinna Selver (valge)', 'Sissepääsust vasakul, iseteeninduskassade vastas boksis'),
(173, 59.4433, 24.7645, NULL, NULL, 'Tallinn', 'Lootsi 13', 10151, 'Tallinna Sadam D-terminal (valge)', 'Hestia Hotelli poolse sissepääsu kõrval'),
(174, 59.1841, 25.1623, NULL, NULL, 'Kose', 'Kodu 2', 75101, 'Kose Grossi kpl pakimajake (valge)', 'Parkimisplatsil'),
(175, 58.8031, 25.4273, NULL, NULL, 'Türi', 'Viljandi 13d', 72212, 'Türi Grossi kpl pakimajake (valge)', 'Parkimisplatsil'),
(176, 59.3496, 24.0576, NULL, NULL, 'Paldiski', 'Rae 26', 76805, 'Paldiski Grossi kpl pakimajake (valge)', 'Parkimisplatsil'),
(177, 58.3822, 26.7306, NULL, NULL, 'Tartu', 'Raatuse 20', 50603, 'Tartu Raatuse Selver ABC (valge)', 'Kassade kõrval boksis'),
(178, 57.8291, 26.5292, NULL, NULL, 'Antsla', 'Kreutzwaldi 4a', 66404, 'Antsla Konsum (valge)', 'Sissepääsu kõrval'),
(179, 59.6056, 25.4984, NULL, NULL, 'Leesi', 'Poe', 74704, 'Leesi poemaja (valge)', 'Sissepääsu juures'),
(180, 59.3877, 24.6840, NULL, NULL, 'Tallinn', 'Jaama 2', 11621, 'Tallinna Nõmme keskus (valge)', 'Keskuse Kõvera tn poolses otsas, välisuksest sissepääs kapiuksekoodiga'),
(181, 59.3585, 24.6299, NULL, NULL, 'Tallinn', 'Pärnu mnt 536b', 10915, 'Tallinna Pääsküla Maxima (valge)', 'Sissepääsust paremal, kassade kõrval'),
(182, 58.0063, 25.9120, NULL, NULL, 'Tõrva', 'Viljandi 28', 68604, 'Tõrva Tikste Konsum (valge)', ''),
(183, 57.7789, 26.0351, NULL, NULL, 'Valga', 'A. Neulandi 2', 68207, 'Valga Siili Konsum (valge)', 'Kassade kõrval'),
(184, 58.4081, 26.7442, NULL, NULL, 'Tartu', 'Keskuse tee 2, Tila küla', 60532, 'Tartu Raadi Grossi kpl (valge)', 'Sissepääsu kõrval'),
(185, 58.3888, 24.6056, NULL, NULL, 'Tammiste', 'Kellukese tee 2', 85009, 'Tammiste Konsum (valge)', 'Sissepääsu kõrval'),
(186, 59.3797, 28.1851, NULL, NULL, 'Narva', 'Fama põik 10', 20303, 'Narva Fama Keskus (valge)', 'Swedbanki poolse sissepääsu juures'),
(187, 58.9403, 23.5399, NULL, NULL, 'Haapsalu', 'Tallinna maantee 1', 90507, 'Haapsalu Kaubamaja Konsum (valge)', 'Peasissepääsu juures'),
(188, 59.3524, 27.4178, NULL, NULL, 'Jõhvi', 'Puru tee 1', 41534, 'Jõhvi Pargi keskus (valge)', 'Juku ja Sportlandi kaupluste vahel koridoris'),
(189, 59.3067, 24.4117, NULL, NULL, 'Keila', 'Jaama 1', 76605, 'Keila Jaama kauplus (valge)', 'Kassade vastas boksis'),
(190, 58.4028, 26.7393, NULL, NULL, 'Tartu', 'Kaupmehe 2', 60532, 'Tartu Raadimõisa Konsum (valge)', 'Sissepääsu juures'),
(191, 58.6004, 27.1310, NULL, NULL, 'Alatskivi', 'Lossi 1a', 60218, 'Alatskivi Konsum (valge)', 'Sissepääsu juures'),
(192, 59.3910, 27.7907, NULL, NULL, 'Sillamäe', 'Viru puiestee 35', 40233, 'Sillamäe Maxima X, Viru pst (valge)', 'Maxima kassade vastas'),
(193, 59.4436, 24.8728, NULL, NULL, 'Tallinn', 'Kivila 26', 13917, 'Tallinna Kivila Gross (valge)', 'Sissepääsu juures'),
(194, 58.2350, 25.8656, NULL, NULL, 'Mustla', 'Posti 52a', 69701, 'Mustla Konsum (valge)', 'Sissepääsu kõrval'),
(195, 58.3706, 25.5831, NULL, NULL, 'Viljandi', 'Lääne 2', 71013, 'Viljandi Maksimarket (valge)', 'Sissepääsu kõrval boksis'),
(196, 59.4072, 27.2848, NULL, NULL, 'Kohtla-Järve', 'Põhja allee 4', 30323, 'Kohtla-Järve mini-Rimi (valge)', 'Sissepääsu kõrval'),
(197, 58.3796, 26.7643, NULL, NULL, 'Tartu', 'Jaama 173', 50605, 'Tartu Kivilinna Konsum (valge)', 'Sissepääsu kõrval'),
(198, 58.3608, 26.6512, NULL, NULL, 'Tartu', 'Aisa tn 2', 61406, 'Tartu Märja Konsum (valge)', 'Kassade vastas'),
(199, 59.3277, 27.4187, NULL, NULL, 'Kohtla-Järve', 'Maleva 23', 31025, 'Ahtme Grossi kpl (valge)', 'Kassade vastas'),
(200, 59.4484, 24.8450, NULL, NULL, 'Tallinn', 'Paasiku 2a', 13915, 'Tallinna Paasiku Grossi kpl (valge)', 'Sissepääsu vastas'),
(201, 59.4318, 24.8226, NULL, NULL, 'Tallinn', 'Punane 16b', 13619, 'Tallinna Idakeskus (valge)', 'Bowlingu sissepääsust vasakul'),
(202, 59.3759, 28.1915, NULL, NULL, 'Narva', 'Paul Kerese 3', 20309, 'Narva Kerese Keskus (valge)', 'Sissepääsu juures lifti kõrval'),
(203, 59.3806, 28.1653, NULL, NULL, 'Narva', 'Albert-August Tiimani 20', 21004, 'Narva Tiimani Maxima (valge)', 'Sissepääsu juures vasakul pool');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `itella`
--
ALTER TABLE `itella`
  ADD PRIMARY KEY (`itella_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `itella`
--
ALTER TABLE `itella`
  MODIFY `itella_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
