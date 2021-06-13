-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2021 at 06:51 PM
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
(8, 'Reynaldo', 'Factor', 'factorjun0309@gmail.com', 'yeah', '1622620581.png', '1622620563.png', '', 1, 0),
(9, 'testx', 'testx', 'testx@gmail.com', '1', 'defaultban.png', 'defaultdp.png', '', 0, 0),
(13, 'aa', 'a', 'a', '1', 'defaultban.png', 'defaultdp.png', '', 0, 0),
(14, 'CuisineHero', ' ', 'cuisinehero@gg.com', 'admin', '1623084420.png', '1623084421.png', '', 2, 2),
(15, 'testx', 'a', 'a@g.com', '1', 'defaultban.png', 'defaultdp.png', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `email`, `password`) VALUES
(1, 'Zoa', 'ivanjared17@gmail.com', 'loonaverse2117');

-- --------------------------------------------------------

--
-- Table structure for table `bake`
--

DROP TABLE IF EXISTS `bake`;
CREATE TABLE IF NOT EXISTS `bake` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `bake_name` varchar(100) DEFAULT NULL,
  `bake_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `condi`
--

DROP TABLE IF EXISTS `condi`;
CREATE TABLE IF NOT EXISTS `condi` (
  `condi_id` int(6) NOT NULL AUTO_INCREMENT,
  `condi_name` varchar(30) NOT NULL,
  `condi_amt` varchar(30) NOT NULL,
  `food_id` int(6) NOT NULL,
  PRIMARY KEY (`condi_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `condi`
--

INSERT INTO `condi` (`condi_id`, `condi_name`, `condi_amt`, `food_id`) VALUES
(1, 'Soy Sauce', '3', 1),
(2, 'Vinegar', '2', 1),
(3, 'Salt', '3', 1),
(4, 'Salt', '3', 2),
(5, 'Fish Sauce', '2', 2),
(6, 'Vinegar', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dairy`
--

DROP TABLE IF EXISTS `dairy`;
CREATE TABLE IF NOT EXISTS `dairy` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `dairy_name` varchar(100) DEFAULT NULL,
  `dairy_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dessert`
--

DROP TABLE IF EXISTS `dessert`;
CREATE TABLE IF NOT EXISTS `dessert` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `dessert_name` varchar(100) DEFAULT NULL,
  `dessert_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fish`
--

DROP TABLE IF EXISTS `fish`;
CREATE TABLE IF NOT EXISTS `fish` (
  `fish_id` int(100) NOT NULL AUTO_INCREMENT,
  `fish_name` varchar(100) DEFAULT NULL,
  `fish_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL,
  PRIMARY KEY (`fish_id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `follow_log`
--

DROP TABLE IF EXISTS `follow_log`;
CREATE TABLE IF NOT EXISTS `follow_log` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow_log`
--

INSERT INTO `follow_log` (`id`, `email`, `author`) VALUES
(41, 'factorjun0309@gmail.com', 'cuisinehero@gg.com'),
(28, 'a@g.com', 'cuisinehero@gg.com'),
(42, 'cuisinehero@gg.com', 'factorjun0309@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `food_id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `food_name` varchar(30) NOT NULL,
  `cook_time` varchar(15) NOT NULL,
  `prep_time` varchar(15) NOT NULL,
  `servings` varchar(30) NOT NULL,
  `video_link` tinytext DEFAULT NULL,
  `proced` text NOT NULL,
  `nutri_info` text DEFAULT NULL,
  `likes` int(10) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food_id`, `author`, `food_name`, `cook_time`, `prep_time`, `servings`, `video_link`, `proced`, `nutri_info`, `likes`, `regdate`) VALUES
(1, 1, 'cuisinehero@gg.com', 'Adobo', '30 minutes', '10 minutes', '6-10', '<iframe width=\"950\" height=\"534\" src=\"https://www.youtube.com/embed/mtyULaM6RfQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'procedure pag gawa ng adobo', 'nutri info here', 2, '2021-06-10 09:31:29'),
(2, 2, 'cuisinehero@gg.com', 'Nilaga', '30 minutes', '10 minutes', '6-10', '<iframe width=\"950\" height=\"534\" src=\"https://www.youtube.com/embed/CDFsyd92ezU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'procedure ng pag gawa ng nilaga', 'nutri info ng nilaga', 2, '2021-06-10 09:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `fruit`
--

DROP TABLE IF EXISTS `fruit`;
CREATE TABLE IF NOT EXISTS `fruit` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `fruit_name` varchar(100) DEFAULT NULL,
  `fruit_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=MyISAM AUTO_INCREMENT=163 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_log`
--

INSERT INTO `like_log` (`id`, `email`, `likes`, `food_id`) VALUES
(153, 'cuisinehero@gg.com', 1, 1),
(159, 'factorjun0309@gmail.com', 1, 2),
(158, 'factorjun0309@gmail.com', 1, 1),
(160, 'a@g.com', 1, 2),
(162, 'factorjun0309@gmail.com', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `meat`
--

DROP TABLE IF EXISTS `meat`;
CREATE TABLE IF NOT EXISTS `meat` (
  `meat_id` int(6) NOT NULL AUTO_INCREMENT,
  `meat_name` varchar(30) NOT NULL,
  `meat_amt` varchar(30) NOT NULL,
  `food_id` int(6) NOT NULL,
  PRIMARY KEY (`meat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meat`
--

INSERT INTO `meat` (`meat_id`, `meat_name`, `meat_amt`, `food_id`) VALUES
(1, 'Pork', '1', 1),
(2, 'Chicken', '2', 1),
(3, 'Pork', '2', 2),
(4, 'Duck', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nuts`
--

DROP TABLE IF EXISTS `nuts`;
CREATE TABLE IF NOT EXISTS `nuts` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nuts_name` varchar(100) DEFAULT NULL,
  `nuts_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `oil`
--

DROP TABLE IF EXISTS `oil`;
CREATE TABLE IF NOT EXISTS `oil` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `oil_name` varchar(100) DEFAULT NULL,
  `oil_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_images`
--

DROP TABLE IF EXISTS `recipe_images`;
CREATE TABLE IF NOT EXISTS `recipe_images` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `food_img` varchar(30) NOT NULL,
  `food_id` int(11) NOT NULL,
  `author` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_images`
--

INSERT INTO `recipe_images` (`id`, `food_img`, `food_id`, `author`) VALUES
(2, '1623338444.png', 1, 'cuisinehero@gg.com'),
(4, '1623341763.png', 2, 'cuisinehero@gg.com');

-- --------------------------------------------------------

--
-- Table structure for table `soup`
--

DROP TABLE IF EXISTS `soup`;
CREATE TABLE IF NOT EXISTS `soup` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `soup_name` varchar(100) DEFAULT NULL,
  `soup_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `spice`
--

DROP TABLE IF EXISTS `spice`;
CREATE TABLE IF NOT EXISTS `spice` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `spice_name` varchar(100) DEFAULT NULL,
  `spice_amt` varchar(100) DEFAULT NULL,
  `food_id` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `veggies`
--

DROP TABLE IF EXISTS `veggies`;
CREATE TABLE IF NOT EXISTS `veggies` (
  `veggies_id` int(6) NOT NULL AUTO_INCREMENT,
  `veggies_name` varchar(30) NOT NULL,
  `veggies_amt` varchar(30) NOT NULL,
  `food_id` int(6) NOT NULL,
  PRIMARY KEY (`veggies_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `veggies`
--

INSERT INTO `veggies` (`veggies_id`, `veggies_name`, `veggies_amt`, `food_id`) VALUES
(1, 'Kangkong', '1', 1),
(2, 'Potato', '1', 1),
(3, 'Potato', '2', 2),
(4, 'Petsay', '1', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
