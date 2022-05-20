-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2022 at 04:40 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tns`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` tinyint(4) DEFAULT 1,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `surname`, `name`, `phone`, `role`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `token`) VALUES
(1, 'admin', NULL, 'Admin', '', NULL, 'zs2ZyA1PeiqM3U1wrBJsDpzLctUXT4xc', '$2y$13$RUmDL43x.c86OT3ic.yrWOzbEYF3tZLS6ZldvuSMjhSYZc41JP9uq', NULL, 'admin@gmail.com', 10, 1580809353, 1581594040, 'xsQm3_pXYGaIppbghT68Jo943Elj4cGU_1580809353', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `symbol` varchar(1) DEFAULT '$',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `trash` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `token`, `name`, `symbol`, `status`, `trash`) VALUES
(1, 'AF', 'Afghanistan', '$', 1, 0),
(2, 'AL', 'Albania', '$', 1, 0),
(3, 'DZ', 'Algeria', '$', 1, 0),
(4, 'AS', 'American Samoa', '$', 1, 0),
(5, 'AD', 'Andorra', '$', 1, 0),
(6, 'AO', 'Angola', '$', 1, 0),
(7, 'AI', 'Anguilla', '$', 1, 0),
(8, 'AQ', 'Antarctica', '$', 1, 0),
(9, 'AG', 'Antigua And Barbuda', '$', 1, 0),
(10, 'AR', 'Argentina', '$', 1, 0),
(11, 'AM', 'Armenia', '$', 1, 0),
(12, 'AW', 'Aruba', '$', 1, 0),
(13, 'AU', 'Australia', '$', 1, 0),
(14, 'AT', 'Austria', '$', 1, 0),
(15, 'AZ', 'Azerbaijan', '$', 1, 0),
(16, 'BS', 'Bahamas The', '$', 1, 0),
(17, 'BH', 'Bahrain', '$', 1, 0),
(18, 'BD', 'Bangladesh', '$', 1, 0),
(19, 'BB', 'Barbados', '$', 1, 0),
(20, 'BY', 'Belarus', '$', 1, 0),
(21, 'BE', 'Belgium', '$', 1, 0),
(22, 'BZ', 'Belize', '$', 1, 0),
(23, 'BJ', 'Benin', '$', 1, 0),
(24, 'BM', 'Bermuda', '$', 1, 0),
(25, 'BT', 'Bhutan', '$', 1, 0),
(26, 'BO', 'Bolivia', '$', 1, 0),
(27, 'BA', 'Bosnia and Herzegovina', '$', 1, 0),
(28, 'BW', 'Botswana', '$', 1, 0),
(29, 'BV', 'Bouvet Island', '$', 1, 0),
(30, 'BR', 'Brazil', '$', 1, 0),
(31, 'IO', 'British Indian Ocean Territory', '$', 1, 0),
(32, 'BN', 'Brunei', '$', 1, 0),
(33, 'BG', 'Bulgaria', '$', 1, 0),
(34, 'BF', 'Burkina Faso', '$', 1, 0),
(35, 'BI', 'Burundi', '$', 1, 0),
(36, 'KH', 'Cambodia', '$', 1, 0),
(37, 'CM', 'Cameroon', '$', 1, 0),
(38, 'CA', 'Canada', '$', 1, 0),
(39, 'CV', 'Cape Verde', '$', 1, 0),
(40, 'KY', 'Cayman Islands', '$', 1, 0),
(41, 'CF', 'Central African Republic', '$', 1, 0),
(42, 'TD', 'Chad', '$', 1, 0),
(43, 'CL', 'Chile', '$', 1, 0),
(44, 'CN', 'China', '$', 1, 0),
(45, 'CX', 'Christmas Island', '$', 1, 0),
(46, 'CC', 'Cocos (Keeling) Islands', '$', 1, 0),
(47, 'CO', 'Colombia', '$', 1, 0),
(48, 'KM', 'Comoros', '$', 1, 0),
(49, 'CG', 'Republic Of The Congo', '$', 1, 0),
(50, 'CD', 'Democratic Republic Of The Congo', '$', 1, 0),
(51, 'CK', 'Cook Islands', '$', 1, 0),
(52, 'CR', 'Costa Rica', '$', 1, 0),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', '$', 1, 0),
(54, 'HR', 'Croatia (Hrvatska)', '$', 1, 0),
(55, 'CU', 'Cuba', '$', 1, 0),
(56, 'CY', 'Cyprus', '$', 1, 0),
(57, 'CZ', 'Czech Republic', '$', 1, 0),
(58, 'DK', 'Denmark', '$', 1, 0),
(59, 'DJ', 'Djibouti', '$', 1, 0),
(60, 'DM', 'Dominica', '$', 1, 0),
(61, 'DO', 'Dominican Republic', '$', 1, 0),
(62, 'TP', 'East Timor', '$', 1, 0),
(63, 'EC', 'Ecuador', '$', 1, 0),
(64, 'EG', 'Egypt', '$', 1, 0),
(65, 'SV', 'El Salvador', '$', 1, 0),
(66, 'GQ', 'Equatorial Guinea', '$', 1, 0),
(67, 'ER', 'Eritrea', '$', 1, 0),
(68, 'EE', 'Estonia', '$', 1, 0),
(69, 'ET', 'Ethiopia', '$', 1, 0),
(70, 'XA', 'External Territories of Australia', '$', 1, 0),
(71, 'FK', 'Falkland Islands', '$', 1, 0),
(72, 'FO', 'Faroe Islands', '$', 1, 0),
(73, 'FJ', 'Fiji Islands', '$', 1, 0),
(74, 'FI', 'Finland', '$', 1, 0),
(75, 'FR', 'France', '$', 1, 0),
(76, 'GF', 'French Guiana', '$', 1, 0),
(77, 'PF', 'French Polynesia', '$', 1, 0),
(78, 'TF', 'French Southern Territories', '$', 1, 0),
(79, 'GA', 'Gabon', '$', 1, 0),
(80, 'GM', 'Gambia The', '$', 1, 0),
(81, 'GE', 'Georgia', '$', 1, 0),
(82, 'DE', 'Germany', '$', 1, 0),
(83, 'GH', 'Ghana', '$', 1, 0),
(84, 'GI', 'Gibraltar', '$', 1, 0),
(85, 'GR', 'Greece', '$', 1, 0),
(86, 'GL', 'Greenland', '$', 1, 0),
(87, 'GD', 'Grenada', '$', 1, 0),
(88, 'GP', 'Guadeloupe', '$', 1, 0),
(89, 'GU', 'Guam', '$', 1, 0),
(90, 'GT', 'Guatemala', '$', 1, 0),
(91, 'XU', 'Guernsey and Alderney', '$', 1, 0),
(92, 'GN', 'Guinea', '$', 1, 0),
(93, 'GW', 'Guinea-Bissau', '$', 1, 0),
(94, 'GY', 'Guyana', '$', 1, 0),
(95, 'HT', 'Haiti', '$', 1, 0),
(96, 'HM', 'Heard and McDonald Islands', '$', 1, 0),
(97, 'HN', 'Honduras', '$', 1, 0),
(98, 'HK', 'Hong Kong S.A.R.', '$', 1, 0),
(99, 'HU', 'Hungary', '$', 1, 0),
(100, 'IS', 'Iceland', '$', 1, 0),
(101, 'IN', 'India', '$', 1, 0),
(102, 'ID', 'Indonesia', '$', 1, 0),
(103, 'IR', 'Iran', '$', 1, 0),
(104, 'IQ', 'Iraq', '$', 1, 0),
(105, 'IE', 'Ireland', '$', 1, 0),
(106, 'IL', 'Israel', '$', 1, 0),
(107, 'IT', 'Italy', '$', 1, 0),
(108, 'JM', 'Jamaica', '$', 1, 0),
(109, 'JP', 'Japan', '$', 1, 0),
(110, 'XJ', 'Jersey', '$', 1, 0),
(111, 'JO', 'Jordan', '$', 1, 0),
(112, 'KZ', 'Kazakhstan', '$', 1, 0),
(113, 'KE', 'Kenya', '$', 1, 0),
(114, 'KI', 'Kiribati', '$', 1, 0),
(115, 'KP', 'Korea North', '$', 1, 0),
(116, 'KR', 'Korea South', '$', 1, 0),
(117, 'KW', 'Kuwait', '$', 1, 0),
(118, 'KG', 'Kyrgyzstan', '$', 1, 0),
(119, 'LA', 'Laos', '$', 1, 0),
(120, 'LV', 'Latvia', '$', 1, 0),
(121, 'LB', 'Lebanon', '$', 1, 0),
(122, 'LS', 'Lesotho', '$', 1, 0),
(123, 'LR', 'Liberia', '$', 1, 0),
(124, 'LY', 'Libya', '$', 1, 0),
(125, 'LI', 'Liechtenstein', '$', 1, 0),
(126, 'LT', 'Lithuania', '$', 1, 0),
(127, 'LU', 'Luxembourg', '$', 1, 0),
(128, 'MO', 'Macau S.A.R.', '$', 1, 0),
(129, 'MK', 'Macedonia', '$', 1, 0),
(130, 'MG', 'Madagascar', '$', 1, 0),
(131, 'MW', 'Malawi', '$', 1, 0),
(132, 'MY', 'Malaysia', '$', 1, 0),
(133, 'MV', 'Maldives', '$', 1, 0),
(134, 'ML', 'Mali', '$', 1, 0),
(135, 'MT', 'Malta', '$', 1, 0),
(136, 'XM', 'Man (Isle of)', '$', 1, 0),
(137, 'MH', 'Marshall Islands', '$', 1, 0),
(138, 'MQ', 'Martinique', '$', 1, 0),
(139, 'MR', 'Mauritania', '$', 1, 0),
(140, 'MU', 'Mauritius', '$', 1, 0),
(141, 'YT', 'Mayotte', '$', 1, 0),
(142, 'MX', 'Mexico', '$', 1, 0),
(143, 'FM', 'Micronesia', '$', 1, 0),
(144, 'MD', 'Moldova', '$', 1, 0),
(145, 'MC', 'Monaco', '$', 1, 0),
(146, 'MN', 'Mongolia', '$', 1, 0),
(147, 'MS', 'Montserrat', '$', 1, 0),
(148, 'MA', 'Morocco', '$', 1, 0),
(149, 'MZ', 'Mozambique', '$', 1, 0),
(150, 'MM', 'Myanmar', '$', 1, 0),
(151, 'NA', 'Namibia', '$', 1, 0),
(152, 'NR', 'Nauru', '$', 1, 0),
(153, 'NP', 'Nepal', '$', 1, 0),
(154, 'AN', 'Netherlands Antilles', '$', 1, 0),
(155, 'NL', 'Netherlands The', '$', 1, 0),
(156, 'NC', 'New Caledonia', '$', 1, 0),
(157, 'NZ', 'New Zealand', '$', 1, 0),
(158, 'NI', 'Nicaragua', '$', 1, 0),
(159, 'NE', 'Niger', '$', 1, 0),
(160, 'NG', 'Nigeria', '$', 1, 0),
(161, 'NU', 'Niue', '$', 1, 0),
(162, 'NF', 'Norfolk Island', '$', 1, 0),
(163, 'MP', 'Northern Mariana Islands', '$', 1, 0),
(164, 'NO', 'Norway', '$', 1, 0),
(165, 'OM', 'Oman', '$', 1, 0),
(166, 'PK', 'Pakistan', '$', 1, 0),
(167, 'PW', 'Palau', '$', 1, 0),
(168, 'PS', 'Palestinian Territory Occupied', '$', 1, 0),
(169, 'PA', 'Panama', '$', 1, 0),
(170, 'PG', 'Papua new Guinea', '$', 1, 0),
(171, 'PY', 'Paraguay', '$', 1, 0),
(172, 'PE', 'Peru', '$', 1, 0),
(173, 'PH', 'Philippines', '$', 1, 0),
(174, 'PN', 'Pitcairn Island', '$', 1, 0),
(175, 'PL', 'Poland', '$', 1, 0),
(176, 'PT', 'Portugal', '$', 1, 0),
(177, 'PR', 'Puerto Rico', '$', 1, 0),
(178, 'QA', 'Qatar', '$', 1, 0),
(179, 'RE', 'Reunion', '$', 1, 0),
(180, 'RO', 'Romania', '$', 1, 0),
(181, 'RU', 'Russia', '$', 1, 0),
(182, 'RW', 'Rwanda', '$', 1, 0),
(183, 'SH', 'Saint Helena', '$', 1, 0),
(184, 'KN', 'Saint Kitts And Nevis', '$', 1, 0),
(185, 'LC', 'Saint Lucia', '$', 1, 0),
(186, 'PM', 'Saint Pierre and Miquelon', '$', 1, 0),
(187, 'VC', 'Saint Vincent And The Grenadines', '$', 1, 0),
(188, 'WS', 'Samoa', '$', 1, 0),
(189, 'SM', 'San Marino', '$', 1, 0),
(190, 'ST', 'Sao Tome and Principe', '$', 1, 0),
(191, 'SA', 'Saudi Arabia', '$', 1, 0),
(192, 'SN', 'Senegal', '$', 1, 0),
(193, 'RS', 'Serbia', '$', 1, 0),
(194, 'SC', 'Seychelles', '$', 1, 0),
(195, 'SL', 'Sierra Leone', '$', 1, 0),
(196, 'SG', 'Singapore', '$', 1, 0),
(197, 'SK', 'Slovakia', '$', 1, 0),
(198, 'SI', 'Slovenia', '$', 1, 0),
(199, 'XG', 'Smaller Territories of the UK', '$', 1, 0),
(200, 'SB', 'Solomon Islands', '$', 1, 0),
(201, 'SO', 'Somalia', '$', 1, 0),
(202, 'ZA', 'South Africa', '$', 1, 0),
(203, 'GS', 'South Georgia', '$', 1, 0),
(204, 'SS', 'South Sudan', '$', 1, 0),
(205, 'ES', 'Spain', '$', 1, 0),
(206, 'LK', 'Sri Lanka', '$', 1, 0),
(207, 'SD', 'Sudan', '$', 1, 0),
(208, 'SR', 'Suriname', '$', 1, 0),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', '$', 1, 0),
(210, 'SZ', 'Swaziland', '$', 1, 0),
(211, 'SE', 'Sweden', '$', 1, 0),
(212, 'CH', 'Switzerland', '$', 1, 0),
(213, 'SY', 'Syria', '$', 1, 0),
(214, 'TW', 'Taiwan', '$', 1, 0),
(215, 'TJ', 'Tajikistan', '$', 1, 0),
(216, 'TZ', 'Tanzania', '$', 1, 0),
(217, 'TH', 'Thailand', '$', 1, 0),
(218, 'TG', 'Togo', '$', 1, 0),
(219, 'TK', 'Tokelau', '$', 1, 0),
(220, 'TO', 'Tonga', '$', 1, 0),
(221, 'TT', 'Trinidad And Tobago', '$', 1, 0),
(222, 'TN', 'Tunisia', '$', 1, 0),
(223, 'TR', 'Turkey', '$', 1, 0),
(224, 'TM', 'Turkmenistan', '$', 1, 0),
(225, 'TC', 'Turks And Caicos Islands', '$', 1, 0),
(226, 'TV', 'Tuvalu', '$', 1, 0),
(227, 'UG', 'Uganda', '$', 1, 0),
(228, 'UA', 'Ukraine', '$', 1, 0),
(229, 'AE', 'United Arab Emirates', '$', 1, 0),
(230, 'GB', 'United Kingdom', '$', 1, 0),
(231, 'US', 'United States', '$', 1, 0),
(232, 'UM', 'United States Minor Outlying Islands', '$', 1, 0),
(233, 'UY', 'Uruguay', '$', 1, 0),
(234, 'UZ', 'Uzbekistan', '$', 1, 0),
(235, 'VU', 'Vanuatu', '$', 1, 0),
(236, 'VA', 'Vatican City State (Holy See)', '$', 1, 0),
(237, 'VE', 'Venezuela', '$', 1, 0),
(238, 'VN', 'Vietnam', '$', 1, 0),
(239, 'VG', 'Virgin Islands (British)', '$', 1, 0),
(240, 'VI', 'Virgin Islands (US)', '$', 1, 0),
(241, 'WF', 'Wallis And Futuna Islands', '$', 1, 0),
(242, 'EH', 'Western Sahara', '$', 1, 0),
(243, 'YE', 'Yemen', '$', 1, 0),
(244, 'YU', 'Yugoslavia', '$', 1, 0),
(245, 'ZM', 'Zambia', '$', 1, 0),
(246, 'ZW', 'Zimbabwe', '$', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1651374384),
('m130524_201442_init', 1651374387),
('m190124_110200_add_verification_token_column_to_user_table', 1651374387);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `height` varchar(100) DEFAULT NULL,
  `height_unit` varchar(100) DEFAULT NULL,
  `weight` varchar(100) DEFAULT NULL,
  `weight_unit` varchar(100) DEFAULT NULL,
  `marital_status` varchar(100) DEFAULT NULL,
  `body_type` varchar(100) DEFAULT NULL,
  `physical_status` varchar(100) DEFAULT NULL,
  `languages_known` varchar(255) DEFAULT NULL,
  `eating_habits` varchar(100) DEFAULT NULL,
  `drinking_habits` varchar(100) DEFAULT NULL,
  `smoking_habits` varchar(100) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `education_details` varchar(255) DEFAULT NULL,
  `employed_in` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `occupation_details` varchar(255) DEFAULT NULL,
  `income` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `caste` varchar(255) DEFAULT NULL,
  `sub_caste` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `star` varchar(255) DEFAULT NULL,
  `rasi` varchar(255) DEFAULT NULL,
  `sudha_jathakam` tinyint(4) DEFAULT NULL,
  `gothram` varchar(255) DEFAULT NULL,
  `family_type` varchar(100) DEFAULT NULL,
  `family_status` varchar(100) DEFAULT NULL,
  `fathers_occupation` varchar(255) DEFAULT NULL,
  `mothers_occupation` varchar(255) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `brothers` tinyint(4) DEFAULT NULL,
  `sisters` tinyint(4) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `interests` varchar(255) DEFAULT NULL,
  `about_me` text DEFAULT NULL,
  `photo1` varchar(255) DEFAULT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `photo3` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `page_no` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `edit_status` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `height`, `height_unit`, `weight`, `weight_unit`, `marital_status`, `body_type`, `physical_status`, `languages_known`, `eating_habits`, `drinking_habits`, `smoking_habits`, `education`, `education_details`, `employed_in`, `occupation`, `occupation_details`, `income`, `religion`, `caste`, `sub_caste`, `other`, `star`, `rasi`, `sudha_jathakam`, `gothram`, `family_type`, `family_status`, `fathers_occupation`, `mothers_occupation`, `origin`, `brothers`, `sisters`, `city`, `state`, `country`, `citizenship`, `hobbies`, `interests`, `about_me`, `photo1`, `photo2`, `photo3`, `user_id`, `page_no`, `status`, `edit_status`) VALUES
(1, '5.8', 'Feet', '64', 'Kilogram', 'Never Married', 'Slim', 'Normal', 'Malayalam,English', 'Non Vegetarian', 'No', 'No', 'Post graduate', 'MCA', 'Private Sector', 'Software', '', '2000000 to 500000', NULL, NULL, 'Menon', NULL, 'Makayiram', 'Edavam', 0, '', 'Nuclear Family', 'Middle Class', '', '', '', 0, 0, 'Alappuzha', 'Kerala', 101, 'Indian', '', '', 'Nothing Special', NULL, NULL, NULL, 1, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(510) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `module`, `name`, `value`) VALUES
(10, 'SMTP Host', 'smtp', 'host', 'smtp.mailtrap.io'),
(11, 'SMTP Username', 'smtp', 'username', 'cac91bdf122d99'),
(12, 'SMTP Password', 'smtp', 'password', '28f769256857be'),
(13, 'SMTP Port', 'smtp', 'port', '2525'),
(14, 'SMTP Encryption', 'smtp', 'encryption', 'tls'),
(15, 'SMTP Email', 'smtp', 'email', 'vinod-560b68@inbox.mailtrap.io'),
(18, 'Phone', 'custom', 'phone', '+9155485558'),
(19, 'Email', 'custom', 'email', 'nursebank@gmail.com'),
(20, 'Client One', 'custom', 'client-one', 'Client One'),
(21, 'Client Two', 'custom', 'client-two', 'Client Two');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` int(11) DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `dob`, `gender`, `phone`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `token`) VALUES
(1, 'Vinod C', NULL, 988655400, 'Male', '+919496332375', 'TNS20220001', '4NCb41U4GmAcRrLqo0iSDfT0G8fPUfBA', '$2y$13$6RTeX9RT1xk96BgWnjZ.h.xqPlgJqWQKVxO3mFbKE38HhmQzAq2Ta', NULL, 'test@gmail.com', 10, 1651906324, 1652718070, 'Q6n9I86XXQG9EJF-QVQfHr964oEu6Czo_1651906324', 'ndhA6y8CITHNcwNdm_G26l15m5YaYnZH');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
