-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 10, 2021 at 04:32 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc`
--

DROP TABLE IF EXISTS `acc`;
CREATE TABLE IF NOT EXISTS `acc` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `dispic` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `followno` int(10) NOT NULL,
  `recpno` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc`
--

INSERT INTO `acc` (`id`, `firstname`, `lastname`, `email`, `pass`, `banner`, `dispic`, `bio`, `followno`, `recpno`) VALUES
(6, 'test4', 'test4', 'test4@gmail.com', '1', '1622461421.png', '1622462048.png', '', 0, 0),
(7, 'testa', 'testa', 'testa@gmail.com', '1', '1622461284.png', '1622462048.png', '', 0, 0),
(8, 'Reynaldo', 'Factor', 'factorjun0309@gmail.com', 'yeah', '1622620581.png', '1622620563.png', '', 0, 0),
(9, 'testx', 'testx', 'testx@gmail.com', '1', 'defaultban.png', 'defaultdp.png', '', 0, 0),
(10, 'Bryan', 'Baclili', 'test1@gmail.com', '1', 'defaultban.png', '1622593140.png', '', 0, 0),
(11, 'testing', 'testing', 'testg@g.com', '1', '1622571182.png', '1622571168.png', '', 0, 0),
(12, 'test', 'test', 't@g.com', '1', '1622623717.png', '1622623684.png', '', 0, 0),
(13, 'aa', 'a', 'a@a', '1', 'defaultban.png', 'defaultdp.png', '', 0, 0),
(14, 'CuisineHero', ' ', 'cuisinehero@gg.com', 'admin', '1623084420.png', '1623084421.png', '', 0, 2),
(15, 'testx', 'a', 'a@g.com', '1', 'defaultban.png', 'defaultdp.png', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `food_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `email`, `food_id`, `comment`, `date`) VALUES
(7, 'factorjun0309@gmail.com', 1, 'yeat', '2021-06-10 11:34:38'),
(8, 'factorjun0309@gmail.com', 1, 'tesst', '2021-06-10 11:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `condiments`
--

DROP TABLE IF EXISTS `condiments`;
CREATE TABLE IF NOT EXISTS `condiments` (
  `condi_id` int(6) NOT NULL AUTO_INCREMENT,
  `condi_name` varchar(30) NOT NULL,
  `condi_amt` int(6) NOT NULL,
  `food_id` int(6) NOT NULL,
  PRIMARY KEY (`condi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `condiments`
--

INSERT INTO `condiments` (`condi_id`, `condi_name`, `condi_amt`, `food_id`) VALUES
(1, 'Soy Sauce', 3, 1),
(2, 'Vinegar', 2, 1),
(3, 'Salt', 3, 1),
(4, 'Salt', 3, 2),
(5, 'Fish Sauce', 2, 2),
(6, 'Vinegar', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `food_id` int(6) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `food_name` varchar(30) NOT NULL,
  `food_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cook_time` varchar(15) NOT NULL,
  `prep_time` varchar(15) NOT NULL,
  `video_link` tinytext NOT NULL,
  `proced` text NOT NULL,
  `nutri_info` text NOT NULL,
  `likes` int(10) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`food_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `author`, `food_name`, `food_img`, `cook_time`, `prep_time`, `video_link`, `proced`, `nutri_info`, `likes`, `regdate`) VALUES
(1, 'cuisinehero@gg.com', 'Adobo', '1623338444.png', '', '', '<iframe width=\"950\" height=\"534\" src=\"https://www.youtube.com/embed/mtyULaM6RfQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'procedure pag gawa ng adobo', 'nutri info ng adobo', 2, '2021-06-10 09:31:29'),
(2, 'cuisinehero@gg.com', 'Nilaga', '1623341763.png', '', '', '<iframe width=\"950\" height=\"534\" src=\"https://www.youtube.com/embed/CDFsyd92ezU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'procedure ng pag gawa ng nilaga', 'nutri info ng nilaga', 1, '2021-06-10 09:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients_all`
--

DROP TABLE IF EXISTS `ingredients_all`;
CREATE TABLE IF NOT EXISTS `ingredients_all` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `ing_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients_all`
--

INSERT INTO `ingredients_all` (`id`, `ing_name`) VALUES
(1, 'Petsay'),
(2, 'Kangkong'),
(3, 'Potatoes'),
(7, 'Salt'),
(6, 'Tomatoes'),
(8, 'Pepper'),
(9, 'Paprika'),
(10, 'Soy Sauce'),
(11, 'Fish Sauce'),
(12, 'Vinegar'),
(13, 'Dried Basil'),
(14, 'Garlic'),
(15, 'Onion'),
(16, 'Ginger'),
(17, 'Pepper'),
(18, 'Pork'),
(19, 'Beef'),
(20, 'Chicken'),
(21, 'Tofu'),
(22, 'Shrimp'),
(23, 'Tomatoes'),
(24, 'Salt'),
(25, 'Pepper'),
(26, 'Paprika'),
(27, 'Soy Sauce'),
(28, 'Fish Sauce'),
(29, 'Vinegar'),
(30, 'Dried Basil'),
(31, 'Garlic'),
(32, 'Onion'),
(33, 'Ginger'),
(34, 'Pepper'),
(35, 'Pork'),
(36, 'Beef'),
(37, 'Chicken'),
(38, 'Tofu'),
(39, 'Shrimp'),
(40, 'Adobo');

-- --------------------------------------------------------

--
-- Table structure for table `like_log`
--

DROP TABLE IF EXISTS `like_log`;
CREATE TABLE IF NOT EXISTS `like_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `likes` int(1) NOT NULL,
  `food_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_log`
--

INSERT INTO `like_log` (`id`, `email`, `likes`, `food_id`) VALUES
(153, 'cuisinehero@gg.com', 1, 1),
(152, 'factorjun0309@gmail.com', 1, 2),
(151, 'factorjun0309@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meat`
--

DROP TABLE IF EXISTS `meat`;
CREATE TABLE IF NOT EXISTS `meat` (
  `meat_id` int(6) NOT NULL AUTO_INCREMENT,
  `meat_name` varchar(30) NOT NULL,
  `meat_amt` int(6) NOT NULL,
  `food_id` int(6) NOT NULL,
  PRIMARY KEY (`meat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meat`
--

INSERT INTO `meat` (`meat_id`, `meat_name`, `meat_amt`, `food_id`) VALUES
(1, 'Pork', 1, 1),
(2, 'Chicken', 2, 1),
(3, 'Pork', 2, 2),
(4, 'Duck', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `veggies`
--

DROP TABLE IF EXISTS `veggies`;
CREATE TABLE IF NOT EXISTS `veggies` (
  `veggies_id` int(6) NOT NULL AUTO_INCREMENT,
  `veggie_name` varchar(30) NOT NULL,
  `veggie_amt` int(6) NOT NULL,
  `food_id` int(6) NOT NULL,
  PRIMARY KEY (`veggies_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `veggies`
--

INSERT INTO `veggies` (`veggies_id`, `veggie_name`, `veggie_amt`, `food_id`) VALUES
(1, 'Kangkong', 1, 1),
(2, 'Potato', 1, 1),
(3, 'Potato', 2, 2),
(4, 'Petsay', 1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
