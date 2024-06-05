-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2024 at 04:06 PM
-- Server version: 8.0.36-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visa_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int NOT NULL,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Afghanistan', NULL, '2024-04-24 07:30:38', NULL),
(2, 'Albania', NULL, NULL, NULL),
(3, 'Algeria', NULL, NULL, NULL),
(4, 'Andorra', NULL, NULL, NULL),
(5, 'Angola', NULL, NULL, NULL),
(6, 'Antigua and Barbuda', NULL, NULL, NULL),
(7, 'Argentina', NULL, NULL, NULL),
(8, 'Armenia', NULL, NULL, NULL),
(9, 'Austria', NULL, NULL, NULL),
(10, 'Azerbaijan', NULL, NULL, NULL),
(11, 'Bahrain', NULL, NULL, NULL),
(12, 'Bangladesh', NULL, NULL, NULL),
(13, 'Barbados', NULL, NULL, NULL),
(14, 'Belarus', NULL, NULL, NULL),
(15, 'Belgium', NULL, NULL, NULL),
(16, 'Belize', NULL, NULL, NULL),
(17, 'Benin', NULL, NULL, NULL),
(18, 'Bhutan', NULL, NULL, NULL),
(19, 'Bolivia', NULL, NULL, NULL),
(20, 'Bosnia and Herzegovina', NULL, NULL, NULL),
(21, 'Botswana', NULL, NULL, NULL),
(22, 'Brazil', NULL, NULL, NULL),
(23, 'Brunei', NULL, NULL, NULL),
(24, 'Bulgaria', NULL, NULL, NULL),
(25, 'Burkina Faso', NULL, NULL, NULL),
(26, 'Burundi', NULL, NULL, NULL),
(27, 'Cabo Verde', NULL, NULL, NULL),
(28, 'Cambodia', NULL, NULL, NULL),
(29, 'Cameroon', NULL, NULL, NULL),
(30, 'Canada', NULL, NULL, NULL),
(31, 'Central African Republic', NULL, NULL, NULL),
(32, 'Chad', NULL, NULL, NULL),
(33, 'Channel Islands', NULL, NULL, NULL),
(34, 'Chile', NULL, NULL, NULL),
(35, 'China', NULL, NULL, NULL),
(36, 'Colombia', NULL, NULL, NULL),
(37, 'Comoros', NULL, NULL, NULL),
(38, 'Congo', NULL, NULL, NULL),
(39, 'Costa Rica', NULL, NULL, NULL),
(40, 'Croatia', NULL, NULL, NULL),
(41, 'Cuba', NULL, NULL, NULL),
(42, 'Cyprus', NULL, NULL, NULL),
(43, 'Czech Republic', NULL, NULL, NULL),
(44, 'Denmark', NULL, NULL, NULL),
(45, 'Djibouti', NULL, NULL, NULL),
(46, 'Dominica', NULL, NULL, NULL),
(47, 'Dominican Republic', NULL, NULL, NULL),
(48, 'DR Congo', NULL, NULL, NULL),
(49, 'Ecuador', NULL, NULL, NULL),
(50, 'Egypt', NULL, NULL, NULL),
(51, 'El Salvador', NULL, NULL, NULL),
(52, 'Equatorial Guinea', NULL, NULL, NULL),
(53, 'Eritrea', NULL, NULL, NULL),
(54, 'Estonia', NULL, NULL, NULL),
(55, 'Eswatini', NULL, NULL, NULL),
(56, 'Ethiopia', NULL, NULL, NULL),
(57, 'Faeroe Islands', NULL, NULL, NULL),
(58, 'Finland', NULL, NULL, NULL),
(59, 'France', NULL, NULL, NULL),
(60, 'French Guiana', NULL, NULL, NULL),
(61, 'Gabon', NULL, NULL, NULL),
(62, 'Gambia', NULL, NULL, NULL),
(63, 'Georgia', NULL, NULL, NULL),
(64, 'Germany', NULL, NULL, NULL),
(65, 'Ghana', NULL, NULL, NULL),
(66, 'Gibraltar', NULL, NULL, NULL),
(67, 'Greece', NULL, NULL, NULL),
(68, 'Grenada', NULL, NULL, NULL),
(69, 'Guatemala', NULL, NULL, NULL),
(70, 'Guinea', NULL, NULL, NULL),
(71, 'Guinea-Bissau', NULL, NULL, NULL),
(72, 'Guyana', NULL, NULL, NULL),
(73, 'Haiti', NULL, NULL, NULL),
(74, 'Holy See', NULL, NULL, NULL),
(75, 'Honduras', NULL, NULL, NULL),
(76, 'Hong Kong', NULL, NULL, NULL),
(77, 'Hungary', NULL, NULL, NULL),
(78, 'Iceland', NULL, NULL, NULL),
(79, 'Indonesia', NULL, NULL, NULL),
(80, 'India', NULL, NULL, NULL),
(81, 'Iran', NULL, NULL, NULL),
(82, 'Iraq', NULL, NULL, NULL),
(83, 'Ireland', NULL, NULL, NULL),
(84, 'Isle of Man', NULL, NULL, NULL),
(85, 'Israel', NULL, NULL, NULL),
(86, 'Italy', NULL, NULL, NULL),
(87, 'Jamaica', NULL, NULL, NULL),
(88, 'Japan', NULL, NULL, NULL),
(89, 'Jordan', NULL, NULL, NULL),
(90, 'Kazakhstan', NULL, NULL, NULL),
(91, 'Kenya', NULL, NULL, NULL),
(92, 'Kuwait', NULL, NULL, NULL),
(93, 'Kyrgyzstan', NULL, NULL, NULL),
(94, 'Laos', NULL, NULL, NULL),
(95, 'Latvia', NULL, NULL, NULL),
(96, 'Lebanon', NULL, NULL, NULL),
(97, 'Lesotho', NULL, NULL, NULL),
(98, 'Liberia', NULL, NULL, NULL),
(99, 'Libya', NULL, NULL, NULL),
(100, 'Liechtenstein', NULL, NULL, NULL),
(101, 'Lithuania', NULL, NULL, NULL),
(102, 'Luxembourg', NULL, NULL, NULL),
(103, 'Macao', NULL, NULL, NULL),
(104, 'Madagascar', NULL, NULL, NULL),
(105, 'Malawi', NULL, NULL, NULL),
(106, 'Malaysia', NULL, NULL, NULL),
(107, 'Maldives', NULL, NULL, NULL),
(108, 'Mali', NULL, NULL, NULL),
(109, 'Malta', NULL, NULL, NULL),
(110, 'Mauritania', NULL, NULL, NULL),
(111, 'Mauritius', NULL, NULL, NULL),
(112, 'Mayotte', NULL, NULL, NULL),
(113, 'Mexico', NULL, NULL, NULL),
(114, 'Moldova', NULL, NULL, NULL),
(115, 'Monaco', NULL, NULL, NULL),
(116, 'Mongolia', NULL, NULL, NULL),
(117, 'Montenegro', NULL, NULL, NULL),
(118, 'Morocco', NULL, NULL, NULL),
(119, 'Mozambique', NULL, NULL, NULL),
(120, 'Myanmar', NULL, NULL, NULL),
(121, 'Namibia', NULL, NULL, NULL),
(122, 'Nepal', NULL, NULL, NULL),
(123, 'Netherlands', NULL, NULL, NULL),
(124, 'Nicaragua', NULL, NULL, NULL),
(125, 'Niger', NULL, NULL, NULL),
(126, 'Nigeria', NULL, NULL, NULL),
(127, 'North Korea', NULL, NULL, NULL),
(128, 'North Macedonia', NULL, NULL, NULL),
(129, 'Norway', NULL, NULL, NULL),
(130, 'Oman', NULL, NULL, NULL),
(131, 'Pakistan', NULL, NULL, NULL),
(132, 'Panama', NULL, NULL, NULL),
(133, 'Paraguay', NULL, NULL, NULL),
(134, 'Peru', NULL, NULL, NULL),
(135, 'Philippines', NULL, NULL, NULL),
(136, 'Poland', NULL, NULL, NULL),
(137, 'Portugal', NULL, NULL, NULL),
(138, 'Qatar', NULL, NULL, NULL),
(139, 'Romania', NULL, NULL, NULL),
(140, 'Russia', NULL, NULL, NULL),
(141, 'Rwanda', NULL, NULL, NULL),
(142, 'Saint Helena', NULL, NULL, NULL),
(143, 'Saint Kitts and Nevis', NULL, NULL, NULL),
(144, 'Saint Lucia', NULL, NULL, NULL),
(145, 'Saint Vincent and the Grenadines', NULL, NULL, NULL),
(146, 'San Marino', NULL, NULL, NULL),
(147, 'Sao Tome & Principe', NULL, NULL, NULL),
(148, 'Saudi Arabia', NULL, NULL, NULL),
(149, 'Senegal', NULL, NULL, NULL),
(150, 'Serbia', NULL, NULL, NULL),
(151, 'Seychelles', NULL, NULL, NULL),
(152, 'Sierra Leone', NULL, NULL, NULL),
(153, 'Singapore', NULL, NULL, NULL),
(154, 'Slovakia', NULL, NULL, NULL),
(155, 'Slovenia', NULL, NULL, NULL),
(156, 'Somalia', NULL, NULL, NULL),
(157, 'South Africa', NULL, NULL, NULL),
(158, 'South Korea', NULL, NULL, NULL),
(159, 'South Sudan', NULL, NULL, NULL),
(160, 'Spain', NULL, NULL, NULL),
(161, 'Sri Lanka', NULL, NULL, NULL),
(162, 'State of Palestine', NULL, NULL, NULL),
(163, 'Sudan', NULL, NULL, NULL),
(164, 'Suriname', NULL, NULL, NULL),
(165, 'Sweden', NULL, NULL, NULL),
(166, 'Switzerland', NULL, NULL, NULL),
(167, 'Syria', NULL, NULL, NULL),
(168, 'Taiwan', NULL, NULL, NULL),
(169, 'Tajikistan', NULL, NULL, NULL),
(170, 'Tanzania', NULL, NULL, NULL),
(171, 'Thailand', NULL, NULL, NULL),
(172, 'The Bahamas', NULL, NULL, NULL),
(173, 'Timor-Leste', NULL, NULL, NULL),
(174, 'Togo', NULL, NULL, NULL),
(175, 'Trinidad and Tobago', NULL, NULL, NULL),
(176, 'Tunisia', NULL, NULL, NULL),
(177, 'Turkey', NULL, NULL, NULL),
(178, 'Turkmenistan', NULL, NULL, NULL),
(179, 'Uganda', NULL, NULL, NULL),
(180, 'Ukraine', NULL, NULL, NULL),
(181, 'United Arab Emirates', NULL, NULL, NULL),
(182, 'United Kingdom', NULL, NULL, NULL),
(183, 'United States', NULL, NULL, NULL),
(184, 'Uruguay', NULL, NULL, NULL),
(185, 'Uzbekistan', NULL, NULL, NULL),
(186, 'Venezuela', NULL, NULL, NULL),
(187, 'Vietnam', NULL, NULL, NULL),
(188, 'Western Sahara', NULL, NULL, NULL),
(189, 'Yemen', NULL, NULL, NULL),
(190, 'Zambia', NULL, NULL, NULL),
(191, 'Zimbabwe', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int NOT NULL,
  `state_id` int DEFAULT NULL,
  `name` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `state_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Alluri Sitharama Raju', NULL, NULL, NULL),
(2, 1, 'Anakapalli', NULL, NULL, NULL),
(3, 1, 'Ananthapuramu', NULL, NULL, NULL),
(4, 1, 'Annamayya', NULL, NULL, NULL),
(5, 1, 'Bapatla', NULL, NULL, NULL),
(6, 1, 'Chittoor', NULL, NULL, NULL),
(7, 1, 'Dr. B.R. Ambedkar Konaseema', NULL, NULL, NULL),
(8, 1, 'East Godavari', NULL, NULL, NULL),
(9, 1, 'Eluru', NULL, NULL, NULL),
(10, 1, 'Guntur', NULL, NULL, NULL),
(11, 1, 'Kakinada', NULL, NULL, NULL),
(12, 1, 'Krishna', NULL, NULL, NULL),
(13, 1, 'Kurnool', NULL, NULL, NULL),
(14, 1, 'Nandyal', NULL, NULL, NULL),
(15, 1, 'NTR', NULL, NULL, NULL),
(16, 1, 'Palnadu', NULL, NULL, NULL),
(17, 1, 'Parvathipuram Manyam', NULL, NULL, NULL),
(18, 1, 'Prakasam', NULL, NULL, NULL),
(19, 1, 'Srikakulam', NULL, NULL, NULL),
(20, 1, 'Sri Potti Sriramulu Nellore', NULL, NULL, NULL),
(21, 1, 'Sri Sathya Sai', NULL, NULL, NULL),
(22, 1, 'Tirupati', NULL, NULL, NULL),
(23, 1, 'Visakhapatnam', NULL, NULL, NULL),
(24, 1, 'Vizianagaram', NULL, NULL, NULL),
(25, 1, 'West Godavari', NULL, NULL, NULL),
(26, 1, 'YSR', NULL, NULL, NULL),
(27, 2, 'Anjaw', NULL, NULL, NULL),
(28, 2, 'Changlang', NULL, NULL, NULL),
(29, 2, 'East Kameng', NULL, NULL, NULL),
(30, 2, 'East Siang', NULL, NULL, NULL),
(31, 2, 'Itanagar capital complex', NULL, NULL, NULL),
(32, 2, 'Kamle', NULL, NULL, NULL),
(33, 2, 'Kra Daadi', NULL, NULL, NULL),
(34, 2, 'Kurung Kumey', NULL, NULL, NULL),
(35, 2, 'Lepa Rada', NULL, NULL, NULL),
(36, 2, 'Lohit', NULL, NULL, NULL),
(37, 2, 'Longding', NULL, NULL, NULL),
(38, 2, 'Lower Dibang Valley', NULL, NULL, NULL),
(39, 2, 'Lower Siang', NULL, NULL, NULL),
(40, 2, 'Lower Subansiri', NULL, NULL, NULL),
(41, 2, 'Namsai', NULL, NULL, NULL),
(42, 2, 'Pakke-Kessang', NULL, NULL, NULL),
(43, 2, 'Papum Pare', NULL, NULL, NULL),
(44, 2, 'Shi Yomi', NULL, NULL, NULL),
(45, 2, 'Siang', NULL, NULL, NULL),
(46, 2, 'Tawang', NULL, NULL, NULL),
(47, 2, 'Tirap', NULL, NULL, NULL),
(48, 2, 'Upper Dibang Valley', NULL, NULL, NULL),
(49, 2, 'Upper Siang', NULL, NULL, NULL),
(50, 2, 'Upper Subansiri', NULL, NULL, NULL),
(51, 2, 'West Kameng', NULL, NULL, NULL),
(52, 2, 'West Siang', NULL, NULL, NULL),
(53, 3, 'Bajali', NULL, NULL, NULL),
(54, 3, 'Baksa', NULL, NULL, NULL),
(55, 3, 'Barpeta', NULL, NULL, NULL),
(56, 3, 'Biswanath', NULL, NULL, NULL),
(57, 3, 'Bongaigaon', NULL, NULL, NULL),
(58, 3, 'Cachar', NULL, NULL, NULL),
(59, 3, 'Charaideo', NULL, NULL, NULL),
(60, 3, 'Chirang', NULL, NULL, NULL),
(61, 3, 'Darrang', NULL, NULL, NULL),
(62, 3, 'Dhemaji', NULL, NULL, NULL),
(63, 3, 'Dhubri', NULL, NULL, NULL),
(64, 3, 'Dibrugarh', NULL, NULL, NULL),
(65, 3, 'Dima Hasao', NULL, NULL, NULL),
(66, 3, 'Goalpara', NULL, NULL, NULL),
(67, 3, 'Golaghat', NULL, NULL, NULL),
(68, 3, 'Hailakandi', NULL, NULL, NULL),
(69, 3, 'Hojai', NULL, NULL, NULL),
(70, 3, 'Jorhat', NULL, NULL, NULL),
(71, 3, 'Kamrup', NULL, NULL, NULL),
(72, 3, 'Kamrup Metropolitan', NULL, NULL, NULL),
(73, 3, 'Karbi Anglong', NULL, NULL, NULL),
(74, 3, 'Karimganj', NULL, NULL, NULL),
(75, 3, 'Kokrajhar', NULL, NULL, NULL),
(76, 3, 'Lakhimpur', NULL, NULL, NULL),
(77, 3, 'Majuli', NULL, NULL, NULL),
(78, 3, 'Morigaon', NULL, NULL, NULL),
(79, 3, 'Nagaon', NULL, NULL, NULL),
(80, 3, 'Nalbari', NULL, NULL, NULL),
(81, 3, 'Sivasagar', NULL, NULL, NULL),
(82, 3, 'South Salmara Mankachar', NULL, NULL, NULL),
(83, 3, 'Sonitpur', NULL, NULL, NULL),
(84, 3, 'Tamulpur', NULL, NULL, NULL),
(85, 3, 'Tinsukia', NULL, NULL, NULL),
(86, 3, 'Udalguri', NULL, NULL, NULL),
(87, 3, 'West Karbi Anglong', NULL, NULL, NULL),
(88, 4, 'Araria', NULL, NULL, NULL),
(89, 4, 'Arwal', NULL, NULL, NULL),
(90, 4, 'Aurangabad', NULL, NULL, NULL),
(91, 4, 'Banka', NULL, NULL, NULL),
(92, 4, 'Begusarai', NULL, NULL, NULL),
(93, 4, 'Bhagalpur', NULL, NULL, NULL),
(94, 4, 'Bhojpur', NULL, NULL, NULL),
(95, 4, 'Buxar', NULL, NULL, NULL),
(96, 4, 'Darbhanga', NULL, NULL, NULL),
(97, 4, 'East Champaran', NULL, NULL, NULL),
(98, 4, 'Gaya', NULL, NULL, NULL),
(99, 4, 'Gopalganj', NULL, NULL, NULL),
(100, 4, 'Jamui', NULL, NULL, NULL),
(101, 4, 'Jehanabad', NULL, NULL, NULL),
(102, 4, 'Kaimur', NULL, NULL, NULL),
(103, 4, 'Katihar', NULL, NULL, NULL),
(104, 4, 'Khagaria', NULL, NULL, NULL),
(105, 4, 'Kishanganj', NULL, NULL, NULL),
(106, 4, 'Lakhisarai', NULL, NULL, NULL),
(107, 4, 'Madhepura', NULL, NULL, NULL),
(108, 4, 'Madhubani', NULL, NULL, NULL),
(109, 4, 'Munger', NULL, NULL, NULL),
(110, 4, 'Muzaffarpur', NULL, NULL, NULL),
(111, 4, 'Nalanda', NULL, NULL, NULL),
(112, 4, 'Nawada', NULL, NULL, NULL),
(113, 4, 'Patna', NULL, NULL, NULL),
(114, 4, 'Purnia', NULL, NULL, NULL),
(115, 4, 'Rohtas', NULL, NULL, NULL),
(116, 4, 'Saharsa', NULL, NULL, NULL),
(117, 4, 'Samastipur', NULL, NULL, NULL),
(118, 4, 'Saran', NULL, NULL, NULL),
(119, 4, 'Sheikhpura', NULL, NULL, NULL),
(120, 4, 'Sheohar', NULL, NULL, NULL),
(121, 4, 'Sitamarhi', NULL, NULL, NULL),
(122, 4, 'Siwan', NULL, NULL, NULL),
(123, 4, 'Supaul', NULL, NULL, NULL),
(124, 4, 'Vaishali', NULL, NULL, NULL),
(125, 4, 'West Champaran', NULL, NULL, NULL),
(126, 5, 'Balod', NULL, NULL, NULL),
(127, 5, 'Baloda Bazar', NULL, NULL, NULL),
(128, 5, 'Balrampur-Ramanujganj', NULL, NULL, NULL),
(129, 5, 'Bastar', NULL, NULL, NULL),
(130, 5, 'Bemetara', NULL, NULL, NULL),
(131, 5, 'Bijapur', NULL, NULL, NULL),
(132, 5, 'Bilaspur', NULL, NULL, NULL),
(133, 5, 'Dantewada', NULL, NULL, NULL),
(134, 5, 'Dhamtari', NULL, NULL, NULL),
(135, 5, 'Durg', NULL, NULL, NULL),
(136, 5, 'Gariaband', NULL, NULL, NULL),
(137, 5, 'Gaurela-Pendra-Marwahi', NULL, NULL, NULL),
(138, 5, 'Janjgir-Champa', NULL, NULL, NULL),
(139, 5, 'Jashpur', NULL, NULL, NULL),
(140, 5, 'Kabirdham', NULL, NULL, NULL),
(141, 5, 'Kanker', NULL, NULL, NULL),
(142, 5, 'Khairagarh-Chhuikhadan-Gandai', NULL, NULL, NULL),
(143, 5, 'Kondagaon', NULL, NULL, NULL),
(144, 5, 'Korba', NULL, NULL, NULL),
(145, 5, 'Korea', NULL, NULL, NULL),
(146, 5, 'Mahasamund', NULL, NULL, NULL),
(147, 5, 'Manendragarh-Chirmiri-Bharatpur', NULL, NULL, NULL),
(148, 5, 'Mohla-Manpur-Chowki', NULL, NULL, NULL),
(149, 5, 'Mungeli', NULL, NULL, NULL),
(150, 5, 'Narayanpur', NULL, NULL, NULL),
(151, 5, 'Raigarh', NULL, NULL, NULL),
(152, 5, 'Raipur', NULL, NULL, NULL),
(153, 5, 'Rajnandgaon', NULL, NULL, NULL),
(154, 5, 'Sarangarh-Bilaigarh', NULL, NULL, NULL),
(155, 5, 'Shakti', NULL, NULL, NULL),
(156, 5, 'Sukma', NULL, NULL, NULL),
(157, 5, 'Surajpur', NULL, NULL, NULL),
(158, 5, 'Surguja', NULL, NULL, NULL),
(159, 6, 'North Goa', NULL, NULL, NULL),
(160, 6, 'South Goa', NULL, NULL, NULL),
(161, 7, 'Ahmedabad', NULL, NULL, NULL),
(162, 7, 'Amreli', NULL, NULL, NULL),
(163, 7, 'Anand', NULL, NULL, NULL),
(164, 7, 'Aravalli', NULL, NULL, NULL),
(165, 7, 'Banaskantha', NULL, NULL, NULL),
(166, 7, 'Bharuch', NULL, NULL, NULL),
(167, 7, 'Bhavnagar', NULL, NULL, NULL),
(168, 7, 'Botad', NULL, NULL, NULL),
(169, 7, 'Chhota Udaipur', NULL, NULL, NULL),
(170, 7, 'Dahod', NULL, NULL, NULL),
(171, 7, 'Dang', NULL, NULL, NULL),
(172, 7, 'Devbhumi Dwarka', NULL, NULL, NULL),
(173, 7, 'Gandhinagar', NULL, NULL, NULL),
(174, 7, 'Gir Somnath', NULL, NULL, NULL),
(175, 7, 'Jamnagar', NULL, NULL, NULL),
(176, 7, 'Junagadh', NULL, NULL, NULL),
(177, 7, 'Kheda', NULL, NULL, NULL),
(178, 7, 'Kutch', NULL, NULL, NULL),
(179, 7, 'Mahisagar', NULL, NULL, NULL),
(180, 7, 'Mehsana', NULL, NULL, NULL),
(181, 7, 'Morbi', NULL, NULL, NULL),
(182, 7, 'Narmada', NULL, NULL, NULL),
(183, 7, 'Navsari', NULL, NULL, NULL),
(184, 7, 'Panchmahal', NULL, NULL, NULL),
(185, 7, 'Patan', NULL, NULL, NULL),
(186, 7, 'Porbandar', NULL, NULL, NULL),
(187, 7, 'Rajkot', NULL, NULL, NULL),
(188, 7, 'Sabarkantha', NULL, NULL, NULL),
(189, 7, 'Surat', NULL, NULL, NULL),
(190, 7, 'Surendranagar', NULL, NULL, NULL),
(191, 7, 'Tapi', NULL, NULL, NULL),
(192, 7, 'Vadodara', NULL, NULL, NULL),
(193, 7, 'Valsad', NULL, NULL, NULL),
(194, 8, 'Ambala', NULL, NULL, NULL),
(195, 8, 'Bhiwani', NULL, NULL, NULL),
(196, 8, 'Charkhi Dadri', NULL, NULL, NULL),
(197, 8, 'Faridabad', NULL, NULL, NULL),
(198, 8, 'Fatehabad', NULL, NULL, NULL),
(199, 8, 'Gurugram', NULL, NULL, NULL),
(200, 8, 'Hisar', NULL, NULL, NULL),
(201, 8, 'Jhajjar', NULL, NULL, NULL),
(202, 8, 'Jind', NULL, NULL, NULL),
(203, 8, 'Kaithal', NULL, NULL, NULL),
(204, 8, 'Karnal', NULL, NULL, NULL),
(205, 8, 'Kurukshetra', NULL, NULL, NULL),
(206, 8, 'Mahendragarh', NULL, NULL, NULL),
(207, 8, 'Nuh', NULL, NULL, NULL),
(208, 8, 'Palwal', NULL, NULL, NULL),
(209, 8, 'Panchkula', NULL, NULL, NULL),
(210, 8, 'Panipat', NULL, NULL, NULL),
(211, 8, 'Rewari', NULL, NULL, NULL),
(212, 8, 'Rohtak', NULL, NULL, NULL),
(213, 8, 'Sirsa', NULL, NULL, NULL),
(214, 8, 'Sonipat', NULL, NULL, NULL),
(215, 8, 'Yamunanagar', NULL, NULL, NULL),
(216, 9, 'Bilaspur', NULL, NULL, NULL),
(217, 9, 'Chamba', NULL, NULL, NULL),
(218, 9, 'Hamirpur', NULL, NULL, NULL),
(219, 9, 'Kangra', NULL, NULL, NULL),
(220, 9, 'Kinnaur', NULL, NULL, NULL),
(221, 9, 'Kullu', NULL, NULL, NULL),
(222, 9, 'Lahaul and Spiti', NULL, NULL, NULL),
(223, 9, 'Mandi', NULL, NULL, NULL),
(224, 9, 'Shimla', NULL, NULL, NULL),
(225, 9, 'Sirmaur', NULL, NULL, NULL),
(226, 9, 'Solan', NULL, NULL, NULL),
(227, 9, 'Una', NULL, NULL, NULL),
(228, 11, 'Bokaro', NULL, NULL, NULL),
(229, 11, 'Chatra', NULL, NULL, NULL),
(230, 11, 'Deoghar', NULL, NULL, NULL),
(231, 11, 'Dhanbad', NULL, NULL, NULL),
(232, 11, 'Dumka', NULL, NULL, NULL),
(233, 11, 'East Singhbhum', NULL, NULL, NULL),
(234, 11, 'Garhwa', NULL, NULL, NULL),
(235, 11, 'Giridih', NULL, NULL, NULL),
(236, 11, 'Godda', NULL, NULL, NULL),
(237, 11, 'Gumla', NULL, NULL, NULL),
(238, 11, 'Hazaribag', NULL, NULL, NULL),
(239, 11, 'Jamtara', NULL, NULL, NULL),
(240, 11, 'Khunti', NULL, NULL, NULL),
(241, 11, 'Koderma', NULL, NULL, NULL),
(242, 11, 'Latehar', NULL, NULL, NULL),
(243, 11, 'Lohardaga', NULL, NULL, NULL),
(244, 11, 'Pakur', NULL, NULL, NULL),
(245, 11, 'Palamu', NULL, NULL, NULL),
(246, 11, 'Ramgarh', NULL, NULL, NULL),
(247, 11, 'Ranchi', NULL, NULL, NULL),
(248, 11, 'Sahibganj', NULL, NULL, NULL),
(249, 11, 'Seraikela-Kharsawan', NULL, NULL, NULL),
(250, 11, 'Simdega', NULL, NULL, NULL),
(251, 11, 'West Singhbhum', NULL, NULL, NULL),
(252, 12, 'Bagalakote', NULL, NULL, NULL),
(253, 12, 'Ballari', NULL, NULL, NULL),
(254, 12, 'Belagavi', NULL, NULL, NULL),
(255, 12, 'Bengaluru Rural', NULL, NULL, NULL),
(256, 12, 'Bengaluru Urban', NULL, NULL, NULL),
(257, 12, 'Bidar', NULL, NULL, NULL),
(258, 12, 'Chamarajanagara', NULL, NULL, NULL),
(259, 12, 'Chikkaballapura', NULL, NULL, NULL),
(260, 12, 'Chikkamagaluru', NULL, NULL, NULL),
(261, 12, 'Chitradurga', NULL, NULL, NULL),
(262, 12, 'Dakshina Kannada', NULL, NULL, NULL),
(263, 12, 'Davanagere', NULL, NULL, NULL),
(264, 12, 'Dharwada', NULL, NULL, NULL),
(265, 12, 'Gadaga', NULL, NULL, NULL),
(266, 12, 'Kalaburagi', NULL, NULL, NULL),
(267, 12, 'Hassan', NULL, NULL, NULL),
(268, 12, 'Haveri', NULL, NULL, NULL),
(269, 12, 'Kodagu', NULL, NULL, NULL),
(270, 12, 'Kolar', NULL, NULL, NULL),
(271, 12, 'Koppala', NULL, NULL, NULL),
(272, 12, 'Mandya', NULL, NULL, NULL),
(273, 12, 'Mysuru', NULL, NULL, NULL),
(274, 12, 'Raichuru', NULL, NULL, NULL),
(275, 12, 'Ramanagara', NULL, NULL, NULL),
(276, 12, 'Shivamogga', NULL, NULL, NULL),
(277, 12, 'Tumakuru', NULL, NULL, NULL),
(278, 12, 'Udupi', NULL, NULL, NULL),
(279, 12, 'Uttara Kannada', NULL, NULL, NULL),
(280, 12, 'Vijayanagara', NULL, NULL, NULL),
(281, 12, 'Vijayapura', NULL, NULL, NULL),
(282, 12, 'Yadgiri', NULL, NULL, NULL),
(283, 13, 'Alappuzha', NULL, NULL, NULL),
(284, 13, 'Ernakulam', NULL, NULL, NULL),
(285, 13, 'Idukki', NULL, NULL, NULL),
(286, 13, 'Kannur', NULL, NULL, NULL),
(287, 13, 'Kasaragod', NULL, NULL, NULL),
(288, 13, 'Kollam', NULL, NULL, NULL),
(289, 13, 'Kottayam', NULL, NULL, NULL),
(290, 13, 'Kozhikode', NULL, NULL, NULL),
(291, 13, 'Malappuram', NULL, NULL, NULL),
(292, 13, 'Palakkad', NULL, NULL, NULL),
(293, 13, 'Pathanamthitta', NULL, NULL, NULL),
(294, 13, 'Thrissur', NULL, NULL, NULL),
(295, 13, 'Thiruvananthapuram', NULL, NULL, NULL),
(296, 13, 'Wayanad', NULL, NULL, NULL),
(297, 14, 'Agar Malwa', NULL, NULL, NULL),
(298, 14, 'Alirajpur', NULL, NULL, NULL),
(299, 14, 'Anuppur', NULL, NULL, NULL),
(300, 14, 'Ashoknagar', NULL, NULL, NULL),
(301, 14, 'Balaghat', NULL, NULL, NULL),
(302, 14, 'Barwani', NULL, NULL, NULL),
(303, 14, 'Betul', NULL, NULL, NULL),
(304, 14, 'Bhind', NULL, NULL, NULL),
(305, 14, 'Bhopal', NULL, NULL, NULL),
(306, 14, 'Burhanpur', NULL, NULL, NULL),
(307, 14, 'Chhatarpur', NULL, NULL, NULL),
(308, 14, 'Chhindwara', NULL, NULL, NULL),
(309, 14, 'Damoh', NULL, NULL, NULL),
(310, 14, 'Datia', NULL, NULL, NULL),
(311, 14, 'Dewas', NULL, NULL, NULL),
(312, 14, 'Dhar', NULL, NULL, NULL),
(313, 14, 'Dindori', NULL, NULL, NULL),
(314, 14, 'Guna', NULL, NULL, NULL),
(315, 14, 'Gwalior', NULL, NULL, NULL),
(316, 14, 'Harda', NULL, NULL, NULL),
(317, 14, 'Hoshangabad', NULL, NULL, NULL),
(318, 14, 'Indore', NULL, NULL, NULL),
(319, 14, 'Jabalpur', NULL, NULL, NULL),
(320, 14, 'Jhabua', NULL, NULL, NULL),
(321, 14, 'Katni', NULL, NULL, NULL),
(322, 14, 'Khandwa (East Nimar)', NULL, NULL, NULL),
(323, 14, 'Khargone (West Nimar)', NULL, NULL, NULL),
(324, 14, 'Mandla', NULL, NULL, NULL),
(325, 14, 'Mandsaur', NULL, NULL, NULL),
(326, 14, 'Morena', NULL, NULL, NULL),
(327, 14, 'Narsinghpur', NULL, NULL, NULL),
(328, 14, 'Neemuch', NULL, NULL, NULL),
(329, 14, 'Niwari', NULL, NULL, NULL),
(330, 14, 'Panna', NULL, NULL, NULL),
(331, 14, 'Raisen', NULL, NULL, NULL),
(332, 14, 'Rajgarh', NULL, NULL, NULL),
(333, 14, 'Ratlam', NULL, NULL, NULL),
(334, 14, 'Rewa', NULL, NULL, NULL),
(335, 14, 'Sagar', NULL, NULL, NULL),
(336, 14, 'Satna', NULL, NULL, NULL),
(337, 14, 'Sehore', NULL, NULL, NULL),
(338, 14, 'Seoni', NULL, NULL, NULL),
(339, 14, 'Shahdol', NULL, NULL, NULL),
(340, 14, 'Shajapur', NULL, NULL, NULL),
(341, 14, 'Sheopur', NULL, NULL, NULL),
(342, 14, 'Shivpuri', NULL, NULL, NULL),
(343, 14, 'Sidhi', NULL, NULL, NULL),
(344, 14, 'Singrauli', NULL, NULL, NULL),
(345, 14, 'Tikamgarh', NULL, NULL, NULL),
(346, 14, 'Ujjain', NULL, NULL, NULL),
(347, 14, 'Umaria', NULL, NULL, NULL),
(348, 14, 'Vidisha', NULL, NULL, NULL),
(349, 15, 'Ahmednagar', NULL, NULL, NULL),
(350, 15, 'Akola', NULL, NULL, NULL),
(351, 15, 'Amravati', NULL, NULL, NULL),
(352, 15, 'Beed', NULL, NULL, NULL),
(353, 15, 'Bhandara', NULL, NULL, NULL),
(354, 15, 'Buldhana', NULL, NULL, NULL),
(355, 15, 'Chandrapur', NULL, NULL, NULL),
(356, 15, 'Dharashiv', NULL, NULL, NULL),
(357, 15, 'Dhule', NULL, NULL, NULL),
(358, 15, 'Gadchiroli', NULL, NULL, NULL),
(359, 15, 'Gondia', NULL, NULL, NULL),
(360, 15, 'Hingoli', NULL, NULL, NULL),
(361, 15, 'Jalgaon', NULL, NULL, NULL),
(362, 15, 'Jalna', NULL, NULL, NULL),
(363, 15, 'Kolhapur', NULL, NULL, NULL),
(364, 15, 'Latur', NULL, NULL, NULL),
(365, 15, 'Mumbai City', NULL, NULL, NULL),
(366, 15, 'Mumbai Suburban', NULL, NULL, NULL),
(367, 15, 'Nanded', NULL, NULL, NULL),
(368, 15, 'Nandurbar', NULL, NULL, NULL),
(369, 15, 'Nagpur', NULL, NULL, NULL),
(370, 15, 'Nashik', NULL, NULL, NULL),
(371, 15, 'Palghar', NULL, NULL, NULL),
(372, 15, 'Parbhani', NULL, NULL, NULL),
(373, 15, 'Pune', NULL, NULL, NULL),
(374, 15, 'Raigad', NULL, NULL, NULL),
(375, 15, 'Ratnagiri', NULL, NULL, NULL),
(376, 15, 'Sambhajinagar', NULL, NULL, NULL),
(377, 15, 'Sangli', NULL, NULL, NULL),
(378, 15, 'Satara', NULL, NULL, NULL),
(379, 15, 'Sindhudurg', NULL, NULL, NULL),
(380, 15, 'Solapur', NULL, NULL, NULL),
(381, 15, 'Thane', NULL, NULL, NULL),
(382, 15, 'Wardha', NULL, NULL, NULL),
(383, 15, 'Washim', NULL, NULL, NULL),
(384, 15, 'Yavatmal', NULL, NULL, NULL),
(385, 16, 'Bishnupur', NULL, NULL, NULL),
(386, 16, 'Chandel', NULL, NULL, NULL),
(387, 16, 'Churachandpur', NULL, NULL, NULL),
(388, 16, 'Imphal East', NULL, NULL, NULL),
(389, 16, 'Imphal West', NULL, NULL, NULL),
(390, 16, 'Jiribam', NULL, NULL, NULL),
(391, 16, 'Kakching', NULL, NULL, NULL),
(392, 16, 'Kamjong', NULL, NULL, NULL),
(393, 16, 'Kangpokpi', NULL, NULL, NULL),
(394, 16, 'Noney', NULL, NULL, NULL),
(395, 16, 'Pherzawl', NULL, NULL, NULL),
(396, 16, 'Senapati', NULL, NULL, NULL),
(397, 16, 'Tamenglong', NULL, NULL, NULL),
(398, 16, 'Tengnoupal', NULL, NULL, NULL),
(399, 16, 'Thoubal', NULL, NULL, NULL),
(400, 16, 'Ukhrul', NULL, NULL, NULL),
(401, 17, 'East Garo Hills', NULL, NULL, NULL),
(402, 17, 'East Khasi Hills', NULL, NULL, NULL),
(403, 17, 'East Jaintia Hills', NULL, NULL, NULL),
(404, 17, 'Eastern West Khasi Hills', NULL, NULL, NULL),
(405, 17, 'North Garo Hills', NULL, NULL, NULL),
(406, 17, 'Ri Bhoi', NULL, NULL, NULL),
(407, 17, 'South Garo Hills', NULL, NULL, NULL),
(408, 17, 'South West Garo Hills', NULL, NULL, NULL),
(409, 17, 'South West Khasi Hills', NULL, NULL, NULL),
(410, 17, 'West Garo Hills', NULL, NULL, NULL),
(411, 17, 'West Jaintia Hills', NULL, NULL, NULL),
(412, 17, 'West Khasi Hills', NULL, NULL, NULL),
(413, 18, 'Aizawl', NULL, NULL, NULL),
(414, 18, 'Champhai', NULL, NULL, NULL),
(415, 18, 'Hnahthial', NULL, NULL, NULL),
(416, 18, 'Khawzawl', NULL, NULL, NULL),
(417, 18, 'Kolasib', NULL, NULL, NULL),
(418, 18, 'Lawngtlai', NULL, NULL, NULL),
(419, 18, 'Lunglei', NULL, NULL, NULL),
(420, 18, 'Mamit', NULL, NULL, NULL),
(421, 18, 'Saiha', NULL, NULL, NULL),
(422, 18, 'Saitual', NULL, NULL, NULL),
(423, 18, 'Serchhip', NULL, NULL, NULL),
(424, 19, 'Dimapur', NULL, NULL, NULL),
(425, 19, 'Kiphire', NULL, NULL, NULL),
(426, 19, 'Kohima', NULL, NULL, NULL),
(427, 19, 'Longleng', NULL, NULL, NULL),
(428, 19, 'Mokokchung', NULL, NULL, NULL),
(429, 19, 'Mon', NULL, NULL, NULL),
(430, 19, 'Niuland', NULL, NULL, NULL),
(431, 19, 'Noklak', NULL, NULL, NULL),
(432, 19, 'Peren', NULL, NULL, NULL),
(433, 19, 'Phek', NULL, NULL, NULL),
(434, 19, 'Shamator', NULL, NULL, NULL),
(435, 19, 'Tuensang', NULL, NULL, NULL),
(436, 19, 'Wokha', NULL, NULL, NULL),
(437, 19, 'Zunheboto', NULL, NULL, NULL),
(438, 20, 'Angul', NULL, NULL, NULL),
(439, 20, 'Boudh (Bauda)', NULL, NULL, NULL),
(440, 20, 'Bhadrak', NULL, NULL, NULL),
(441, 20, 'Balangir', NULL, NULL, NULL),
(442, 20, 'Bargarh (Baragarh)', NULL, NULL, NULL),
(443, 20, 'Balasore', NULL, NULL, NULL),
(444, 20, 'Cuttack', NULL, NULL, NULL),
(445, 20, 'Debagarh (Deogarh)', NULL, NULL, NULL),
(446, 20, 'Dhenkanal', NULL, NULL, NULL),
(447, 20, 'Ganjam', NULL, NULL, NULL),
(448, 20, 'Gajapati', NULL, NULL, NULL),
(449, 20, 'Jharsuguda', NULL, NULL, NULL),
(450, 20, 'Jajpur', NULL, NULL, NULL),
(451, 20, 'Jagatsinghpur', NULL, NULL, NULL),
(452, 20, 'Khordha', NULL, NULL, NULL),
(453, 20, 'Kendujhar', NULL, NULL, NULL),
(454, 20, 'Kalahandi', NULL, NULL, NULL),
(455, 20, 'Kandhamal', NULL, NULL, NULL),
(456, 20, 'Koraput', NULL, NULL, NULL),
(457, 20, 'Kendrapara', NULL, NULL, NULL),
(458, 20, 'Malkangiri', NULL, NULL, NULL),
(459, 20, 'Mayurbhanj', NULL, NULL, NULL),
(460, 20, 'Nabarangpur', NULL, NULL, NULL),
(461, 20, 'Nuapada', NULL, NULL, NULL),
(462, 20, 'Nayagarh', NULL, NULL, NULL),
(463, 20, 'Puri', NULL, NULL, NULL),
(464, 20, 'Rayagada', NULL, NULL, NULL),
(465, 20, 'Sambalpur', NULL, NULL, NULL),
(466, 20, 'Subarnapur (Sonepur)', NULL, NULL, NULL),
(467, 20, 'Sundargarh', NULL, NULL, NULL),
(468, 21, 'Amritsar', NULL, NULL, NULL),
(469, 21, 'Barnala', NULL, NULL, NULL),
(470, 21, 'Bathinda', NULL, NULL, NULL),
(471, 21, 'Firozpur', NULL, NULL, NULL),
(472, 21, 'Faridkot', NULL, NULL, NULL),
(473, 21, 'Fatehgarh Sahib', NULL, NULL, NULL),
(474, 21, 'Fazilka', NULL, NULL, NULL),
(475, 21, 'Gurdaspur', NULL, NULL, NULL),
(476, 21, 'Hoshiarpur', NULL, NULL, NULL),
(477, 21, 'Jalandhar', NULL, NULL, NULL),
(478, 21, 'Kapurthala', NULL, NULL, NULL),
(479, 21, 'Ludhiana', NULL, NULL, NULL),
(480, 21, 'Malerkotla', NULL, NULL, NULL),
(481, 21, 'Mansa', NULL, NULL, NULL),
(482, 21, 'Moga', NULL, NULL, NULL),
(483, 21, 'Sri Muktsar Sahib', NULL, NULL, NULL),
(484, 21, 'Pathankot', NULL, NULL, NULL),
(485, 21, 'Patiala', NULL, NULL, NULL),
(486, 21, 'Rupnagar', NULL, NULL, NULL),
(487, 21, 'Sahibzada Ajit Singh Nagar', NULL, NULL, NULL),
(488, 21, 'Sangrur', NULL, NULL, NULL),
(489, 21, 'Shahid Bhagat Singh Nagar', NULL, NULL, NULL),
(490, 21, 'Tarn Taran', NULL, NULL, NULL),
(491, 22, 'Ajmer', NULL, NULL, NULL),
(492, 22, 'Alwar', NULL, NULL, NULL),
(493, 22, 'Bikaner', NULL, NULL, NULL),
(494, 22, 'Barmer', NULL, NULL, NULL),
(495, 22, 'Banswara', NULL, NULL, NULL),
(496, 22, 'Bharatpur', NULL, NULL, NULL),
(497, 22, 'Baran', NULL, NULL, NULL),
(498, 22, 'Bundi', NULL, NULL, NULL),
(499, 22, 'Bhilwara', NULL, NULL, NULL),
(500, 22, 'Churu', NULL, NULL, NULL),
(501, 22, 'Chittorgarh', NULL, NULL, NULL),
(502, 22, 'Dausa', NULL, NULL, NULL),
(503, 22, 'Dholpur', NULL, NULL, NULL),
(504, 22, 'Dungarpur', NULL, NULL, NULL),
(505, 22, 'Sri Ganganagar', NULL, NULL, NULL),
(506, 22, 'Hanumangarh', NULL, NULL, NULL),
(507, 22, 'Jhunjhunu', NULL, NULL, NULL),
(508, 22, 'Jalore', NULL, NULL, NULL),
(509, 22, 'Jodhpur', NULL, NULL, NULL),
(510, 22, 'Jaipur', NULL, NULL, NULL),
(511, 22, 'Jaisalmer', NULL, NULL, NULL),
(512, 22, 'Jhalawar', NULL, NULL, NULL),
(513, 22, 'Karauli', NULL, NULL, NULL),
(514, 22, 'Kota', NULL, NULL, NULL),
(515, 22, 'Nagaur', NULL, NULL, NULL),
(516, 22, 'Pali', NULL, NULL, NULL),
(517, 22, 'Pratapgarh', NULL, NULL, NULL),
(518, 22, 'Rajsamand', NULL, NULL, NULL),
(519, 22, 'Sikar', NULL, NULL, NULL),
(520, 22, 'Sawai Madhopur', NULL, NULL, NULL),
(521, 22, 'Sirohi', NULL, NULL, NULL),
(522, 22, 'Tonk', NULL, NULL, NULL),
(523, 22, 'Udaipur', NULL, NULL, NULL),
(524, 23, 'East Sikkim', NULL, NULL, NULL),
(525, 23, 'North Sikkim', NULL, NULL, NULL),
(526, 23, 'Pakyong', NULL, NULL, NULL),
(527, 23, 'Soreng', NULL, NULL, NULL),
(528, 23, 'South Sikkim', NULL, NULL, NULL),
(529, 23, 'West Sikkim', NULL, NULL, NULL),
(530, 24, 'Ariyalur', NULL, NULL, NULL),
(531, 24, 'Chengalpattu', NULL, NULL, NULL),
(532, 24, 'Chennai', NULL, NULL, NULL),
(533, 24, 'Coimbatore', NULL, NULL, NULL),
(534, 24, 'Cuddalore', NULL, NULL, NULL),
(535, 24, 'Dharmapuri', NULL, NULL, NULL),
(536, 24, 'Dindigul', NULL, NULL, NULL),
(537, 24, 'Erode', NULL, NULL, NULL),
(538, 24, 'Kallakurichi', NULL, NULL, NULL),
(539, 24, 'Kanchipuram', NULL, NULL, NULL),
(540, 24, 'Kanyakumari', NULL, NULL, NULL),
(541, 24, 'Karur', NULL, NULL, NULL),
(542, 24, 'Krishnagiri', NULL, NULL, NULL),
(543, 24, 'Madurai', NULL, NULL, NULL),
(544, 24, 'Mayiladuthurai', NULL, NULL, NULL),
(545, 24, 'Nagapattinam', NULL, NULL, NULL),
(546, 24, 'Nilgiris', NULL, NULL, NULL),
(547, 24, 'Namakkal', NULL, NULL, NULL),
(548, 24, 'Perambalur', NULL, NULL, NULL),
(549, 24, 'Pudukkottai', NULL, NULL, NULL),
(550, 24, 'Ramanathapuram', NULL, NULL, NULL),
(551, 24, 'Ranipet', NULL, NULL, NULL),
(552, 24, 'Salem', NULL, NULL, NULL),
(553, 24, 'Sivaganga', NULL, NULL, NULL),
(554, 24, 'Tenkasi', NULL, NULL, NULL),
(555, 24, 'Tiruppur', NULL, NULL, NULL),
(556, 24, 'Tiruchirappalli', NULL, NULL, NULL),
(557, 24, 'Theni', NULL, NULL, NULL),
(558, 24, 'Tirunelveli', NULL, NULL, NULL),
(559, 24, 'Thanjavur', NULL, NULL, NULL),
(560, 24, 'Thoothukudi', NULL, NULL, NULL),
(561, 24, 'Tirupattur', NULL, NULL, NULL),
(562, 24, 'Tiruvallur', NULL, NULL, NULL),
(563, 24, 'Tiruvarur', NULL, NULL, NULL),
(564, 24, 'Tiruvannamalai', NULL, NULL, NULL),
(565, 24, 'Vellore', NULL, NULL, NULL),
(566, 24, 'Viluppuram', NULL, NULL, NULL),
(567, 24, 'Virudhunagar', NULL, NULL, NULL),
(568, 25, 'Adilabad', NULL, '2024-04-24 07:30:25', NULL),
(569, 25, 'Bhadradri Kothagudem', NULL, NULL, NULL),
(570, 25, 'Hanamkonda', NULL, NULL, NULL),
(571, 25, 'Hyderabad', NULL, NULL, NULL),
(572, 25, 'Jagtial', NULL, NULL, NULL),
(573, 25, 'Jangaon', NULL, NULL, NULL),
(574, 25, 'Jayashankar Bhupalpally', NULL, NULL, NULL),
(575, 25, 'Jogulamba Gadwal', NULL, NULL, NULL),
(576, 25, 'Kamareddy', NULL, NULL, NULL),
(577, 25, 'Karimnagar', NULL, NULL, NULL),
(578, 25, 'Khammam', NULL, NULL, NULL),
(579, 25, 'Kumuram Bheem Asifabad', NULL, NULL, NULL),
(580, 25, 'Mahabubabad', NULL, NULL, NULL),
(581, 25, 'Mahbubnagar', NULL, NULL, NULL),
(582, 25, 'Mancherial', NULL, NULL, NULL),
(583, 25, 'Medak', NULL, NULL, NULL),
(584, 25, 'Mulugu', NULL, NULL, NULL),
(585, 25, 'Nalgonda', NULL, NULL, NULL),
(586, 25, 'Narayanpet', NULL, NULL, NULL),
(587, 25, 'Nagarkurnool', NULL, NULL, NULL),
(588, 25, 'Nirmal', NULL, NULL, NULL),
(589, 25, 'Nizamabad', NULL, NULL, NULL),
(590, 25, 'Peddapalli', NULL, NULL, NULL),
(591, 25, 'Rajanna Sircilla', NULL, NULL, NULL),
(592, 25, 'Ranga Reddy', NULL, NULL, NULL),
(593, 25, 'Sangareddy', NULL, NULL, NULL),
(594, 25, 'Siddipet', NULL, NULL, NULL),
(595, 25, 'Suryapet', NULL, NULL, NULL),
(596, 25, 'Vikarabad', NULL, NULL, NULL),
(597, 25, 'Wanaparthy', NULL, NULL, NULL),
(598, 25, 'Warangal', NULL, NULL, NULL),
(599, 25, 'Yadadri Bhuvanagiri', NULL, NULL, NULL),
(600, 26, 'Dhalai', NULL, NULL, NULL),
(601, 26, 'Gomati', NULL, NULL, NULL),
(602, 26, 'Khowai', NULL, NULL, NULL),
(603, 26, 'North Tripura', NULL, NULL, NULL),
(604, 26, 'Sepahijala', NULL, NULL, NULL),
(605, 26, 'South Tripura', NULL, NULL, NULL),
(606, 26, 'Unakoti', NULL, NULL, NULL),
(607, 26, 'West Tripura', NULL, NULL, NULL),
(608, 27, 'Agra', NULL, NULL, NULL),
(609, 27, 'Aligarh', NULL, NULL, NULL),
(610, 27, 'Ambedkar Nagar', NULL, NULL, NULL),
(611, 27, 'Amethi', NULL, NULL, NULL),
(612, 27, 'Amroha', NULL, NULL, NULL),
(613, 27, 'Auraiya', NULL, NULL, NULL),
(614, 27, 'Ayodhya', NULL, NULL, NULL),
(615, 27, 'Azamgarh', NULL, NULL, NULL),
(616, 27, 'Bagpat', NULL, NULL, NULL),
(617, 27, 'Bahraich', NULL, NULL, NULL),
(618, 27, 'Ballia', NULL, NULL, NULL),
(619, 27, 'Balrampur', NULL, NULL, NULL),
(620, 27, 'Banda', NULL, NULL, NULL),
(621, 27, 'Barabanki', NULL, NULL, NULL),
(622, 27, 'Bareilly', NULL, NULL, NULL),
(623, 27, 'Basti', NULL, NULL, NULL),
(624, 27, 'Bhadohi', NULL, NULL, NULL),
(625, 27, 'Bijnor', NULL, NULL, NULL),
(626, 27, 'Budaun', NULL, NULL, NULL),
(627, 27, 'Bulandshahr', NULL, NULL, NULL),
(628, 27, 'Chandauli', NULL, NULL, NULL),
(629, 27, 'Chitrakoot', NULL, NULL, NULL),
(630, 27, 'Deoria', NULL, NULL, NULL),
(631, 27, 'Etah', NULL, NULL, NULL),
(632, 27, 'Etawah', NULL, NULL, NULL),
(633, 27, 'Farrukhabad', NULL, NULL, NULL),
(634, 27, 'Fatehpur', NULL, NULL, NULL),
(635, 27, 'Firozabad', NULL, NULL, NULL),
(636, 27, 'Gautam Buddha Nagar', NULL, NULL, NULL),
(637, 27, 'Ghaziabad', NULL, NULL, NULL),
(638, 27, 'Ghazipur', NULL, NULL, NULL),
(639, 27, 'Gonda', NULL, NULL, NULL),
(640, 27, 'Gorakhpur', NULL, NULL, NULL),
(641, 27, 'Hamirpur', NULL, NULL, NULL),
(642, 27, 'Hapur', NULL, NULL, NULL),
(643, 27, 'Hardoi', NULL, NULL, NULL),
(644, 27, 'Hathras', NULL, NULL, NULL),
(645, 27, 'Jalaun', NULL, NULL, NULL),
(646, 27, 'Jaunpur', NULL, NULL, NULL),
(647, 27, 'Jhansi', NULL, NULL, NULL),
(648, 27, 'Kannauj', NULL, NULL, NULL),
(649, 27, 'Kanpur Dehat', NULL, NULL, NULL),
(650, 27, 'Kanpur Nagar', NULL, NULL, NULL),
(651, 27, 'Kasganj', NULL, NULL, NULL),
(652, 27, 'Kaushambi', NULL, NULL, NULL),
(653, 27, 'Kushinagar', NULL, NULL, NULL),
(654, 27, 'Lakhimpur Kheri', NULL, NULL, NULL),
(655, 27, 'Lalitpur', NULL, NULL, NULL),
(656, 27, 'Lucknow', NULL, NULL, NULL),
(657, 27, 'Maharajganj', NULL, NULL, NULL),
(658, 27, 'Mahoba', NULL, NULL, NULL),
(659, 27, 'Mainpuri', NULL, NULL, NULL),
(660, 27, 'Mathura', NULL, NULL, NULL),
(661, 27, 'Mau', NULL, NULL, NULL),
(662, 27, 'Meerut', NULL, NULL, NULL),
(663, 27, 'Mirzapur', NULL, NULL, NULL),
(664, 27, 'Moradabad', NULL, NULL, NULL),
(665, 27, 'Muzaffarnagar', NULL, NULL, NULL),
(666, 27, 'Pilibhit', NULL, NULL, NULL),
(667, 27, 'Pratapgarh', NULL, NULL, NULL),
(668, 27, 'Prayagraj', NULL, NULL, NULL),
(669, 27, 'Raebareli', NULL, NULL, NULL),
(670, 27, 'Rampur', NULL, NULL, NULL),
(671, 27, 'Saharanpur', NULL, NULL, NULL),
(672, 27, 'Sambhal', NULL, NULL, NULL),
(673, 27, 'Sant Kabir Nagar', NULL, NULL, NULL),
(674, 27, 'Shahjahanpur', NULL, NULL, NULL),
(675, 27, 'Shamli', NULL, NULL, NULL),
(676, 27, 'Shravasti', NULL, NULL, NULL),
(677, 27, 'Siddharthnagar', NULL, NULL, NULL),
(678, 27, 'Sitapur', NULL, NULL, NULL),
(679, 27, 'Sonbhadra', NULL, NULL, NULL),
(680, 27, 'Sultanpur', NULL, NULL, NULL),
(681, 27, 'Unnao', NULL, NULL, NULL),
(682, 27, 'Varanasi', NULL, NULL, NULL),
(683, 28, 'Almora', NULL, NULL, NULL),
(684, 28, 'Bageshwar', NULL, NULL, NULL),
(685, 28, 'Chamoli', NULL, NULL, NULL),
(686, 28, 'Champawat', NULL, NULL, NULL),
(687, 28, 'Dehradun', NULL, NULL, NULL),
(688, 28, 'Haridwar', NULL, NULL, NULL),
(689, 28, 'Nainital', NULL, NULL, NULL),
(690, 28, 'Pauri Garhwal', NULL, NULL, NULL),
(691, 28, 'Pithoragarh', NULL, NULL, NULL),
(692, 28, 'Rudraprayag', NULL, NULL, NULL),
(693, 28, 'Tehri Garhwal', NULL, NULL, NULL),
(694, 28, 'Udham Singh Nagar', NULL, NULL, NULL),
(695, 28, 'Uttarkashi', NULL, NULL, NULL),
(696, 29, 'Alipurduar', NULL, NULL, NULL),
(697, 29, 'Bankura', NULL, NULL, NULL),
(698, 29, 'Birbhum', NULL, NULL, NULL),
(699, 29, 'Cooch Behar', NULL, NULL, NULL),
(700, 29, 'Dakshin Dinajpur', NULL, NULL, NULL),
(701, 29, 'Darjeeling', NULL, NULL, NULL),
(702, 29, 'Hooghly', NULL, NULL, NULL),
(703, 29, 'Howrah', NULL, NULL, NULL),
(704, 29, 'Jalpaiguri', NULL, NULL, NULL),
(705, 29, 'Jhargram', NULL, NULL, NULL),
(706, 29, 'Kalimpong', NULL, NULL, NULL),
(707, 29, 'Kolkata', NULL, NULL, NULL),
(708, 29, 'Maldah', NULL, NULL, NULL),
(709, 29, 'Murshidabad', NULL, NULL, NULL),
(710, 29, 'Nadia', NULL, NULL, NULL),
(711, 29, 'North 24 Parganas', NULL, NULL, NULL),
(712, 29, 'Paschim Bardhaman', NULL, NULL, NULL),
(713, 29, 'Paschim Medinipur', NULL, NULL, NULL),
(714, 29, 'Purba Bardhaman', NULL, NULL, NULL),
(715, 29, 'Purba Medinipur', NULL, NULL, NULL),
(716, 29, 'Purulia', NULL, NULL, NULL),
(717, 29, 'South 24 Parganas', NULL, NULL, NULL),
(718, 29, 'Uttar Dinajpur', NULL, NULL, NULL),
(719, 10, 'Ramban', NULL, NULL, NULL),
(720, 10, 'Rajouri', NULL, NULL, NULL),
(721, 10, 'Reasi', NULL, NULL, NULL),
(722, 10, 'Samba', NULL, NULL, NULL),
(723, 10, 'Shopian', NULL, NULL, NULL),
(724, 10, 'Srinagar', NULL, NULL, NULL),
(725, 10, 'Udhampur', NULL, NULL, NULL),
(726, 10, 'Anantnag', NULL, NULL, NULL),
(727, 10, 'Budgam', NULL, NULL, NULL),
(728, 10, 'Bandipore', NULL, NULL, NULL),
(729, 10, 'Baramulla', NULL, NULL, NULL),
(730, 10, 'Doda', NULL, NULL, NULL),
(731, 10, 'Ganderbal', NULL, NULL, NULL),
(732, 10, 'Jammu', NULL, NULL, NULL),
(733, 10, 'Kathua', NULL, NULL, NULL),
(734, 10, 'Kishtwar', NULL, NULL, NULL),
(735, 10, 'Kulgam', NULL, NULL, NULL),
(736, 10, 'Kupwara', NULL, NULL, NULL),
(737, 10, 'Poonch', NULL, NULL, NULL),
(738, 10, 'Pulwama', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` int NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SSC Certificate', NULL, NULL, NULL),
(2, 'Intermediate Marks List', NULL, NULL, NULL),
(3, 'B.Tech Marks Memo', NULL, '2024-04-24 07:46:40', NULL),
(4, 'M.Tech Marks Memo', NULL, NULL, NULL),
(5, 'OD', '2024-04-02 12:47:38', '2024-04-02 12:47:38', NULL),
(6, 'Tamil', '2024-04-24 07:46:48', '2024-04-24 07:46:52', '2024-04-24 07:46:52');

-- --------------------------------------------------------

--
-- Table structure for table `educational_qualification`
--

CREATE TABLE `educational_qualification` (
  `id` int NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educational_qualification`
--

INSERT INTO `educational_qualification` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Secondary School Certificate', '2024-04-19 12:23:51', '2024-04-19 12:23:51', NULL),
(2, 'Higher Secondary Certificate / Diploma', '2024-04-19 12:24:57', '2024-04-24 07:48:32', NULL),
(3, 'BE/BTech', '2024-04-19 12:25:22', '2024-04-24 07:47:41', NULL),
(4, 'M-Tech', '2024-04-19 12:25:30', '2024-04-19 12:25:30', NULL),
(5, 'MBBS', '2024-04-19 12:30:48', '2024-04-19 12:30:55', '2024-04-19 12:30:55'),
(6, 'Diploma', '2024-04-24 07:47:49', '2024-04-24 07:47:55', '2024-04-24 07:47:55');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int NOT NULL,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` int DEFAULT NULL COMMENT '1=male,2=female, 0=others',
  `dob` date DEFAULT NULL,
  `mobile` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alt_mobile` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `place_of_birth` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `passport_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `passport_type` int DEFAULT NULL,
  `passport_issued_date` date DEFAULT NULL,
  `passport_expiry_date` date DEFAULT NULL,
  `place_of_issue` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `district` int DEFAULT NULL,
  `state` int DEFAULT NULL,
  `country` int DEFAULT NULL,
  `pincode` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nationality` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `marital_status` int DEFAULT NULL,
  `photo` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `employee_status` int NOT NULL DEFAULT '1' COMMENT '1=enable,0=disable ',
  `emp_experience` float(11,2) DEFAULT NULL COMMENT 'in Years',
  `emergency_id` int DEFAULT NULL,
  `edu_qualification` int DEFAULT NULL COMMENT 'Education Qualification',
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `code`, `fname`, `lname`, `gender`, `dob`, `mobile`, `alt_mobile`, `email`, `place_of_birth`, `passport_no`, `passport_type`, `passport_issued_date`, `passport_expiry_date`, `place_of_issue`, `address1`, `address2`, `city`, `district`, `state`, `country`, `pincode`, `nationality`, `marital_status`, `photo`, `employee_status`, `emp_experience`, `emergency_id`, `edu_qualification`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`) VALUES
(1, 'E24040001', 'Krishnakant', 'Konaganti', 1, '1991-05-06', '9916232586', '', 'kk123@gmail.com', 'Guntur', 'R1234567', 1, '2017-11-16', '2027-11-15', 'vijayawada', '9-3/2A,Gowry towers, Ankalamma street, ', 'Road No. 3', 'gunutr', 10, 1, 80, '522006', 'Indian', 2, '1713939961_85e2395646b0039dd32f.png', 1, 6.50, 12, 2, '2024-04-03 17:43:46', 1, '2024-04-24 08:00:44', 1, NULL),
(2, 'E24040002', 'Rahul', 'KL', 1, '2000-11-23', '8974521212', '', 'RAHUL@GMAIL.COM', 'Guntur', 'R234567', 2, '2002-12-23', '2019-06-13', 'Chennai', 'H-No 56/2', 'Road No. 3', 'Kanchi', 707, 29, 80, '502321', 'Indian', 1, '1713767922_d2d7e6fa32b5812fc0f0.png', 1, 1.00, 4, NULL, '2024-04-05 11:02:41', 1, '2024-04-17 11:16:10', 1, NULL),
(6, 'ME00006', 'Naga', 'Vamshi', 1, '1984-02-21', '7589463215', '', 'naga@yahhoo.com', 'Hyderabad', 'S12397H', 3, '2014-12-23', '2024-05-22', 'Delhi', 'Gokul plots, Plot no 1295 1296 Flat no 303, 3rd floor SR White House, Venkata Ramana Colony, Kukatpally', 'Road No. 3', 'Hyderabad', 160, 6, 80, '500072', 'Indian', 2, '1713770940_123aa220e71bd7edc847.png', 0, 5.00, 0, 1, '2024-04-12 11:35:21', 1, '2024-04-24 05:45:10', 1, NULL),
(8, 'ME00008', 'Kavya', 'G', 2, '1992-05-02', '4587415269', '', 'kavya@gmail.com', 'haryana', 'A1234SD', 2, '2018-12-21', '2022-11-26', 'Delhi', 'Red Fort Hanumana Street', 'JSL colony', 'Hamirpur', 89, 4, 80, '500072', 'Indian', 2, '1713173969_c2246bcb2cb416c9815e.png', 0, 1.00, 0, NULL, '2024-04-12 11:35:21', 1, '2024-04-16 10:24:59', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_documents`
--

CREATE TABLE `employee_documents` (
  `id` int NOT NULL,
  `employee_id` int DEFAULT NULL,
  `document_type_id` int DEFAULT NULL,
  `file` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_documents`
--

INSERT INTO `employee_documents` (`id`, `employee_id`, `document_type_id`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 2, '1713000287_7b361a694751581130bb.png', '2024-04-13 09:24:47', '2024-04-13 09:24:47', NULL),
(2, 4, 2, '1713000521_f4161913cfc3c005feb2.png', '2024-04-13 09:28:41', '2024-04-13 09:28:41', NULL),
(3, 4, 5, '1713000548_63efa2cf5a8d8bf361e1.png', '2024-04-13 09:29:08', '2024-04-13 09:29:08', NULL),
(6, 2, 3, '1713003160_0e1b9affeac4d371b281.jpg', '2024-04-13 10:12:40', '2024-04-13 10:12:40', NULL),
(7, 2, 3, '1713003184_d68b6645cd8d89836439.png', '2024-04-13 10:13:04', '2024-04-13 10:13:04', NULL),
(9, 4, 3, '1713003400_94af7fbd1a00cba223a5.png', '2024-04-13 10:16:40', '2024-04-13 10:27:17', '2024-04-13 10:27:17'),
(22, 6, 1, '1713944011_64d017ebc555aeda5ffc.csv', '2024-04-24 07:33:31', '2024-04-24 07:33:31', NULL),
(24, 9, 2, '1713944903_90e8a02235998e04e060.pdf', '2024-04-24 07:48:23', '2024-04-24 07:48:23', NULL),
(25, 1, 2, '1713949219_41aa9b1d7afb16cfd0a4.pdf', '2024-04-24 09:00:19', '2024-04-24 09:00:19', NULL),
(26, 8, 3, '1713956542_cfccf2f59e915c2ca996.pdf', '2024-04-24 11:02:22', '2024-04-24 11:02:22', NULL),
(27, 9, 1, '1713959165_ecb5a3baac770d12f48a.pdf', '2024-04-24 11:46:05', '2024-04-24 11:46:05', NULL),
(28, 9, 1, '1714029173_f390a8e9af5005ac1ca4.pdf', '2024-04-25 07:12:53', '2024-04-25 07:12:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_education`
--

CREATE TABLE `employee_education` (
  `id` int NOT NULL,
  `employee_id` int DEFAULT NULL,
  `edu_qualification` int DEFAULT NULL,
  `university` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `certificate_no` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `start_year` int DEFAULT NULL,
  `end_year` int DEFAULT NULL,
  `graduated_year` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_education`
--

INSERT INTO `employee_education` (`id`, `employee_id`, `edu_qualification`, `university`, `course`, `certificate_no`, `start_year`, `end_year`, `graduated_year`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 'Sri Vidyanikethan Jr College', 'Intermediate (MPC)', '44589654', 2008, 2010, NULL, '2024-04-03 18:22:57', NULL),
(16, 1, 1, 'Acharya Nagarjuna University', 'B.Tech(CSEA)', '98876545', 2018, 2022, 2024, '2024-04-12 08:01:12', '2024-04-12 09:57:26'),
(26, 4, 1, 'JNTUK', 'B.Tech', '23456987', 2019, 2023, 2023, '2024-04-12 10:25:54', '2024-04-12 10:25:54'),
(30, 1, 1, 'JNTUK', 'BSC(Computers)', '23456987', 2018, 2022, 2022, '2024-04-15 11:26:36', '2024-04-15 11:26:36'),
(32, 6, 2, 'JNTUK', 'Mech', '23456', 2018, 2022, 2020, '2024-04-22 10:49:35', '2024-04-25 08:03:37'),
(33, 8, 3, 'JNTUH', 'CSE', 'U19CN223', 2018, 2022, 2023, '2024-04-22 11:26:10', '2024-04-22 11:26:55'),
(35, 2, 3, 'JNTUH', 'CSE', 'U19CN223', 2019, 2023, 2023, '2024-04-22 11:32:19', '2024-04-22 11:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `employee_experience`
--

CREATE TABLE `employee_experience` (
  `id` int NOT NULL,
  `employee_id` int DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `email` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci,
  `country` int DEFAULT NULL,
  `current_organisation` tinyint DEFAULT NULL COMMENT '0 = previous company, 1 = current company',
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_experience`
--

INSERT INTO `employee_experience` (`id`, `employee_id`, `company_name`, `designation`, `from_date`, `to_date`, `email`, `mobile`, `address`, `country`, `current_organisation`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 1, 'Megha Engineering and Infrastructures Limited', 'Senior Site Engineer', '2022-06-04', '2023-10-10', 'KrishnakanthKonaganti@meil1.com', '9916232586', 'balanagar, industrial park', 79, 1, '2024-04-03 18:25:42', 1, '2024-04-24 08:59:34', 1, NULL, NULL),
(2, 1, 'XYZ Constructions Pvt Ltd', 'Poject Associate', '2017-11-18', '2024-04-15', 'krishnak@xyz1.com', '9916232586', 'xyz area, ABC zonal district', 80, 0, '2024-04-03 18:30:30', 1, '2024-04-24 08:59:53', 1, NULL, NULL),
(5, 2, 'dhanun', 'dvv', '2024-04-04', '2024-04-10', 'asdfgh@gmail.com', '1234567888', 'wfeaEGE', 79, 1, '2024-04-11 13:03:40', NULL, '2024-04-12 10:55:48', NULL, '2024-04-12 10:55:48', NULL),
(6, 2, 'dhanundgxhbfcjj', 'dvvfhfcjcj', '2023-02-08', '2024-04-10', 'asdfrfedtgedsgh@gmail.com', '1234567444', 'wfeaEGEfxhnjc', 79, 1, '2024-04-11 13:24:26', NULL, '2024-04-12 11:18:03', NULL, '2024-04-12 11:18:03', NULL),
(7, 4, 'ags', 'design', '2024-04-03', '2024-04-12', 'ravikumar123@gmail.com', '1234567890', 'hgyjfjc', 77, 1, '2024-04-12 05:53:58', NULL, '2024-04-15 11:26:41', 1, '2024-04-12 09:58:22', NULL),
(8, 4, 'dhanun', 'dvv', '2024-04-03', '2024-04-16', 'asdfgh@gmail.com', '1234567890', 'ndv ndva a', 79, 0, '2024-04-12 06:28:51', NULL, '2024-04-12 10:44:21', NULL, '2024-04-12 10:44:21', NULL),
(9, 4, 'dhanun', 'dvv', '0000-00-00', '0000-00-00', 'shankarreddy2321@gmail.com', '1234567888', 'AfwcwscFWScf', 79, 1, '2024-04-12 10:05:20', NULL, '2024-04-12 10:44:58', NULL, '2024-04-12 10:44:58', NULL),
(10, 4, 'Name', 'Designation', '0000-00-00', '0000-00-00', 'name@gmail.com', '1234567890', 'sgzrfhfzth', 79, 1, '2024-04-12 10:06:25', NULL, '2024-04-12 10:46:46', NULL, '2024-04-12 10:46:46', NULL),
(11, 4, 'ASD', 'ASD', '0000-00-00', '0000-00-00', 'mm@gmail.com', '9090890908', 'qwedf', 79, 0, '2024-04-12 10:12:53', NULL, '2024-04-12 10:51:06', NULL, '2024-04-12 10:51:06', NULL),
(12, 4, 'dhanun', 'dvvfhfcjcj', '0000-00-00', '0000-00-00', 'asdfgh@gmail.com', '1234567888', 'dgbhfah', 79, 1, '2024-04-12 10:28:13', NULL, '2024-04-12 10:28:13', NULL, NULL, NULL),
(13, 2, 'Name', 'dvvfhfcjcj', '0000-00-00', '0000-00-00', 'name@gmail.com', '1234567890', 'kkk', 79, 1, '2024-04-12 10:30:09', NULL, '2024-04-12 10:30:09', NULL, NULL, NULL),
(14, 2, 'dhanun', 'dvvfhfcjcj', '0000-00-00', '0000-00-00', 'shankarreddy2321@gmail.com', '1234567890', 'dfvga', 17, 1, '2024-04-12 12:40:06', NULL, '2024-04-12 12:40:06', NULL, NULL, NULL),
(31, 6, 'TCS', 'Engineer', '2023-01-01', NULL, 'sandip@gmail.com', '6678234567', 'H-No 9/56 GSN Street', 80, 1, '2024-04-16 13:05:13', 1, '2024-04-24 11:06:27', 1, NULL, NULL),
(32, 6, 'Wipro', 'Softare engineer', '2024-04-01', '2024-04-02', 'sandip12@gmail.com', '9874563258', 'H-NO 9-12 BHEL', 80, 0, '2024-04-16 13:06:46', 1, '2024-04-24 11:06:16', 1, NULL, NULL),
(39, 8, 'TCS', 'Engineer', '2024-04-01', '2024-04-08', 'as@gmail.com', '7895456522', 'kondapur', 3, 0, '2024-04-24 10:47:06', 1, '2024-04-24 10:47:20', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_family`
--

CREATE TABLE `employee_family` (
  `id` int NOT NULL,
  `employee_id` int DEFAULT NULL,
  `fname` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lname` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `relation_id` int DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nationality` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profession` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_family`
--

INSERT INTO `employee_family` (`id`, `employee_id`, `fname`, `lname`, `relation_id`, `mobile`, `dob`, `nationality`, `profession`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(4, 2, 'Nithin', 'K', 5, '0998579926', '1996-06-05', 'Indian', 'Student', '2024-04-10 09:54:52', 1, '2024-04-16 11:42:34', 1, NULL, NULL),
(12, 1, 'Satya', 'Narayan', 7, '8569471265', '1989-01-17', 'Indian', 'Teacher', '2024-04-22 06:28:06', 1, '2024-04-22 06:28:06', NULL, NULL, NULL),
(15, 6, 'Kiran', 'CG', 1, '9985799266', '2024-04-08', 'Indian', 'Teacher', '2024-04-25 16:35:41', 1, '2024-04-25 16:35:41', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_visa`
--

CREATE TABLE `employee_visa` (
  `id` int NOT NULL,
  `employee_id` int DEFAULT NULL,
  `visa_no` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `visa_type` int DEFAULT NULL,
  `applied_date` date DEFAULT NULL,
  `issued_date` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `duration` int DEFAULT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci,
  `place_of_issue` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_visa`
--

INSERT INTO `employee_visa` (`id`, `employee_id`, `visa_no`, `visa_type`, `applied_date`, `issued_date`, `start_date`, `end_date`, `duration`, `purpose`, `address`, `place_of_issue`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(2, 2, '478123AS', 2, '2024-02-01', '2024-03-02', '2024-05-03', '2024-05-12', 5, 'Visiting Purpose', 'Texas', 'Chennai', '2024-04-12 11:35:21', 1, '2024-04-17 11:16:10', 1, NULL, NULL),
(4, 1, '897231', 2, '2023-12-12', '2024-01-02', '2024-05-03', '2024-05-08', 5, 'Visiting Purpose', 'Texas', 'vijayawada', '2024-04-12 11:35:21', 1, '2024-04-24 08:00:44', 1, NULL, NULL),
(6, 8, 'DS34976', 3, '2024-04-02', '2024-04-11', '2024-11-29', '2025-04-16', 6, 'Business', 'Texas', 'vijayawada', '2024-04-12 11:35:21', 1, '2024-04-16 10:24:59', 1, NULL, NULL),
(7, 6, 'KH6712S', 6, '2024-02-07', '2024-02-08', '2024-04-10', '2024-11-20', 7, 'Visiting Purpose', 'Texas', 'Delhi', '2024-04-12 11:35:21', 1, '2024-04-24 05:45:10', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `family_relation`
--

CREATE TABLE `family_relation` (
  `id` int NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family_relation`
--

INSERT INTO `family_relation` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Father', '2024-04-02 08:52:42', '2024-04-02 08:52:42', NULL),
(2, 'Mother', '2024-04-02 08:52:49', '2024-04-02 08:52:49', NULL),
(3, 'Daughter', '2024-04-02 08:53:25', '2024-04-02 08:53:25', NULL),
(4, 'Spouse', '2024-04-02 08:53:48', '2024-04-02 08:53:48', NULL),
(5, 'Son', '2024-04-02 08:53:59', '2024-04-02 08:53:59', NULL),
(6, 'Gaurdian', '2024-04-02 08:54:29', '2024-04-02 08:54:29', NULL),
(7, 'Cousin', '2024-04-02 08:54:49', '2024-04-02 08:54:49', NULL),
(8, 'Nephew', '2024-04-02 08:55:45', '2024-04-02 08:55:45', NULL),
(9, 'Relatives', '2024-04-02 08:56:05', '2024-04-02 08:56:05', NULL),
(10, 'Nieces', '2024-04-02 08:56:42', '2024-04-24 07:47:18', '2024-04-24 07:47:18'),
(11, 'Brother', '2024-04-19 11:10:59', '2024-04-19 12:30:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `url` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `url2` varchar(225) DEFAULT NULL,
  `position` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `parent_id`, `name`, `url`, `url2`, `position`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Employee', 'employee', '', 1, 1, '2024-04-13 07:28:21', '2024-04-24 07:49:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `passport_types`
--

CREATE TABLE `passport_types` (
  `id` int NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passport_types`
--

INSERT INTO `passport_types` (`id`, `name`, `created_at`) VALUES
(1, 'Ordinary Passport', '2024-04-03 16:56:43'),
(2, 'Diplomatic Passport', '2024-04-03 16:57:04'),
(3, 'Official Passport', '2024-04-03 16:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `rights` varchar(225) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `rights`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', NULL, NULL, '2023-12-19 11:38:27', NULL),
(2, 'Admin', NULL, NULL, '2023-12-19 11:39:04', NULL),
(3, 'Employee', '', NULL, '2024-04-24 09:06:25', '2024-04-24 09:06:25'),
(4, 'Employee 2', '', NULL, '2024-04-24 09:06:30', '2024-04-24 09:06:30'),
(5, 'Manager', '', '2023-12-19 12:08:30', '2024-04-24 09:10:15', NULL),
(6, 'Employee 4', '', '2023-12-21 06:42:40', '2024-04-24 09:09:30', '2024-04-24 09:09:30'),
(7, 'Employee', NULL, '2024-04-24 09:09:42', '2024-04-24 09:09:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int NOT NULL,
  `country_id` int NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 80, 'Andhra Pradesh', NULL, '2024-04-24 07:40:30', NULL),
(2, 80, 'Arunachal Pradesh', NULL, NULL, NULL),
(3, 80, 'Assam', NULL, NULL, NULL),
(4, 80, 'Bihar', NULL, NULL, NULL),
(5, 80, 'Chhattisgarh', NULL, NULL, NULL),
(6, 80, 'Goa', NULL, NULL, NULL),
(7, 80, 'Gujarat', NULL, NULL, NULL),
(8, 80, 'Haryana', NULL, NULL, NULL),
(9, 80, 'Himachal Pradesh', NULL, NULL, NULL),
(10, 80, 'Jammu and Kashmir', NULL, NULL, NULL),
(11, 80, 'Jharkhand', NULL, NULL, NULL),
(12, 80, 'Karnataka', NULL, NULL, NULL),
(13, 80, 'Kerala', NULL, NULL, NULL),
(14, 80, 'Madhya Pradesh', NULL, NULL, NULL),
(15, 80, 'Maharashtra', NULL, NULL, NULL),
(16, 80, 'Manipur', NULL, NULL, NULL),
(17, 80, 'Meghalaya', NULL, NULL, NULL),
(18, 80, 'Mizoram', NULL, NULL, NULL),
(19, 80, 'Nagaland', NULL, NULL, NULL),
(20, 80, 'Odisha', NULL, NULL, NULL),
(21, 80, 'Punjab', NULL, NULL, NULL),
(22, 80, 'Rajasthan', NULL, NULL, NULL),
(23, 80, 'Sikkim', NULL, NULL, NULL),
(24, 80, 'Tamil Nadu', NULL, NULL, NULL),
(25, 80, 'Telangana', NULL, NULL, NULL),
(26, 80, 'Tripura', NULL, NULL, NULL),
(27, 80, 'Uttar Pradesh', NULL, NULL, NULL),
(28, 80, 'Uttarakhand', NULL, NULL, NULL),
(29, 80, 'West Bengal', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `user_code` varchar(16) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bg_0900_ai_ci DEFAULT NULL,
  `role` varchar(60) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_code`, `username`, `password`, `name`, `email`, `phone`, `role`, `status`, `created_by`, `last_login_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'U0001', 'admin', '25d55ad283aa400af464c76d713c07ad', 'Admin', 'admin@gmail.com', '9874565478', '1', 1, 1, '2024-04-26 15:13:00', '2023-12-12 07:12:48', '2024-04-26 15:13:46', NULL),
(2, 'U0002', 'superadmin', '25d55ad283aa400af464c76d713c07ad', 'Super Admin', 'superadmin@gmail.com', '8845586647', '1', 1, 1, NULL, '2023-12-12 07:20:45', '2023-12-13 07:31:57', NULL),
(3, 'U0003', 'employee', '25d55ad283aa400af464c76d713c07ad', 'Satya', 'satya23@gmail.com', '6589478236', '5', 1, 1, '2023-12-21 06:50:00', '2023-12-12 09:30:15', '2024-04-24 07:51:56', NULL),
(4, 'U0004', 'testuser1', '25d55ad283aa400af464c76d713c07ad', 'Teja', 'teja@gmail.com', '6589741258', '2', 1, 1, NULL, '2023-12-12 10:04:14', '2024-04-24 07:52:13', NULL),
(5, 'U0005', 'testuser2', '25d55ad283aa400af464c76d713c07ad', 'Sriram', 'sriRam@gmail.com', '8956874455', '2', 1, 1, NULL, '2023-12-12 12:04:25', '2024-04-24 07:52:10', NULL),
(6, 'U0006', 'surya', '25d55ad283aa400af464c76d713c07ad', 'Surya', 'surya@123gmail.com', '8976465464', '4', 1, 1, '2024-01-17 14:10:00', '2023-12-13 07:34:21', '2024-04-24 07:52:06', NULL),
(17, 'U0017', 'satya', '25d55ad283aa400af464c76d713c07ad', 'Satya', 'satya@gmail.com', '4697979876', '4', 1, 1, '2024-04-24 06:50:00', '2024-02-27 16:54:14', '2024-04-24 07:52:03', NULL),
(18, 'U0018', 'ibrahim', '25d55ad283aa400af464c76d713c07ad', 'Ibrahim', 'ibrahim123@gmail.com', '9797979797', '1', 1, 1, '2024-04-24 06:49:00', '2024-04-24 06:48:40', '2024-04-24 07:52:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visa_types`
--

CREATE TABLE `visa_types` (
  `id` int NOT NULL,
  `name` varchar(225) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visa_types`
--

INSERT INTO `visa_types` (`id`, `name`, `created_at`) VALUES
(1, 'STUDENT AND RESEARCH VISA', '2024-04-03 17:30:32'),
(2, 'EMPLOYMENT VISA', '2024-04-03 17:31:11'),
(3, 'MEDICAL VISA', '2024-04-03 17:40:02'),
(4, 'TOURIST VISA', '2024-04-03 17:40:10'),
(5, 'TRANSIT VISA', '2024-04-03 17:40:46'),
(6, 'BUSINESS VISA', '2024-04-03 17:41:33'),
(7, 'CONFERENCE VISA', '2024-04-03 17:42:23'),
(8, 'SPORTS VISA', '2024-04-03 17:42:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educational_qualification`
--
ALTER TABLE `educational_qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_documents`
--
ALTER TABLE `employee_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_education`
--
ALTER TABLE `employee_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_experience`
--
ALTER TABLE `employee_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_family`
--
ALTER TABLE `employee_family`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_visa`
--
ALTER TABLE `employee_visa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_relation`
--
ALTER TABLE `family_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passport_types`
--
ALTER TABLE `passport_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visa_types`
--
ALTER TABLE `visa_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=740;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `educational_qualification`
--
ALTER TABLE `educational_qualification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee_documents`
--
ALTER TABLE `employee_documents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employee_education`
--
ALTER TABLE `employee_education`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `employee_experience`
--
ALTER TABLE `employee_experience`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `employee_family`
--
ALTER TABLE `employee_family`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee_visa`
--
ALTER TABLE `employee_visa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `family_relation`
--
ALTER TABLE `family_relation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `passport_types`
--
ALTER TABLE `passport_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `visa_types`
--
ALTER TABLE `visa_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
